<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;//modelo
use App\Brand;
class ProductController extends Controller
{
    //

    public function index()
    {
        $cat=Category::get();
        $brand=Brand::get();
        //$portfolio = DB::table('projects')->get(); obtener datos de la tabla
        //$portfolio = Project::latest()->paginate();//obtener los datos
        //return view('portafolio', compact('portfolio'));
        if(request()->brand){
            $product = Product::whereMarca(request()->brand)->paginate();
        }
         if (request()->category) {
            $product = Product::whereLinea(request()->category)->paginate();
            
        }else{
             $product = Product::paginate();
        }

        
        return view('products.index')->with([
            'product' => $product,
            'cat'=> $cat,
            'brand'=>$brand
        ]);


    }
    
    public function show(Product $product)
    {
        
        return view('products.show',[
            'product' => $product
        ]);
    }

    
    
    
}
