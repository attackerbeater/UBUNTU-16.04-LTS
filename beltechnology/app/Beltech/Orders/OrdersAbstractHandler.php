<?php
namespace App\Beltech\Orders;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Validator;
use DateTime;
use App\Beltech\AbstractOrders;
use App\Beltech\Orders\OrderFunctionHandler;
use App\Beltech\Pdf\PdfFunctionHandler;
class OrdersAbstractHandler extends AbstractOrders {
	protected $_orderFunctionHandler;
	protected $_pdfFunctionHandler;
	protected $now;
	public function __construct(
		OrderFunctionHandler $orderFunctionHandler, 
		PdfFunctionHandler $pdfFunctionHandler
	){
		$this->_orderFunctionHandler = $orderFunctionHandler;
		$this->_pdfFunctionHandler = $pdfFunctionHandler;
		$this->now = new DateTime;
	}
	/**
	* Get request handler
	*
	* @return \Illuminate\Http\Response
	*/
	public function orderProductLists($id){
		return $this->_orderFunctionHandler->processOrder($id);
	}
	/**
	* Get request handler
	*
	* @return \Illuminate\Http\Response
	*/
	public function orderProductListsNoPrice($id){
		return $this->_orderFunctionHandler->processOrder($id);
	}
	/**
	* Post request handler
	*
	* @return \Illuminate\Http\Response
	*/
	public function orderSubmitIgnorePdf($request, $id, $status)
	{			
		$orders = DB::table('orders')->select('id', 'client_id')->where('id', $id)->get();
		$date = $this->now;
		$hasfile = $request->input('file');
		$path = $request->input('path');
		$column = $request->input('column');
		
		// echo '<pre>';
		// if($request->input('status_update')){
		// 	echo 1;
		// }else{
		// 	echo 2;
		// }
		// die();
		
		if($request->input('status_update'))
		{
			if($request->input('is_upload'))
			{
				echo 'step 1';					
				$name = $request->quote_supplier_received;
				$dataindex ='quote_supplier_received';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 					
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}						
				/** ##################################################################### */				
				$name = $request->upload_client_confirmation;
				$dataindex ='upload_client_confirmation';				
				$path = 'client';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}			
				/** ##################################################################### */	
				// Step 4
				$name = $request->quote_acceptance_from_client;
				$dataindex ='quote_acceptance_from_client';				
				$path = 'client';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */
				// Step 6	
				$name = $request->upload_confirmation_supplier_doc;
				$dataindex ='upload_confirmation_supplier_doc';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */
				// Step 7 - 2
				$name = $request->goods_received_from_client;
				$dataindex ='goods_received_from_client';				
				$path = 'client';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */
				// Step 8
				$name = $request->goods_sent_from_supplier;
				$dataindex ='goods_sent_from_supplier';	
				// $data['xxx'] = $dataindex;			
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */
				// Step 9
				$name = $request->good_received_from_supplier;
				$dataindex ='good_received_from_supplier';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */
				// Step 11
				$name = $request->upload_delivery_document;
				$dataindex ='upload_delivery_document';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					// $data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */			
				if($request->input('transport_price')){
					$data['transport_price'] = $request->input('transport_price');					
				}
				$data['is_update'] = 1;
			} else {
				
				// echo 13124124;
				// die();
				$hasfile = $request->input('file');
				$path = $request->input('path');
				if($hasfile && $path){
					$data = $this->_orderFunctionHandler->orderStatusPostRequest($request, $hasfile,$path, $id);
				}
			}
		}
		else
		{

			if($request->input('is_upload'))
			{										
				echo 'step 2';
				$name = $request->quote_supplier_received;
				$dataindex ='quote_supplier_received';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					$data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}					
				
				/** ##################################################################### */				
				// step 4
				$name = $request->quote_acceptance_from_client;
				$dataindex ='quote_acceptance_from_client';				
				$path = 'client';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					$data['order_status'] = $status;	
					Orders::where('id', $id)->update($data);
					echo '<pre>';
					print_r($data);		
				}
				
				/** ##################################################################### */
				// Step 6	
				$name = $request->upload_confirmation_supplier_doc;
				$dataindex ='upload_confirmation_supplier_doc';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					$data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);			
				}
				
				/** ##################################################################### */
				// Step 7 - 2
				$name = $request->goods_received_from_client;
				$dataindex ='goods_received_from_client';				
				$path = 'client';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);
					$data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				
				/** ##################################################################### */
				// Step 8
				$name = $request->goods_sent_from_supplier;
				$dataindex ='goods_sent_from_supplier';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);	
					$data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				
				/** ##################################################################### */
				// Step 9
				$name = $request->good_received_from_supplier;
				$dataindex ='good_received_from_supplier';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);	
					$data['order_status'] = $status;	
					echo '<pre>';
					print_r($data);
					Orders::where('id', $id)->update($data);
				}
				/** ##################################################################### */
				// Step 11

				$name = $request->upload_delivery_document;
				$dataindex ='upload_delivery_document';				
				$path = 'supplier';
				$client_id = $orders[0]->client_id; 				
				if($name && $dataindex && $path && $client_id){
					$data = $this->_pdfFunctionHandler->uploadpdffile($name, $dataindex, $path, $id, $client_id, $date, $column);	
					$data['order_status'] = $status;	
					Orders::where('id', $id)->update($data);
					echo '<pre>';
					print_r($data);								
				}
				
				/** ##################################################################### */	
				if($request->input('transport_price')){
					$data['transport_price'] = $request->input('transport_price');			
					echo 'transport_price';
				}
				$data['is_update'] = 1;	
				
			} 
			else 
			{
				echo 'xxxx';
				// $hasfile = $request->input('file');
				// $path = $request->input('path');
				if($hasfile && $path){	
					$data = $this->_orderFunctionHandler->orderStatusPostRequest($request, $hasfile,$path, $id);
				}
			}
			
			// $data['order_status'] = $status;	
		
		}		
		// echo '<pre>';
		// print_r($data);
		// 
		
		if(!empty($data) && count($data) > 0)
		{
			if (!array_key_exists('quote_supplier_received', $data) ||
					!array_key_exists('quote_acceptance_from_client', $data) ||
					!array_key_exists('upload_confirmation_supplier_doc', $data) ||
					!array_key_exists('goods_received_from_client', $data) ||
					!array_key_exists('goods_sent_from_supplier', $data) ||
					!array_key_exists('good_received_from_supplier', $data) ||
					!array_key_exists('upload_delivery_document', $data)
			) 
			{
		   
				// 
				// 
				echo 1;
				echo '<br/>';
				echo '<pre>';
				echo 123124;
				if($status){
					$data['order_status'] = $status;
					print_r($data);	
					Orders::where('id', $id)->update($data);		

				}		
				
			}
			else
			{
				echo 2;
			}
		}
		else
		{
			echo 3;		
			$data['order_status'] = $status;	
			var_dump($data);
			Orders::where('id', $id)->update($data);
			// 	
		}	
		
		return response()->json(['success' => true]);	
	
	}
}
