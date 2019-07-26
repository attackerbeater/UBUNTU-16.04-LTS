<?php
namespace Magestudy\Controller\Model;

class Class2 {

  protected $_argOfClass2;
  public function __construct(\Magestudy\Controller\Model\Class3 $argOfClass2){
    $this->_argOfClass2 = $argOfClass2;
  }
}
