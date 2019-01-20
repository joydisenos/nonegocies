<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

	protected $fillable = [
        'nombre', 'descripcion', 'logo',
    ];


    public function empresas()
    {
    	$empresas = Empresa::where('estatus' , 1)->get();

    	return $empresas;
    }
}
