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

    public function getOfertasMenorPrecioLuz($categoriaId , $tarifa , $tipoPersona , $precio , $pp1 , $pp2 , $pp3 , $ep1 , $ep2 , $ep3 , $dias)
    {
        $ofertas = Ofertas::selectRaw(('* , ofertas.nombre as titulo,
                                    campos_ofertas.pp1,
        							campos_ofertas.pp2,
        							campos_ofertas.pp3,
        							campos_ofertas.ep1,
        							campos_ofertas.ep2,
        							campos_ofertas.ep3,
                                    (campos_ofertas.pp1 / 365) as diap1 , 
                                    (campos_ofertas.pp2 / 365) as diap2 , 
                                    (campos_ofertas.pp3 / 365) as diap3 ,
                                    ((campos_ofertas.pp1 / 365) * '. $dias .' * '. $pp1 .') as totalp1 ,
                                    ((campos_ofertas.pp2 / 365) * '. $dias .' * '. $pp2 .') as totalp2 ,
                                    ((campos_ofertas.pp3 / 365) * '. $dias .' * '. $pp3 .') as totalp3 ,
                                    (campos_ofertas.ep1 * '. $dias .' * '. $ep1 .') as totale1 ,
                                    (campos_ofertas.ep2 * '. $dias .' * '. $ep2 .') as totale2 ,
                                    (campos_ofertas.ep3 * '. $dias .' * '. $ep3 .') as totale3 ,
                                    
                                    (((campos_ofertas.pp1 / 365) * '. $dias .' * '. $pp1 .') + 
                                    ((campos_ofertas.pp2 / 365) * '. $dias .' * '. $pp2 .') + 
                                    ((campos_ofertas.pp3 / 365) * '. $dias .' * '. $pp3 .') + 
                                    (campos_ofertas.ep1 * '. $dias .' * '. $ep1 .') + 
                                    (campos_ofertas.ep2 * '. $dias .' * '. $ep2 .') + 
                                    (campos_ofertas.ep3 * '. $dias .' * '. $ep3 .')) as totalgeneral'))
                                    ->join('campos_ofertas' , 'campos_ofertas.oferta_id' , '=' , 'ofertas.id')
                                    ->where('ofertas.categoria_id' , $categoriaId)
                                    ->where('ofertas.tarifa' , $tarifa)
                                    ->where('ofertas.tipo' , $tipoPersona)
                                    ->where('ofertas.estatus' , 1)
                                    ->whereRaw('(((campos_ofertas.pp1 / 365) * '. $dias .' * '. $pp1 .') + 
                                    ((campos_ofertas.pp2 / 365) * '. $dias .' * '. $pp2 .') + 
                                    ((campos_ofertas.pp3 / 365) * '. $dias .' * '. $pp3 .') + 
                                    (campos_ofertas.ep1 * '. $dias .' * '. $ep1 .') + 
                                    (campos_ofertas.ep2 * '. $dias .' * '. $ep2 .') + 
                                    (campos_ofertas.ep3 * '. $dias .' * '. $ep3 .'))
                                    <= '. $precio)
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
