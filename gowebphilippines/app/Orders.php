<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //	

    protected $guarded = [
    	'id', 
    	'name', 
    	'subject', 
    	'email', 
    	'subject', 
    	'attachment', 
    	'content'
    ];
}
