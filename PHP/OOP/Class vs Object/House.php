<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Blue print
// Class is generic
// Class defines properties/functions of an Object
class House {

  public $_no_of_room;
  public $_no_of_comfort_room;

  public function addRoom($number){
    return $this->_no_of_room = $number;
  }
}

// the Object is your actual House
// Object is specific
// Object is an instance of a Class
// You can instantiate an object, but not a Class

$objHouse1 = new House();
$objHouse1->addRoom(6);
echo $objHouse1->_no_of_room;

echo '<br/>';
$objHouse2 = new House();
$objHouse2->addRoom(3);
echo $objHouse2->_no_of_room;

echo '<br/>';
$objHouse3 = new House();
$objHouse3->addRoom(1);
echo $objHouse3->_no_of_room;
