<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    protected $fillable = [
        'nombre','descripcion','empresa_id','categoria_id','precio','tipo'
    ];

    public function ofertas()
    {
    	$ofertas = Ofertas::where('estatus' , 1)->get();

    	return $ofertas;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
