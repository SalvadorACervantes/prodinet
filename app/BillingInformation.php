<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
     protected $table = 'billing_information';
     protected $fillable =["user_id","business_name","rfc",];
}
