<?php
namespace code\Model;

use code\Abstracts\AbstractModel as AbstractModel;
use code\Api\AtmRepositoryInterface as AtmRepositoryInterface;
use code\Helper\CurrencyHelper as CurrencyHelper;
use lib\Database\Database as Database;

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

	public function getModules(){
		$db = Database::getInstance();
		$statement = 'SELECT * FROM setup_module';
		echo '<pre>';
		if ($result = $db->query($statement)) {
		    while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
		      print_r($row);
		    }
		}
	}
}
