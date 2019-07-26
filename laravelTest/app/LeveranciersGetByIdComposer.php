<?php 
namespace App;

class LeveranciersGetByIdComposer {

	public function __construct(\App\Leveranciers\Repository $leveranciers){

		$this->leveranciers = $leveranciers;
	}


	public function create(\Illuminate\View\View $view){
		$view->with('getById', $this->leveranciers->getById(\App\Leveranciers::first()));
	}
}

