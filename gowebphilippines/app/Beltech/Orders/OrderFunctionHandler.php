<?php
namespace App\Beltech\Orders;
use App\Orders;
use Illuminate\Support\Facades\DB;
use DateTime;
class OrderFunctionHandler {
	
	protected $now;
	
	function __construct(){
		$this->now = new DateTime;
	}
	
	public function processOrder($id){
		
		$ordered = DB::table('orders')->select('*')->where('id', $id)->get();
		
		$datas = [];
		
		$order_product = $ordered[0]->order_product;
		$datas['order_product'] = $order_product;
		
		$order_amount = $ordered[0]->order_amount;
		$datas['order_amount'] = $order_amount;
		
		$order_material = $ordered[0]->order_material;
		$datas['order_material'] = $order_material;
		
		$order_dimensionweight = $ordered[0]->order_dimensionweight;
		$datas['order_dimensionweight'] = $order_dimensionweight;
		
		$order_technical_drawingreference = $ordered[0]->order_technical_drawingreference;
		$datas['order_technical_drawingreference'] = $order_technical_drawingreference;
		
		$order_treatment = json_decode($ordered[0]->order_treatment);
		$datas['order_treatment'] = $order_treatment;
		
		$order_treatment_details = json_decode($ordered[0]->order_treatment_details);
		$datas['order_treatment_details'] = $order_treatment_details;
		
		$order_treatment_price = json_decode($ordered[0]->order_treatment_price);
		$datas['order_treatment_price'] = $order_treatment_price;
		
		$arr = [];
		foreach (json_decode(json_encode($datas), true) as $key => $value) {
			
			if(is_array($value)){
				$arr[$key] = $value;
			}else{
				$arr[$key] = explode(',',$value);
			}
			
		}
		
		$newArr = [];
		foreach ($arr as $key => $value) {
			
			if($key == 'order_product'){
				
				for ($i=0; $i < count($value); $i++) {
					$newArr[]['order_product'] = $value[$i];
				}
				
			}
		}
		
		foreach ($arr as $key => $value) {
			
			if($key == 'order_amount'){
				
				for ($i=0; $i < count($value); $i++) {
					$newArr[$i]['order_amount'] = $value[$i];
				}
				
			}
		}
		
		foreach ($arr as $key => $value) {
			
			if($key == 'order_material'){
				
				for ($i=0; $i < count($value); $i++) {
					$newArr[$i]['order_material'] = $value[$i];
				}
				
			}
		}
		
		foreach ($arr as $key => $value) {
			
			if($key == 'order_dimensionweight'){
				
				for ($i=0; $i < count($value); $i++) {
					$newArr[$i]['order_dimensionweight'] = $value[$i];
				}
				
			}
			
		}
		
		foreach ($arr as $key => $value) {
			
			if($key == 'order_technical_drawingreference'){
				
				for ($i=0; $i < count($value); $i++) {
					$newArr[$i]['order_technical_drawingreference'] = $value[$i];
				}
				
			}
			
		}
		foreach ($arr as $key => $value) {
			
			if($key == 'order_treatment'){
				
				foreach ($value as $key => $value) {
					$product_name = $key;
					$key = array_search($product_name, array_column($newArr, 'order_product'));
					$newArr[$key]['order_treatment'] = $value;
					
				}
			}
		}
		
		foreach ($arr as $key => $value) {
			
			if($key == 'order_treatment_details'){
				
				foreach ($value as $key => $value) {
					$product_name = $key;
					$key = array_search($product_name, array_column($newArr, 'order_product'));
					$newArr[$key]['order_treatment_details'] = $value;
				}
			}
		}
		
		foreach ($arr as $key => $value) {
			
			if($key == 'order_treatment_price'){
				
				foreach ($value as $key => $value) {
					$product_name = $key;
					$key = array_search($key, array_column($newArr, 'order_product'));
					$newArr[$key]['order_treatment_price'] = $value? $value: 0;
				}
			}
		}
		
			
		// foreach ($arr as $key => $value) {
		// 
		// 	if($key == 'transport_price'){
		// 
		// 		foreach ($value as $key => $value) {
		// 			$product_name = $key;
		// 			$key = array_search($product_name, array_column($newArr, 'order_product'));
		// 			$newArr[$key]['transport_price'] = $value;
		// 		}
		// 	}
		// }
		
		return $newArr;
	}
	
