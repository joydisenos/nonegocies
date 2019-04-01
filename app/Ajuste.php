<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $fillable = [
        'cookies', 'privacidad', 'cookies', 'comision'
    ];

    public function legales()
    {
        $legales = Ajuste::first();

        return $legales;
    }
}
