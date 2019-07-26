<?php
namespace code\Controller;

use code\generated\AtmModelFactory as AtmModelFactory;

//  Controller
class Atm {

	protected $_atmModelFactory;

	public function __construct(
		AtmModelFactory $atmModel
	){
		$this->_atmModelFactory = $atmModel;
	}

	public function execute(){
		$model = $this->_atmModelFactory->create();
		// $model->setPassword('2030');
		// $model->setAmount('3000');
		// return $model->withdraw();

		return $model->getModules();
	}
}
