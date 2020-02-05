<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamposOferta extends Model
{
    protected $fillable = [
        'oferta_id',
        'nombre',
        'valor',
        'numero',
        'pp1',
        'pp2',
        'pp3',
        'ep1',
        'ep2',
        'ep3',
        'precio_tarifa',
        'precio_fijo',
        'fecha',
        'categoria_telefonia',
        'subtitulo_telefonia',
        'precio_telefonia',
        'movil_telefonia',
        'fijo_telefonia',
        'internet_telefonia',
        'tv_telefonia',
        'clase'
    ];
}
