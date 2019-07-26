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
use Mail;
use DateTime;
use App\Beltech\Orders\OrdersAbstractHandler;
use Illuminate\Support\Facades\Storage;
use App\Beltech\Orders\OrderFunctionHandler;


class OrdersController extends Controller
{
  protected $now;  
  protected $abstractOrders;
  protected $handler;
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(OrdersAbstractHandler $abstractOrders, OrderFunctionHandler $handler)
  {
    $this->middleware('auth');
    $this->abstractOrders = $abstractOrders;
    $this->now = new DateTime;
    $this->handler = $handler;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {    
    $orders = DB::table('klantens')
    ->select('orders.*', 'klantens.id as klantens_client_id', 'klantens.company_name as company_name', 'klantens.contact_person_last_name as contact_lastname')
    ->join('orders', 'klantens.id', '=', 'orders.client_id')
    ->orderBy('orders.id', 'desc')
    ->get();
    $klantens = DB::table('klantens')->select('*')->get();
    // Client
    $klantens_ids_array = [];
    foreach ($klantens as $key => $klanten){
      $klantens_ids_array[] = $klanten->id;
    }
    $klantens_names_array = [];
    foreach ($klantens as $key => $klanten){
      $klantens_names_array[] = $klanten->company_name;
    }
    // supplier
    $leveranciers = DB::table('leveranciers')->select('supplier_name')->get();
    $leverancier_array = [];
    foreach ($leveranciers as $key => $leverancier){
      $leverancier_array[] = $leverancier->supplier_name;
    }
    for ($i=0; $i < count($orders); $i++) {
      // order_treatment
      if(isset($orders[$i]->order_treatment)){
        $order_treatment = $orders[$i]->order_treatment;
        $orders[$i]->order_treatment =explode(',',$order_treatment);
      }
      // order_treatment_details
      if(isset($orders[$i]->order_treatment_details)){
        $order_treatment_details = $orders[$i]->order_treatment_details;
        $orders[$i]->order_treatment_details =explode(',',$order_treatment_details);
      }
      // order_treatment_details
      if(isset($orders[$i]->order_treatment_price)){
        $order_treatment_price = $orders[$i]->order_treatment_price;
        $orders[$i]->order_treatment_price =explode(',',$order_treatment_price);
      }
    }
    $dateTime = $this->now;
    return view('orders', ['orders' => $orders, 'client_ids' => $klantens_ids_array, 'client_names' => $klantens_names_array, 'suppliers' => $leverancier_array, 'timestamp'=>$dateTime]);
  }  
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {    
    $id = $request->input('company_name');
    $klantens = DB::table('klantens')->select('id', 'company_name')->where('id', $id)->get();
    $orders = DB::table('orders')->select('client_id')->where('client_id', $id)->get();
    if (count($klantens) > 0 && !empty($klantens))
    {
      $id = $klantens[0]->id;
      $company_name = $klantens[0]->company_name;
      // start generating order reference number
      $first = str_pad(substr($id, 0, 2) , 3, ".");
      $second = substr($id, 2);
      $id = $first . $second;
      $orderTimes = count($orders);
      if ($orderTimes == 1)
      {
        $numOrder = $orderTimes + 1;
        $leading = (strlen($numOrder) == 1) ? 0 : '';
        $order_reference_number = 'PvB/' . $id . '/' . substr(date("Y") , 2) . $leading . $numOrder;
      }
      elseif ($orderTimes > 0)
      {
        $numOrder = $orderTimes + 1;
        $leading = (strlen($numOrder) == 1) ? 0 : '';
        $order_reference_number = 'PvB/' . $id . '/' . substr(date("Y") , 2) . $leading . $numOrder;
      }
      else
      {
        $leading = 0;
        $numOrder = $orderTimes + 1;
        $order_reference_number = 'PvB/' . $id . '/' . substr(date("Y") , 2) . $leading . $numOrder;
      }
    }
    $validator = Validator::make($request->all() , [
      'company_name'      => 'required',
      'order_supplier'    => 'required'
    ]);
    if ($validator->passes())
    {
      $orders = new Orders;
      if ($request->hasFile('upload_quotation_received'))
      {
        $fileName = str_replace(' ', '_', $request->file('upload_quotation_received')->getClientOriginalName()); //Get file original name , x
        $data['upload_quotation_received'] = $fileName;
        $request->file('upload_quotation_received')->move(storage_path() . "/client/{$klantens[0]->id}", $fileName);
        $orders->upload_quotation_received  = "storage/client/{$klantens[0]->id}/" . $fileName;
      }
      $orders->order_reference_number             = $order_reference_number;
      $orders->order_clients                      = $klantens[0]->company_name;
      $orders->client_id                          = $klantens[0]->id;
      $orders->order_number_from_client           = $request->input('order_number_from_client')? $request->input('order_number_from_client'): '';
      $orders->order_supplier                     = $request->input('order_supplier')? $request->input('order_supplier'): '';
      $orders->order_number_from_supplier         = $request->input('order_number_from_supplier')? $request->input('order_number_from_supplier'): '';
      $orders->order_status                       = '1.QUOTE REQUEST RECEIVED from Client';
      $now = new DateTime;
      $orders->created_quotereceived              = $now;
      $orders->order_subject                      = $request->input('order_subject')? $request->input('order_subject'): '';
      $orders->order_details                      = $request->input('order_details')? $request->input('order_details'): '';
      if(!empty($request->input('order_product.*'))){
        $orders->order_product = rtrim(implode(',', $request->input('order_product.*')),",");
      }else{
        $orders->order_product = '';
      }
      if(!empty($request->input('order_amount.*'))){
        $orders->order_amount = rtrim(implode(',', $request->input('order_amount.*')),",");
      }else{
        $orders->order_amount = '';
      }
      if(!empty($request->input('order_material.*'))){
        $orders->order_material = rtrim(implode(',', $request->input('order_material.*')),",");
      }else{
        $orders->order_material = '';
      }
      if(!empty($request->input('order_dimensionweight.*'))){
        $orders->order_dimensionweight  = rtrim(implode(',', $request->input('order_dimensionweight.*')),",");
      }else{
        $orders->order_dimensionweight  = '';
      }
      if(!empty($request->input('order_technical_drawingreference.*'))){
        $orders->order_technical_drawingreference = rtrim(implode(',', $request->input('order_technical_drawingreference.*')),",");
      }else{
        $orders->order_technical_drawingreference = '';
      }
      if(!empty($_POST['order_treatment'])){
        foreach ($_POST['order_treatment'] as $key => $value) {
          $orders->order_treatment = json_encode($value);
        }
      }
      if(!empty($_POST['order_treatment_details'])){
        foreach ($_POST['order_treatment_details'] as $key => $value) {
          $orders->order_treatment_details = json_encode($value);
        }
      }
      if(!empty($_POST['order_treatment_price'])){
        foreach ($_POST['order_treatment_price'] as $key => $value) {
          $orders->order_treatment_price = json_encode($value);
        }
      }
      $orders->order_qty                          = 1;
      $orders->order_exclusivity_status           = $request->input('order_exclusivity_status') == 'Yes' ? 1 : 0;
      $orders->save();
      echo response()->json(['success' => true]);
    }
    return response()
    ->json(['error' => $validator->errors()
    ->toArray() ]);
  }
  /**
  *
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id, $refnumber)
  {
    
    $order_id = $id;
    $ref = explode('-', $refnumber);
    $refnumber = implode('/', $ref);
    
    $items = DB::table('orders')
    ->select('id','client_id')
    ->where('id','=', $id)
    ->first();
    
    
    $id = $items->client_id;       
    
    $orders = DB::table('klantens')
    ->join('orders', 'klantens.id', '=', 'orders.client_id')
    ->where('klantens.id', $id)
    ->where('orders.order_reference_number', $refnumber)
    ->where('orders.id', $items->id)
    ->get();
    
    if(count($orders)>0){      
      $leveranciers = DB::table('leveranciers')->where('leveranciers.supplier_name', $orders[0]->order_supplier)->get();    
      $products = $this->handler->processOrder($order_id);      

      return view('orders_view', compact('orders', 'leveranciers', 'products'));
    }else{
       return abort(404);
  
    }
    
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, $id)
  {
    Orders::where('id', $id)->delete();
    return redirect()->back()->with('message', 'order id: ' . $id . ' has been deleted');
  } 
}
