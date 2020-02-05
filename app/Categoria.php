<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function empresas()
    {
        $empresas = Empresa::whereHas('ofertas' , function (Builder $query) {
                                            $query->where('categoria_id', $this->id)
                                                ->where('estatus' , '>' , 0);
                                        })
                            ->get();

        return $empresas;
    }

    public static function tieneOfertas($categoriaSlug)
    {
        $refCategoria = new Categoria();
        $categoria = $refCategoria->getCategoriaSlug($categoriaSlug);

        $refOfertas = new Ofertas();
        $ofertas = $refOfertas->getOfertasCategoria($categoria->id);

        $cantidad = $ofertas->count();
        $out = $cantidad > 0 ? true : false;

        return $out;
    }

    //Relaciones

    public function campos()
    {
        return $this->hasMany(CamposCategoria::class);
    }

    public function ofertas()
    {
        return $this->hasMany(Ofertas::class)->where('estatus' , '>' , 0);
    }

}
