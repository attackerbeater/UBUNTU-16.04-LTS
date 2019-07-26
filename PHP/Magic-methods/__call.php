<?php
// called when somebody is calling nonexistent object method in object
// https://riptutorial.com/php/example/4603/--call---and---callstatic--
class Call {

  public function __call($method, $arguments){
    return 'call non existing method';

  }
}

$objCall = new Call();
var_dump($objCall->test());
