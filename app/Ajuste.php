<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    public function legales()
    {
        $legales = Ajuste::first();

        return $legales;
    }
}
