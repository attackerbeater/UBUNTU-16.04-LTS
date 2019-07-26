<?php

namespace App\libs\Car;

use App\libs\Car\CarInterface;
use App\Orders; //car model
class CarEloquent implements CarInterface {
    protected $orders;

    function __construct(Orders $a) {
        $this->orders = $a;
    }
    public function getAll(){ // from car interface
        return $this->orders->all(); // from model
    }
}
