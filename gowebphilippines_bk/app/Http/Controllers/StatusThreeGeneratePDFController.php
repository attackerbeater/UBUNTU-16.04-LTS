<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use App\klanten;
use App\Leveranciers;
use App\Http\Controllers\Controller;
use Validator;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Beltech\Orders\OrdersAbstractHandler;

use App\libs\Email\InterfaceEmail as InterfaceEmail;

class StatusThreeGeneratePDFController extends Controller
{
  protected $abstractOrders;

  // for app\libs\email\EmailHandler properties
  protected $status = '4.QUOTE SENT to CLIENT';
  protected $emailobj = 'quote-sent-to-client';
  protected $path = 'client';
  protected $transport;
  protected $column = 'upload_quote_sent_to_client';

  function __construct(OrdersAbstractHandler $abstractOrders, InterfaceEmail $t){
    $this->abstractOrders = $abstractOrders;
    $this->transport = $t;
  }

  public function generatepdf(Request $request, $id, $client_id){
    $client = DB::table('klantens')->select('*')->where('id', $client_id)->get();
    $order  = DB::table('orders')->select('*')->where('id', $id)->get();

    $data['order_id'] = $id;
    $data['client_id'] = $client_id;
    $data['company_name'] = $client[0]->company_name;
    $data['company_email'] = $client[0]->company_email;

    for ($i=0; $i < count($order); $i++) {

      // order_treatment
      if(isset($order[$i]->order_treatment)){
        $order_treatment = $order[$i]->order_treatment;
        $order[$i]->order_treatment =explode(',',$order_treatment);
      }

      // order_treatment_details
      if(isset($order[$i]->order_treatment_details)){
        $order_treatment_details = $order[$i]->order_treatment_details;
        $order[$i]->order_treatment_details =explode(',',$order_treatment_details);
      }

      // order_treatment_details
      if(isset($order[$i]->order_treatment_price)){
        $order_treatment_price = $order[$i]->order_treatment_price;
        $order[$i]->order_treatment_price =explode(',',$order_treatment_price);
      }
    }

    $newArr = $this->abstractOrders->orderProductLists($id);

    return view('quotation.three.quote-sent-to-client', compact('data', 'client', 'order', 'newArr'));
  }

  public function email(Request $request)
  {
    return $this->transport->process($request, $this->status, $this->emailobj, $this->path, $this->column);
  }

}
