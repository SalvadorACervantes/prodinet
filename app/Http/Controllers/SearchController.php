<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;


class SearchController extends Controller
{
    public function show(Request $request){
        
        $brand=Brand::get();
        $cat=Category::get();
        $q =trim( $request->input('q'));
        $product = Product::Search($q)->paginate();
        
        // validacion necesaria para que vaya a la pagina del producto directamente   
        return view('products.index',['product'=> $product,'cat'=> $cat,'q'=>$q,'brand'=>$brand
    ]);
    
    }
    
    
}