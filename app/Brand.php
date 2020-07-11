<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

	//protected $guarded=[];
	//protected $fillable = ['title','url','description'];
    protected $table = 'marca';
    
    //para los modelos el nombre del modelo es igual a la tabla en minuscula y plural
   public function getRouteKeyName()
   {
    	return 'ID';
   }
   
  

   

}
