<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    protected $fillable = [
        'user_id', 'referido_id', 'concepto','monto'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class , 'user_id');
    }

    public function referido()
    {
    	return $this->belongsTo(User::class , 'referido_id');
    }

    public function orden()
    {
    	return $this->belongsTo(Ordenes::class , 'orden_id');
    }

    public function comisionesPorPagar()
    {
        return $this->where('estatus' , 1)->get();
    }

    public function verEstatus()
    {
        $estatus = $this->estatus;

        switch ($estatus) {
            case 0:
                $mensaje = 'En proceso';
                break;

            case 1:
                $mensaje = 'Pendiente por Cobrar';
                break;

            case 2:
                $mensaje = 'Pago';
                break;

            case 3:
                $mensaje = 'Negado';
                break;
            
            default:
                $mensaje = 'Indefinido';
                break;
        }

        return $mensaje;
    }
}