<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ofertas extends Model
{
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'empresa_id',
        'categoria_id',
        'precio',
        'tipo'
    ];

    public function ofertas()
    {
    	$ofertas = Ofertas::where('estatus' , '>' , 0)->get();

    	return $ofertas;
    }

    public function getOfertasCategoria($categoriaId)
    {
        $ofertas = Ofertas::where('estatus', '>' , 0)
                            ->where('categoria_id' , $categoriaId)
                            ->get();

    	return $ofertas;
    }

    public function getOfertaSlug($slug)
    {
        $oferta = Ofertas::where('slug' , $slug)->first();

        return $oferta;
    }

    public function getOfertasMenorPrecioLuz($categoriaId , $precio)
    {
        $ofertas = Ofertas::selectRaw(('* , 
                                    (campos_ofertas.pp1 / 365) as diap1 , 
                                    (campos_ofertas.pp2 / 365) as diap2 , 
                                    (campos_ofertas.pp3 / 365) as diap3 ,
                                    ((campos_ofertas.pp1 / 365) * 20 * 10) as totalp1 ,
                                    ((campos_ofertas.pp2 / 365) * 20 * 10) as totalp2 ,
                                    ((campos_ofertas.pp3 / 365) * 20 * 10) as totalp3 ,
                                    (campos_ofertas.ep1 * 20 * 10) as totale1 ,
                                    (campos_ofertas.ep2 * 20 * 10) as totale2 ,
                                    (campos_ofertas.ep3 * 20 * 10) as totale3 ,
                                    
                                    (((campos_ofertas.pp1 / 365) * 20 * 10) + 
                                    ((campos_ofertas.pp2 / 365) * 20 * 10) + 
                                    ((campos_ofertas.pp3 / 365) * 20 * 10) + 
                                    (campos_ofertas.ep1 * 20 * 10) + 
                                    (campos_ofertas.ep2 * 20 * 10) + 
                                    (campos_ofertas.ep3 * 20 * 10)) as totalgeneral'))
                                    ->join('campos_ofertas' , 'campos_ofertas.oferta_id' , '=' , 'ofertas.id')
                                    ->whereRaw('(((campos_ofertas.pp1 / 365) * 20 * 10) + 
                                    ((campos_ofertas.pp2 / 365) * 20 * 10) + 
                                    ((campos_ofertas.pp3 / 365) * 20 * 10) + 
                                    (campos_ofertas.ep1 * 20 * 10) + 
                                    (campos_ofertas.ep2 * 20 * 10) + 
                                    (campos_ofertas.ep3 * 20 * 10))
                                    >= 500')
                                    ->get();

        return $ofertas;
    }

    //Relaciones

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function opcion()
    {
        return $this->hasOne(CamposOferta::class , 'oferta_id');
    }
}
