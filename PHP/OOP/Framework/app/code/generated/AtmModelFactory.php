<?php
namespace code\generated;

use code\Helper\CurrencyHelper as CurrencyHelper;
use code\Model\AtmModel as AtmModel;

// Factory Model Pattern
class AtmModelFactory {

	public function create(){
		return new AtmModel(new CurrencyHelper('fil-PH', 'PH'));
	}

}
