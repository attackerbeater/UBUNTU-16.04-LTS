<?php
namespace App\Http\Controllers;

use Mail;
use DateTime;
use Validator;
use App\Orders;
use App\Klanten;
use App\Leveranciers;
use App\Http\Requests;
use App\OrderTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Mail\quoteRequestSentToSupplier;
use App\Beltech\Orders\OrdersAbstractHandler;

class StatusUpdateController extends Controller
{
  protected $abstractOrders;
  
  function __construct(OrdersAbstractHandler $abstractOrders){
    $this->abstractOrders = $abstractOrders;
  }
  
  /**
  * Display the specified resource.
  *
  * @param  int  $idate(format)
  * @return \Illuminate\Http\Response
  */
  public function orderProductTreatmentHasnoprice($id)
  {
    $newArr = $this->abstractOrders->orderProductListsNoPrice($id);
    foreach ($newArr as $key => $value) {
      echo view('order-producttreatment-hasno-price', ['value' => $value]);
    }
  }
  
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function editOrderProductTreatmentHasnoprice($id)
  {
    $newArr = $this->abstractOrders->orderProductListsNoPrice($id);
    foreach ($newArr as $key => $value) {
      echo view('order-order-product-treatment-hasno-price', ['value' => $value]);
    }
  }
  
  /**
  * Display the specified resource.
  *
  * @param  int  $idate(format)
  * @return \Illuminate\Http\Response
  */
  public function orderProductTreatmentHasprice($id)
  {
    $newArr = $this->abstractOrders->orderProductLists($id);
    // echo '<pre>';
    // print_r($newArr);
    foreach ($newArr as $key => $value) {
      echo view('order-product-treatment-has-price', ['value' => $value]);
    }
  }
  
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function editOrderProductTreatmentHasprice($id)
  {
    $newArr = $this->abstractOrders->orderProductLists($id);
    foreach ($newArr as $key => $value) {
      echo view('edit-order-product-treatment-has-price', ['value' => $value]);
    }
  }
  
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function orderTreatmentLists($id)
  {
    $output = [];
    
    $newArr = $this->abstractOrders->orderProductLists($id);
    foreach ($newArr as $key => $value) {
      // $order_treatment[$key] = $value['order_treatment'];
      // echo view('order-treatment-lists', ['value' => $value]);
      
      foreach ($value['order_treatment'] as $title) {
        $output['order_treatment'][] = $title;
      }
      
      foreach ($value['order_treatment_details'] as $details) {
        $output['order_treatment_details'][] = $details;
      }
    }    
    echo view('order-treatment-lists', ['output' => $output]);  
  }
  
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id){

    $input = [];
    if(array_key_exists('transport', $_POST) && empty($_POST['transport'])){
      $input['transport'] = 'required';
    }
    if(array_key_exists('transport_price', $_POST) && empty($_POST['transport_price'])){
      $input['transport_price'] = 'required';
    }
    if(array_key_exists('delivery_time', $_POST) && empty($_POST['delivery_time'])){
      $input['delivery_time'] = 'required';
    }
    $validator = Validator::make($request->all(), $input);
    
    if ($validator->passes()){
      $status = $request->input('status');
      $this->abstractOrders->orderSubmitIgnorePdf($request, $id, $status);
      echo response()->json(['success' => true]);
    }else{
      return response()->json(['error' => $validator->errors()->toArray()]);
    }
  }
}
