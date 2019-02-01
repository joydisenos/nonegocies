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
        $categorias = Categoria::where('estatus' , '>' , 0)->get();

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

    public function ofertas()
    {
        return $this->hasMany(Ofertas::class);
    }

}