	public function orderStatusUploadRequest($request, $hasfile,$path, $column, $orders, $id){
		
		if ($request->hasFile($hasfile))
		{
			$fileName = str_replace(' ', '_', $request->file($hasfile)->getClientOriginalName());
			if ($fileName){
				$request->file($hasfile)->move(storage_path() . "/{$path}/{$orders[0]->id}", $fileName);
				$data[$column]    = "storage/{$path}/{$orders[0]->id}/" . $fileName;
				$data[$column]   = $this->now;
			}
		}
		
		$data['is_update'] = 1;
		return $data;
	}
	
	/**
	* Post request handler
	*
	* @return \Illuminate\Http\Response
	*/
	public function orderStatusPostRequest($request, $hasfile, $path, $id){
		
		if(!empty($request->input('order_subject'))){
			$data['order_subject'] = $request->input('order_subject');
		}
		
		if(!empty($request->input('transport'))){
			$data['transport'] = $request->input('transport');
		}
		
		if(!empty($request->input('delivery_time'))){
			$data['delivery_time'] = $request->input('delivery_time');
		}
		
		if(!empty($request->input('order_product.*'))){
			$data['order_product'] = implode(',', $request->input('order_product.*'));
		}
		else{
			$data['order_product'] = '';
		}
		
		if(!empty($request->input('order_amount.*'))){
			$data['order_amount'] = implode(',', $request->input('order_amount.*'));
		}
		else{
			$data['order_amount'] = '';
		}
		
		if(!empty($request->input('order_material.*'))){
			$data['order_material'] = implode(',', $request->input('order_material.*'));
		}
		else{
			$data['order_material'] = '';
		}
		
		if(!empty($request->input('order_dimensionweight.*'))){
			$data['order_dimensionweight'] = implode(',', $request->input('order_dimensionweight.*'));
		}
		else{
			$data['order_dimensionweight'] = '';
		}
		
		if(!empty($request->input('order_technical_drawingreference.*'))){
			$data['order_technical_drawingreference'] = implode(',', $request->input('order_technical_drawingreference.*'));
		}
		else{
			$data['order_technical_drawingreference'] = '';
		}
		
		if(!empty($_POST['order_treatment'])){
			foreach ($_POST['order_treatment'] as $key => $value) {
				$data['order_treatment'] = json_encode($value);
			}
		}
		else{
			$data['order_treatment'] = '';
		}
		
		if(!empty($_POST['order_treatment_details'])){
			foreach ($_POST['order_treatment_details'] as $key => $value) {
				$data['order_treatment_details'] = json_encode($value);
			}
		}
		else{
			$data['order_treatment_details'] = '';
		}
		
		if(!empty($_POST['order_treatment_price'])){
			foreach ($_POST['order_treatment_price'] as $key => $value) {
				$data['order_treatment_price'] = json_encode($value);
			}
		}
		
		if ($request->hasFile($hasfile))
		{
			$fileName = str_replace(' ', '_', $request->file($hasfile)->getClientOriginalName());
			$data[$hasfile] = $fileName;
			$request->file($hasfile)->move(storage_path() . "/{$path}/".$id, $fileName);
			$data[$hasfile] = "storage/{$path}/{$id}/" . $data[$hasfile];
		}
		
		if($request->input('transport_price')){
			$data['transport_price'] = $request->input('transport_price');					
		}
		
		$data['is_update'] = 1;
		
		return $data;
	}
	
	
}
