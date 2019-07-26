<?php

namespace AcmeWidgets\ProductPromoter\Controller\Results;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class Json extends Action {

  protected $resultJsonFactory;

  public function __construct(
    Context $context,
    JsonFactory $resultJsonFactory
  ){
    $this->resultJsonFactory = $resultJsonFactory;
    parent::__construct($context);
  }

  public function execute(){
    $result = $this->resultJsonFactory->create();
    $message = [
      'name' => 'John',
      'lastname' => 'Junsay',
      'email' => 'junsayjohn4@gmail.com',
      'age' => 34
    ];
    $result->setData(['Test-Message' => $message]);
    return $result;
  }
}
