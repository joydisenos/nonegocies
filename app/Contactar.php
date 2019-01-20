<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactar extends Model
{
    protected $table = 'contactar';

    public function contactos()
    {
    	$contactos = Contactar::all();

    	return $contactos;
    }
}
