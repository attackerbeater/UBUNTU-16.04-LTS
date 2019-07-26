<?php

namespace AcmeWidgets\ProductPromoter\Controller\Results;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Redirect extends Action {

  public function execute(){
    $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
    $result->setPath('productpromoter/index/index');
    return $result;
  }
}
