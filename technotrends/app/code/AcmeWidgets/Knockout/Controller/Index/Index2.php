<?php
namespace AcmeWidgets\Knockout\Controller\Index;

class Index2 extends \AcmeWidgets\Knockout\Controller\AbstractIndex {

    public function execute(){
      $page = $this->_resultPageFactory->create();
      return $page;
    }
}
