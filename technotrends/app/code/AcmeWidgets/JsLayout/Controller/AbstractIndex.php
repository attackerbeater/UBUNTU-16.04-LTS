<?php
namespace AcmeWidgets\JsLayout\Controller;

abstract class AbstractIndex extends \Magento\Framework\App\Action\Action {

    protected $_resultPageFactory;

    public function __construct(
      \Magento\Framework\App\Action\Context $context,
      \Magento\Framework\View\Result\PageFactory $pageFactory
    ){
      $this->_resultPageFactory = $pageFactory;
      parent::__construct($context);
    }

}
