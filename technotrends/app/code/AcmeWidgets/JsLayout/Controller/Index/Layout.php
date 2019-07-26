<?php
namespace AcmeWidgets\JsLayout\Controller\Index;

class Layout extends \AcmeWidgets\JsLayout\Controller\AbstractIndex {

    public function execute(){
      $page = $this->_resultPageFactory->create();
      return $page;
    }
}
