<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Config;

class goodsSentToClient extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = []; 
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct(array $data)
    {
      $this->data = $data;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
        $email = $this->markdown('goods_sent_to_client')
        ->to($this->data['email'])
        ->subject($this->data['subject'])
        ->from(Config::get('mail.username'))
        ->with([
            'content'   => $this->data['content']
        ]);

        foreach ($this->data['attachment'] as $key => $value) { // create multiple files to upload

            $attachments[$this->data['destination_path'].'/'.$value ] = [
               'as'     =>  $value,
               'mime'   => 'application/msword','application/pdf','image/png','image/jpeg','application/vnd.openxlformats-officedocument.wordprocessingml.document'  
           ];           
        } 
        // $attachments is an array with file paths of attachments
        foreach($attachments as $filePath => $fileParameters){
            $email->attach($filePath, $fileParameters);
        }

        return $email;
    }
}
