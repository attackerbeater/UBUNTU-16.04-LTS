<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libs\Payment\PaymentInterface as Payment;
use App\libs\Log\Logger;
class PaymentController extends Controller {

    protected $paymentObject;
    protected $logObject;
    public function __construct(Payment $p, Logger $log){
        $this->paymentObject = $p;
        $this->logObject = $log;
    }

    public function processBpi(){
        try {
            $this->paymentObject->bpi();
        } catch (\Exception $e) {
            echo $this->logObject->writeLog('you processing is error 404');
        }
    }

    public function processPaypal(){
        $this->paymentObject->paypal();
    }

    public function processMasterCard(){
        $this->paymentObject->masterCard();
    }

}
