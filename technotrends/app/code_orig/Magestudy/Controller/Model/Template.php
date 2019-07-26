<?php
namespace Magestudy\Controller\Model;

class Template {

  protected $_template;
  public function __construct($template = 'default'){
    $this->_template = $template;  
  }

}
