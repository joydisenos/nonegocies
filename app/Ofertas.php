<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ofertas extends Model
{
    protected $fillable = [
        'nombre',
        'imagen_oferta',
        'flyer_oferta',
        'pdf_oferta',
        'slug',
        'descripcion',
        'empresa_id',
        'categoria_id',
        'precio',
        'precio_diario',
        'subcategoria',
        'tipo',
        'estatus',
        'tarifa',
        'ventas',
        'comision',
        'plan1',
        'plan2',
        'plan3'
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

    public function ventasPorId($id)
    {
        $oferta = Ordenes::where('oferta_id' , $id)->get()->count();

        return $oferta;
    }

    public function contrato($contrato)
    {
        $contrato = str_replace("{nombre}", title_case(Auth::user()->name) . ' ' . title_case(Auth::user()->apellido) . ' ' , $contrato);
        $contrato = str_replace('{dni}' , Auth::user()->dni , $contrato);
        $contrato = str_replace('{direccion}' , Auth::user()->direccion , $contrato);

        return $contrato;
    }

    public function contratoUser($contrato , $user)
    {
        $user = User::findOrFail($user);

        $contrato = str_replace("{nombre}", title_case($user->name) . ' ' . title_case($user->apellido) . ' ' , $contrato);
        $contrato = str_replace('{dni}' , $user->dni , $contrato);
        $contrato = str_replace('{direccion}' , $user->direccion , $contrato);

        return $contrato;
    }

    public function duplicarOferta($id)
    {
        $ofertaOriginal = Ofertas::findOrFail($id);
        $ofertaArray = $ofertaOriginal->toArray();

        $ofertaNueva = Ofertas::create($ofertaArray);

        /*if( $ofertaOriginal->imagen_oferta != null )
            {
                $rutaImagen = 'ofertas/'. $ofertaOriginal->id . '/' . $ofertaOriginal->imagen_oferta;
                $destinoImagen = 'ofertas/'. $ofertaNueva->id . '/' . $ofertaNueva->imagen_oferta;
                copy($rutaImagen , $destinoImagen);
            }

        if( $ofertaOriginal->pdf_oferta != null )
            {
                $rutaPdf = 'ofertas/'. $ofertaOriginal->id . '/' . $ofertaOriginal->pdf_oferta;
                $destinoPdf = 'ofertas/'. $ofertaNueva->id . '/' . $ofertaNueva->pdf_oferta;
                copy($destinoPdf , $rutaPdf);
            }
            
        if( $ofertaOriginal->flyer_oferta != null )
            {
                $rutaFlyer = 'ofertas/'. $ofertaOriginal->id . '/' . $ofertaOriginal->flyer_oferta;
                $destinoFlyer = 'ofertas/'. $ofertaNueva->id . '/' . $ofertaNueva->flyer_oferta;
                copy($rutaFlyer , $destinoFlyer);
            }*/

        if( $ofertaOriginal->opcion != null )
        {
            $opciones = $ofertaOriginal->opcion;
            $opcionesArray = $opciones->toArray();
            $opcionesArray['oferta_id'] = $ofertaNueva->id;

            CamposOferta::create($opcionesArray);
        }

        return $ofertaNueva;
    }


    public function getOfertasMenorPrecioLuz($categoriaId , $tarifa , $tipoPersona , $precio , $pp1 , $pp2 , $pp3 , $ep1 , $ep2 , $ep3 , $dias , $order)
    {
        if($order == 'totalgeneral'){
            $direccion = 'ASC';
        }else{
            $direccion = 'DESC';
        }

        $ofertas = Ofertas::selectRaw(('* , 
                                    ofertas.id as ofertaid,
                                    ofertas.estatus,
        							ofertas.nombre as titulo,
        							campos_ofertas.pp1,
        							campos_ofertas.pp2,
        							campos_ofertas.pp3,
        							campos_ofertas.ep1,
        							campos_ofertas.ep2,
        							campos_ofertas.ep3,

        							(
        							(
        							(
        							(campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
	                                (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
	                                (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
	                                (campos_ofertas.ep1 * '. $ep1 .') + 
	                                (campos_ofertas.ep2 * '. $ep2 .') + 
	                                (campos_ofertas.ep3 * '. $ep3 .')
	                                ) * 21 
	                                )
	                                / 100
	                                ) +

	                                (
	                                (
	                                (
	                                (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
	                                (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
	                                (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
	                                (campos_ofertas.ep1 * '. $ep1 .') + 
	                                (campos_ofertas.ep2 * '. $ep2 .') + 
	                                (campos_ofertas.ep3 * '. $ep3 .')
	                                ) * 5.113 
	                                )
	                                /100
	                                ) +
                        			
                        			(
	                                (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
	                                (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
	                                (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
	                                (campos_ofertas.ep1 * '. $ep1 .') + 
	                                (campos_ofertas.ep2 * '. $ep2 .') + 
	                                (campos_ofertas.ep3 * '. $ep3 .') 
									)

	                                as totalgeneral,

                                    ((comision + (
                                    
                                    (
                                    (
                                    (
                                    (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
                                    (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
                                    (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
                                    (campos_ofertas.ep1 * '. $ep1 .') + 
                                    (campos_ofertas.ep2 * '. $ep2 .') + 
                                    (campos_ofertas.ep3 * '. $ep3 .')
                                    ) * 21 
                                    )
                                    / 100
                                    ) +

                                    (
                                    (
                                    (
                                    (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
                                    (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
                                    (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
                                    (campos_ofertas.ep1 * '. $ep1 .') + 
                                    (campos_ofertas.ep2 * '. $ep2 .') + 
                                    (campos_ofertas.ep3 * '. $ep3 .')
                                    ) * 5.113 
                                    )
                                    /100
                                    ) +
                                    
                                    (
                                    (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
                                    (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
                                    (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
                                    (campos_ofertas.ep1 * '. $ep1 .') + 
                                    (campos_ofertas.ep2 * '. $ep2 .') + 
                                    (campos_ofertas.ep3 * '. $ep3 .') 
                                    )

                                    )) / 2) as promedio 

                                    '))
                                    ->join('campos_ofertas' , 'campos_ofertas.oferta_id' , '=' , 'ofertas.id')
                                    ->where('ofertas.categoria_id' , $categoriaId)
                                    ->where('ofertas.tarifa' , $tarifa)
                                    //->where('ofertas.tipo' , $tipoPersona)
                                    ->where('ofertas.estatus' , 1)
                                    /*->whereRaw('
                                    			
                                    (
        							(
        							(
        							(campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
	                                (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
	                                (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
	                                (campos_ofertas.ep1 * '. $ep1 .') + 
	                                (campos_ofertas.ep2 * '. $ep2 .') + 
	                                (campos_ofertas.ep3 * '. $ep3 .')
	                                ) * 21 
	                                )
	                                / 100
	                                ) +

	                                (
	                                (
	                                (
	                                (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
	                                (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
	                                (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
	                                (campos_ofertas.ep1 * '. $ep1 .') + 
	                                (campos_ofertas.ep2 * '. $ep2 .') + 
	                                (campos_ofertas.ep3 * '. $ep3 .')
	                                ) * 5.113 
	                                )
	                                /100
	                                ) +
                        			
                        			(
	                                (campos_ofertas.pp1 * '. $dias .' * '. $pp1 .') + 
	                                (campos_ofertas.pp2 * '. $dias .' * '. $pp2 .') + 
	                                (campos_ofertas.pp3 * '. $dias .' * '. $pp3 .') + 
	                                (campos_ofertas.ep1 * '. $ep1 .') + 
	                                (campos_ofertas.ep2 * '. $ep2 .') + 
	                                (campos_ofertas.ep3 * '. $ep3 .') 
									)
                                    <= '. $precio)*/
                                    ->orderBy($order , $direccion)
                                    ->get();

        return $ofertas;
    }

    public function getOfertasMenorPrecioGas($categoriaId , $tarifa , $tipoPersona , $precio , $dias , $kw , $order)
    {
        if($order == 'totalgeneral'){
            $direccion = 'ASC';
        }else{
            $direccion = 'DESC';
        }
        $ofertas = Ofertas::selectRaw(('* , 
                                    ofertas.id as ofertaid,
                                    ofertas.estatus,
                                    ofertas.nombre as titulo,
                                                    ( ('. $kw .' * campos_ofertas.precio_tarifa ) + 
                                                    (campos_ofertas.precio_fijo * '. $dias .')) 
                                                    *1.21 as totalgeneral,
                                    ((comision + (
                                                    ( ('. $kw .' * campos_ofertas.precio_tarifa ) + 
                                                    (campos_ofertas.precio_fijo * '. $dias .')) 
                                                    *1.21
                                    )) / 2) as promedio
                                    '))
                                    ->join('campos_ofertas' , 'campos_ofertas.oferta_id' , '=' , 'ofertas.id')
                                    ->where('ofertas.categoria_id' , $categoriaId)
                                    ->where('ofertas.tarifa' , $tarifa)
                                    //->where('ofertas.tipo' , $tipoPersona)
                                    ->where('ofertas.estatus' , 1)
                                    //->whereRaw( ' ( ('. $kw .' * campos_ofertas.precio_tarifa ) + 
                                    //                (campos_ofertas.precio_fijo * '. $dias .')) 
                                    //                *1.21 <= '. $precio)
                                    ->orderBy($order , $direccion)
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
