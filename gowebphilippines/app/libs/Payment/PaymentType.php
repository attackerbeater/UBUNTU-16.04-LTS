<?php

namespace App\libs\Payment;

use App\libs\Payment\PaymentInterface;
use App\libs\Payment\Paypal as Paypal;
class PaymentType implements PaymentInterface {

    protected $bpi;
    protected $paypal;
    protected $mastercard;

    function __construct(Bpi $b, Paypal $p, MasterCard $m){
      $this->bpi = $b;
      $this->paypal = $p;
      $this->mastercard = $m;
    }

    public function bpi(){
      $this->bpi->processToPay();
    }

    public function paypal(){
      $this->paypal->processToPay();
    }

    public function masterCard(){
      $this->mastercard->processToPay();
    }

}
