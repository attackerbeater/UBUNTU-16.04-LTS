<?php

namespace AcmeWidgets\ProductPromoter\Controller\Form;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Contactus extends Action {

  protected $resultPageFactory;

  public function __construct(
    Context $context,
    PageFactory $resultPageFactory
  ){
    $this->resultPageFactory = $resultPageFactory;
    parent::__construct($context);
  }

  public function execute(){
    $result = $this->resultPageFactory->create();
    return $result;
  }

}
