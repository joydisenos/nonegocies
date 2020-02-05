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
    	$empresas = Empresa::where('estatus', '>' , 0)->get();

    	return $empresas;
    }

    public function ofertas()
    {
    	return $this->hasMany(Ofertas::class , 'empresa_id');
    }
}
