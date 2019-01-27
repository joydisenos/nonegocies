<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'nombre','slug'
    ];


    public function categorias()
    {
        $categorias = Categoria::all();

        return $categorias;
    }

    public function getCategoriaSlug($slug)
    {
        $categoria = Categoria::where('slug' , $slug)->first();

        return $categoria;
    }

    //Relaciones

    public function campos()
    {
        return $this->hasMany(CamposCategoria::class);
    }

}
