<?php

namespace App\libs\Payment;

/**
 *
 */
interface PaymentInterface
{
    public function bpi();
    public function paypal();
    public function masterCard();
}
