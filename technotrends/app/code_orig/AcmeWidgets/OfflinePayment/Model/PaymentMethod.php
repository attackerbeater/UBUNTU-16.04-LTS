<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AcmeWidgets\OfflinePayment\Model;

/**
 * Pay In Store payment method model
 */
class PaymentMethod extends \Magento\Payment\Model\Method\AbstractMethod
{

    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = 'paymentmethod';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;
}
