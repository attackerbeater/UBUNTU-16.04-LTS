<?php

namespace AcmeWidgets\ProductPromoter\Controller\Results;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Forward extends Action {

  protected $resultPageFactory;

	public function __construct(
    Context $context,
    PageFactory $resultPageFactory
  ){
    $this->resultPageFactory = $resultPageFactory;
    parent::__construct($context);
  }

  public function execute(){
    $parameters =array('product'=>'Power Bank','tranxId'=>'TRX-1234');
    $this->_forward('Message','Purchase','thankyou',  $parameters );
  }
}
