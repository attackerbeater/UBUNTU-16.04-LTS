<?php

namespace AcmeWidgets\ProductPromoter\Controller\Results;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RawFactory;

class Raw extends Action {

  protected $resultRawFactory;

  public function __construct(
    Context $context,
    RawFactory $resultRawFactory
  ){
    $this->resultRawFactory = $resultRawFactory;
    parent::__construct($context);
  }

  public function execute(){
    $result = $this->resultRawFactory->create();
    // Return XML data
    $result->setHeader('Content-Type', 'text/xml');
    $result->setContents('<user>
                            <name>Mukesh Chapagain</name>
                            <country>Nepal</country>
                        </user>');
    return $result;
  }
}
