<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    public $table = "player";

    protected $fillable = ['name', 'sport', 'country'];
}
