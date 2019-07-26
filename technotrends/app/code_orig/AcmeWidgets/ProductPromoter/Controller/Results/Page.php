<?php

namespace AcmeWidgets\ProductPromoter\Controller\Results;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use AcmeWidgets\ProductPromoter\Model\ProductLoader;


class Page extends Action {

  protected $resultPageFactory;
  protected $productLoader;

  public function __construct(
    Context $context,
    PageFactory $resultPageFactory,
    ProductLoader $productLoader
  ){
    $this->resultPageFactory = $resultPageFactory;
    $this->productLoader = $productLoader;
    parent::__construct($context);
  }

  public function execute(){
      
    // echo '<pre>';  
    // print_r($this->productLoader->getBundleProducts());

    // die();
    $result = $this->resultPageFactory->create();
    return $result;
  }

}
