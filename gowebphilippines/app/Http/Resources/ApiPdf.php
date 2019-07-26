<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ApiPdf extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // return parent::toArray($request);
      return [
        'id' =>$this->id,
        'order_number_from_client' =>$this->order_number_from_client
      ]; 
    }
}
