<?php

// https://riptutorial.com/php/example/3635/--get------set------isset---and---unset--

class GetAndSet {

  private $data = [];

  public function __set($name, $value){
      $this->data[$name] = $value;
  }

  public function __get($name){
      return $this->data[$name];
  }

}

$obj = new GetAndSet();
$obj->da = 2;
echo $obj->da;
