<?php
namespace code\Helper;

// Helper
class CurrencyHelper {

	private $_locale; //browser or user locale
	private $_currency;
	private $_ftm;
	public  $_symbol;

	public function __construct($locate,$currency){
		$this->_locale = $locate;
		$this->_currency = $currency;
		$this->_fmt = new \NumberFormatter($this->_locale."@currency=$this->_currency", \NumberFormatter::CURRENCY );
		$this->getSymbol();
	}

	public function getSymbol(){
		$this->_symbol = $this->_fmt->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
		header("Content-Type: text/html; charset=UTF-8;");
	}
}
