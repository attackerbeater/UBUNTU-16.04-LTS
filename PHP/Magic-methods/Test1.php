<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '-1');
echo '<pre>';

class Atm {

  protected $_private_property = 'private property value';
  public $_connection;

  function __call($method, $params){
    var_dump($method. ' is call using __call', $params);
  }

  function __callStatic($method, $params){
    var_dump($method. ' is call using __callStatic', $params);
  }

  function __isset($name){
    var_dump('__isset is call the '.$name);
    return $this->$name;
  }

  function __set($name, $value){
    var_dump('set unknownProperty');
    $this->$name = $value;
  } 

  function __get($name){
    var_dump('call unknownProperty');
    return $this->$name;
  }

  function __toString(){
    return "{$this->unknownProperty}";
  }

  function __clone(){
    $this->unknownProperty = 'Copy '.$this->unknownProperty. ' using __clone'; 
  }  

  function __invoke($num1, $num2){
    return $num1 + $num2;
  }

  function __construct(){
    print "This is the constructor \n";
    var_dump(property_exists($this, 'unknownProperty'));
  }

  function __destruct(){
    if(property_exists($this, 'unknownProperty')){
      print "This is the destruct \n";
      // return unset($this->unknownProperty);
    }
  }

  function __unset($name){
    print "__unset is call to check if\t" . $name. "\tis accessing\n";
    unset($this->$name);
  }

  function __sleep(){
    print "__sleep is call\n";
    $this->_connection = false;
    return ['_connection'];
  }

  function __wakeup(){
    print "__wakeup is call\n";
    $this->_connection = true;
  }
}

$atm = new Atm;
// __call
$atm->unknownMethod();
// __callStatic
Atm::unknownStaticMethod(1,'a','b','c');
// __isset
echo var_dump(isset($atm->unknownProperty)). " checks if the property is exists using __isset \n";
// __set
$atm->unknownProperty = 'unknownProperty Value';
// __isset
echo var_dump(isset($atm->unknownProperty)). " checks if the property is exists using __isset \n";
// __get
echo $atm->unknownProperty."\n";
// __toString
echo $atm. " is call using __toString \n";
// __clone
$clone = clone $atm;
echo $clone->unknownProperty. "\n";
// __invoke
echo $atm(1,2). " value from a class call as a function using __invoke \n";

// before calling __unset to unset the property
echo $atm->_private_property. "\tis exists \n";
// __unset
unset($atm->_private_property);
// after calling __unset to unset the property
echo $atm->_private_property. "\tis not exists \n";
// __isset 
$atm = serialize($atm);
echo $atm. "\n";
// __unset
$atm = unserialize($atm);
echo $atm->_connection. " _connection is set to on using __wakeup\n";