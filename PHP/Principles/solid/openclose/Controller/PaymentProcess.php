<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

interface PaymentMethodInterface {
  public function processPayment();
  public function ignore();
}

class PaymentManager {

  protected $_paymentMethod;

  public function __construct(PaymentMethodInterface $payment){
    $this->_paymentMethod = $payment;
  }

  public function process(){
    return $this->_paymentMethod->processPayment(). ' - ' .$this->_paymentMethod->ignore();
  }
}

class Braintree implements PaymentMethodInterface {

  public function processPayment(){
    return "process payment by Braintree";
  }

  public function ignore(){
    return __METHOD__;
  }
}

class MasterCard implements PaymentMethodInterface {

  public function processPayment(){
    return "process payment by MasterCard";
  }

  public function ignore(){
    return __METHOD__;
  }
}


// $paymentMethodInterface = new PaymentMethodInterface();

// Braintree credit card
$braintree = new Braintree();
$braintreePaymentManager = new PaymentManager($braintree);
echo $braintreePaymentManager->process();
echo '<br/>';

$masterCard = new MasterCard();
$braintreePaymentManager = new PaymentManager($masterCard);
echo $braintreePaymentManager->process();
