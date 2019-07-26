<?php

namespace App\Acme;

abstract class Transformer	 {

    //transformCollection the lessons data and return only requried fields
    public function transformCollection($items) {

        return array_map([$this, 'transform'], $items);

    }


    //transform the lessons data and return only requried fields of perticular id
    public abstract function transform($item);

}