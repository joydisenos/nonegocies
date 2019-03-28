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

    public function porContactar()
    {
        return $this->where('contactado' , 0)->get();
    }
}
