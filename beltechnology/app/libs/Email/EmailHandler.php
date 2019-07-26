<?php

namespace App\libs\Email;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use Validator;
use App\libs\Email\InterfaceEmail as InterfaceEmail;
use DateTime;
use Mail;
use App\Mail\generateConfirmationToClient;
use App\Mail\quoteRequestSentToSupplier;
use App\Mail\sendConfirmationToSupplier;
use App\Mail\quoteSentToClient;
use App\Mail\goodsSentToClient;
use App\Mail\invoiceSent;

class EmailHandler implements InterfaceEmail {

    protected $now;
    public function __construct(){
        $this->now = new DateTime;
    }

    public function email(Request $request, $status, $emailobj, $path, $column){

      $id         = $request->input('id');
      $client_id  = $request->input('client_id');
      $name       = $request->input('name');
      $subject    = $request->input('subject');
      $email      = $request->input('email');
      $message    = $request->input('message');

      $validator = Validator::make($request->all() , [
          'name'          => 'required',
          'email'         => 'required',
          'subject'       => 'required',
          'message'       => 'required',
          'attachment'    => 'required'
      ]);

      if ($validator->passes())
      {
          $data['id']         = $id;
          $data['name']       = $name;
          $data['subject']    = $subject;
          $data['email']      = $email;
          $data['content']    = $message;

          if ($request->hasFile('attachment'))
          {
              $destinationPath = storage_path() . "/{$path}/{$id}";
              $files = $request->file('attachment');
              foreach ($files as $file) {
                  $file_name = str_replace(' ', '_', $file->getClientOriginalName());
                  $file->move($destinationPath , $file_name);
                  $data['attachment'][] =  $file_name;
              }

              $data['destination_path'] = $destinationPath;

              $files =[];
              foreach ($data['attachment'] as $key => $value) {
                  $files[] = "storage/{$path}/{$id}/{$value}";
              }

              if ($emailobj = 'quote-request-sent-to-supplier') {
                  Mail::send(new quoteRequestSentToSupplier($data));
              } elseif ($emailobj = 'quote-sent-to-client') {
                  Mail::send(new quoteSentToClient($data));
              } elseif ($emailobj = 'send-confirmation-to-supplier') {
                  Mail::send(new sendConfirmationToSupplier($data));
              } elseif ($emailobj = 'generate-confirmation-to-client') {
                  Mail::send(new generateConfirmationToClient($data));
              } elseif ($emailobj = 'goods-sent-to-client') {
                  Mail::send(new goodsSentToClient($data));
              } elseif ($emailobj = 'invoice-sent') {
                  Mail::send(new invoiceSent($data));
              }

              $err = [];
              if (count(Mail::failures()) > 0) {
                  $err['response'] = "There was one or more failures. They were: <br />";
                  foreach (Mail::failures as $email_address) {
                      $err['response'] = " - $email_address <br />";
                  }
              } else {

                  $data['order_status'] = $status;
                  $data[$column] = implode(',',$files);
                  // $data[$column] = $this->now;

                  unset($data['id']);
                  unset($data['name']);
                  unset($data['subject']);
                  unset($data['email']);
                  unset($data['attachment']);
                  unset($data['content']);
                  unset($data['destination_path']);

                  $update = Orders::where('id', $id)->update($data);
              }
              echo response()->json(['success' => true]);
          }
      }
      return response()->json(['error' => $validator->errors()
          ->toArray() ]);
    }
}
