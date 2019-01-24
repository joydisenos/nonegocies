<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    public function ofertas()
    {
    	$ofertas = Ofertas::where('estatus' , 1)->get();

    	return $ofertas;
    }
}
