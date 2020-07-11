<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    //
     protected $table = 'InShopping_carts';
     protected $fillable =["product_id","shopping_cart_id","cantidad","subtotal"];
}
