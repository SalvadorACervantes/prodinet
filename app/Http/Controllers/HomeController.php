<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class HomeController extends Controller
{
    //
     public function index(){
     	$banner =DB::table('carousel')->select('name')->get();
     	return view('home',[
     		'product'=>Product::where('Precio','<=',1000)->where('Cantidad','>=',1)->get(),
     		'banner' => $banner,
     	]);
     }
}
