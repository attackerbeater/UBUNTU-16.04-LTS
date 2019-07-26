<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '-1');
echo '<pre>';

abstract class AbstractModel {
	// checks if method is call
	function __call($method, $args){
		try {
			if(!method_exists($this, $method)){
				throw new Exception("unknown method $method called");
			}	
		} catch (Exception $e) {
			print $e->getMessage();
		}
	}
}

//  Factory Model Pattern
class AtmModelFactory {
	public function create(){
		return new AtmModel(new CurrencyHelper('fil-PH', 'PH')); 
	}
}

// Helper
class CurrencyHelper {

	private $_locale; //browser or user locale
	private $_currency;
	private $_ftm;
	public  $_symbol;

	public function __construct($locate,$currency){
		$this->_locale = $locate;
		$this->_currency = $currency;
		$this->_fmt = new NumberFormatter($this->_locale."@currency=$this->_currency", NumberFormatter::CURRENCY );		
		$this->getSymbol();		
	}
	
	public function getSymbol(){ 
		$this->_symbol = $this->_fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
		header("Content-Type: text/html; charset=UTF-8;");
	}
}

// Api
interface AtmRepositoryInterface{
	public function setPassword($password);
	public function getPasswordHash();
	public function setAmount($amount);
	public function getAmount();
}


//  class
class AtmModel extends AbstractModel implements AtmRepositoryInterface {

	private $_first_name;
	private $_middle_name;
	private $_last_name;
	private $_email;
	private $_dob; // date of birth

	private $_account_no;
	private $_account_pwd; // account password

	private $_bank_name; // eg: bpi, bdo, security bank, china bank
	private $_dor; // date of registration
	private $_doexp; // date of expiration

	private $_amount;

	private $_currency;

	public function __construct(
		CurrencyHelper $currency
	){
		$this->_currency = $currency;
	}

	public function setPassword($password){
		$this->_account_pwd = $password;
	} 

	public function getPasswordHash(){
		return $this->_account_pwd;	
	}

	public function setAmount($amount){
		$this->_amount = $amount;
	}

	public function getAmount(){
		return $this->_amount;
	}

	public function withdraw(){
		// claim your money
		if($this->getPasswordHash() == '2030'){
			$amount = $this->_currency->_symbol.number_format($this->getAmount(), 2);
			return "Amount $amount";
		}	
	}

}

//  Controller
class Atm {

	protected $_atmModelFactory;

	function __construct(
		AtmModelFactory $atmModel
	){
		$this->_atmModelFactory = $atmModel;
	}

	public function execute(){
		$model = $this->_atmModelFactory->create();	
		$model->setPassword('2030');
		$model->setAmount('3000');
		return $model->withdraw();		
	}
}

class View {

	// private $model;
    private $controller;

    public function __construct($controller) {
        $this->controller = $controller;
        // $this->model = $model;
    }

    public function output() {
        return $this->controller->execute();
    }
}


// object View

//  Atm Mode lFactory 
$atmModelFactory = new AtmModelFactory();
//  Atm Controller
$atm = new Atm($atmModelFactory);
// echo $atm->execute();
// View 
$view = new View($atm);
echo $view->output();