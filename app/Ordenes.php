<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    public function oferta()
    {
        return $this->belongsTo(Ofertas::class , 'oferta_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function contratos()
    {
        return $this->where('estatus' , '>=' , 1)->get();
    }

    public function contratosPorPagar()
    {
        return $this->where('comision' , '>' , 0)->where('pagado' , 0)->get();
    }
}
