<?php

namespace App\Exceptions;

use Exception;

class ActionNotCompletedException extends Exception
{
    
    public function render($request){
    	return response()->view('no_method', [501]);
    }
}
