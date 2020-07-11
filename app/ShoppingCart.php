<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $table = 'ShoppingCarts';
    protected $fillable=['status'];

    public function InShoppingCarts(){
    	return $this->hasMany('App\InShoppingCart');
    }

    public function products(){
    	return $this->belongsToMany('App\Product','InShopping_carts')->withPivot('cantidad','subtotal');
    }

    public function productsSize(){
    	return $this->products()->count();
    }

    public function total(){
    	return $this->products()->sum('InShopping_carts.subtotal');
    }

    public static function findOrCreateBySessionID($shopping_cart_id){

    	if($shopping_cart_id)
    		return ShoppingCart::findBySession($shopping_cart_id);
    	else
    		return ShoppingCart::createWithoutSession();
    }

    public static function findBySession($shopping_cart_id){
    	return ShoppingCart::find($shopping_cart_id);
    }

    public static function createWithoutSession(){
    	return ShoppingCart::create([
    		"status"=>"incompleted"
    	]);
    }

}
