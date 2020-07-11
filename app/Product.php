<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{

	//protected $guarded=[];
	//protected $fillable = ['title','url','description'];
    protected $table = 'productos_tienda';
    use Searchable;
    //para los modelos el nombre del modelo es igual a la tabla en minuscula y plural
   public function getRouteKeyName()
   {
    	return 'Clave';
   }
   public function toSearchableArray()
   {
   	 		return [
    	    'Nombre' => $this->Nombre,
    	    'Clave' =>$this->Clave,
    	    'Marca'=>$this->Marca,
    	    'Imagen'=>$this->Imagen
    		];
   }

   

}
