<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $guarded=[];
	//protected $fillable = ['title','url','description'];
    //protected $table = 'my_table' en caso de seleccionar la tabla
    //para los modelos el nombre del modelo es igual a la tabla en minuscula y plural
   public function getRouteKeyName()
   {
    	return 'url';
   }
}
