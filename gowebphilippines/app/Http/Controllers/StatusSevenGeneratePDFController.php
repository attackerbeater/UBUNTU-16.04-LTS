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

class StatusSevenGeneratePDFController extends Controller
{
  protected $abstractOrders;
  // for app\libs\email\EmailHandler properties
  protected $status = '8.GENERATE CONFIRMATION TO CLIENT';
  protected $emailobj = 'generate-confirmation-to-client';
  protected $path = 'client';
  protected $transport;
  protected $column = 'upload_generate_confirmation_to_client';
  
  public function __construct(OrdersAbstractHandler $abstractOrders, InterfaceEmail $t){
    $this->abstractOrders = $abstractOrders;
    $this->transport = $t;
  }
  
  /**
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function generatepdf(Request $request, $id, $client_id)
  {
    $client = DB::table('klantens')->select()
    ->where('id', $client_id)->get();
    
    $order = DB::table('orders')->select('*')
    ->where('client_id', $client_id)->where('id', $id)->get();
    
    $data = ['order_id' => $id, 'company_name' => $client[0]->company_name, 'company_email' => $client[0]->company_email, 'company_country' => $client[0]->company_country, ];
    
    $supplier = DB::table('leveranciers')->select('*')
    ->where('supplier_name', $order[0]->order_supplier)
    ->get();
    
    $newArr = $this->abstractOrders->orderProductLists($id);
    
    return view('quotation.seven.generate-confirmation-to-client', compact('client', 'order', 'supplier', 'data', 'newArr'));
  }
  
  /**
  * Sends Email
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function process(Request $request)
  {
    return $this->transport->email($request, $this->status, $this->emailobj, $this->path, $this->column);
  }
  
}
