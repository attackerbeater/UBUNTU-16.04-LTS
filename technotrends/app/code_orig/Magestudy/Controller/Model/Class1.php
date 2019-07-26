<?php
namespace Magestudy\Controller\Model;

class Class1 {

  protected $_argOfClass1;
  public function __construct(\Magestudy\Controller\Model\Class2 $argOfClass1){
    $this->_argOfClass1 = $argOfClass1;
  }
}
