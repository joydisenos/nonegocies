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
        return $this->where('comision' , '>' , 0)
                    ->where('pagado' , 0)
                    ->where('estatus' , 3)
                    ->get();
    }

    public function estatus()
    {
        $est = $this->estatus;

        switch ($est) {
            case 1:
                $estatus = 'Por procesar';
                break;

            case 2:
                $estatus = 'Aprobado';
                break;

            case 0:
                $estatus = 'Negado';
                break;

            case 3:
                $estatus = 'Por Cobrar';
                break;
            
            default:
                $estatus = 'No definido';
                break;
        }
        return $estatus;
    }
}
