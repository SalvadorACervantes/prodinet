<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'users_address';
    protected $fillable = [
    	'user_id',
    	'name',
    	'lastname',
    	'postcode',
    	'city',
    	'suburb',
    	'province',
    	'country',
    	'street',
    	'int_number',
    	'ext_number',
    	'street_1',
    	'street_2',
    	'additional'];
}
