<?php

// https://riptutorial.com/php/example/4157/--construct---and---destruct--

class ConstructDestruct {

  public $_property;

  public function __construct(){
    $this->_property = 1;
  }

  public function __destruct(){
    $this->_property = 0;
  }
}

$objConstructDestruct = new ConstructDestruct();
var_dump($objConstructDestruct->_property);
unset($objConstructDestruct);
var_dump($objConstructDestruct->_property);
