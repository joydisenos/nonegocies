<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'nombre',
    ];


    public function categorias()
    {
        $categorias = Categoria::all();

        return $categorias;
    }

    public function campos()
    {
        return $this->hasMany(CamposCategoria::class);
    }
}
