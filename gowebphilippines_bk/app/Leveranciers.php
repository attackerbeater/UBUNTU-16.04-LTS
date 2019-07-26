<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Leveranciers extends Model
{
    // Mass Assignment
    // assign the affected fileds during insert
    protected $fillable = ['supplier_name', 'supplier_street', 'supplier_number', 'supplier_country', 'supplier_city', 'supplier_zip', 'ban', 'vn', 'supplier_email', 'supplier_telephone', 'supplier_general_fax', 'supplier_rate', 'supplier_sector', 'supplier_exclusivity_status'];


    protected $hidden = ['contact_first_name', 'contact_lastname', 'contact_email', 'contact_telephone', 'contact_function', 'contact_person_last_name.*', 'contact_person_first_name.*', 'contact_person_function.*', 'contact_person_email.*', 'contact_person_telephone.*'];
}

