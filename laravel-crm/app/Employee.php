<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\User;

class Employee extends Model
{
  protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone', 'creator_id'];

  protected $perPage = 10;

  public function creator()
  {
      return $this->belongsTo(User::class);
  }

  public function company()
  {
      return $this->belongsTo(Company::class);
  }
}
