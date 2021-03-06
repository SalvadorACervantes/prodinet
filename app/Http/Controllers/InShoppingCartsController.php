<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\InShoppingCart;
class InShoppingCartsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $shopping_cart_id =\Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
        $subtotal= $request->size * $request->product_price;

        $response = InShoppingCart::create([
            "shopping_cart_id" => $shopping_cart->id,
            "product_id" =>$request->product_id,
            "cantidad" =>$request->size,
            "subtotal" =>$subtotal
        ]);

        if(false){
            return redirect('/cart');
        }else{
            return back();
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InShoppingCart::where('product_id',$id)->delete();
        return back();
    }

}
