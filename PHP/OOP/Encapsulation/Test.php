<?php
ini_set('display_errors',0);
error_reporting(E_ALL);

class Atm {

  private $_password;
  private $_amount;

  public function widthraw(){

    if($this->_password){
      try {
        if($this->_password == 2030){
          return "get the amount {$this->getAmount()} for the password {$this->getPassword()}";
        }
        else{
          throw new \Exception("Error Processing Request your password is invalid");
        }
      } catch (\Exception $e) {
          return $e->getMessage();
      }
      finally {

      }
    }
  }

  public function setPassword($password){
    return $this->_password = $password;
  }

  public function getPassword(){
    return $this->_password;
  }

  public function setAmount($amount){
    return $this->_amount = $amount;
  }

  public function getAmount(){
    return $this->_amount;
  }

}

$atm = new Atm();
$atm->setPassword('2031');
$atm->setAmount('10000');
echo $atm->widthraw();



//
// class Person {
// 	private $name;
//
// 	public function setName($name) {
// 		$this->name = $name;
// 	}
//
// 	public function getName() {
// 		return $this->name;
// 	}
// }
//
// $robin = new Person();
// $robin->setName('Robin');
// echo $robin->getName();
