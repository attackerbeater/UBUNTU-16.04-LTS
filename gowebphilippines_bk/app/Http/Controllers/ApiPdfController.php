<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Orders;
use App\Http\Resources\ApiPdf as ApiPdfResource;

class ApiPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Orders::paginate(3);
      return ApiPdfResource::collection($orders);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $orders = $request->isMethod('PUT')? Orders::findOrFail($request->id) : new Orders;
      
      $post = $request->order_number_from_client;
      
      // print_r($orders);
      
      if($orders->save()){
        return new ApiPdfResource($post);
      }
    }
    
}
