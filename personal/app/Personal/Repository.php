<?php

namespace App\Personal;

use App\Personal;
use Illuminate\Support\Facades\DB;

class Repository {

	public function getIndex(){
	  $data['version'] = '5.8';
		return view('personal.home', $data);	
	}

}
