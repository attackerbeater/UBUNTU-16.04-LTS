<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

interface InformationInterface {
  public function getFirstName();
  public function getLastName();
  public function getAge();
  public function getTelephone();
  public function getCountry();
  public function getCity();
  public function getTown();
  public function getPosttalCode();
  public function getHouseNumber();
}

interface CustomerInterface {
  public function getFirstName();
  public function getLastName();
  public function getAge();
  public function getTelephone();

}

interface CustomerAddressInterface {
  public function getCountry();
  // public function getCity();
}

class GetCustomerInfo implements CustomerInterface, CustomerAddressInterface{

  private $_data = [];

  // protected $_customer;
  //
  public function __construct(
    // CustomerInterface $customer
  ){
    // $this->_customer = $customer;
    $this->getFirstName();
    $this->getLastName();
    $this->getAge();
    $this->getTelephone();

    // customer address
    $this->getCountry();
  }

  public function execute(){
    // $this->_customer->getFirstName();
    return $this->_data;
  }

  // customer info
  public function getFirstName(){
    return $this->_data['first_name'] = 'John';
  }

  public function getLastName(){
    return $this->_data['last_name'] = 'Junsay';
  }

  public function getAge(){
    return $this->_data['age'] = '34';
  }

  public function getTelephone(){
    return $this->_data['telephone'] = '09158398803';
  }

  // customer address info
  public function getCountry(){
    return $this->_data['country'] = 'Philippines';
  }

}


$p = new GetCustomerInfo();
echo '<pre>';
print_r($p->execute());
