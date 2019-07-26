<?php
namespace Ewave\ServiceContract\Contoller\Form;

class Index extends \Magento\Framework\App\Action\Action {

  protected $_resultsPageFactory;

  public function __construct(
      \Magento\Framework\App\Action\Context $context,
      \Magento\Framework\View\Result\PageFactory $page
  ){
      $this->_resultsPageFactory = $page;
      parent::__construct($context);
  }

  public function execute(){
    $page = $this->_resultsPageFactory->create();
    return $page;
  }

}
