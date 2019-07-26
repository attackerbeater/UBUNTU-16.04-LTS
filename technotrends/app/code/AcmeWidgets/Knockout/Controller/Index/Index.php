<?php
namespace AcmeWidgets\Knockout\Controller\Index;

class Index extends \AcmeWidgets\Knockout\Controller\AbstractIndex {

    public function execute(){
      $page = $this->_resultPageFactory->create();
      return $page;
    }
}
