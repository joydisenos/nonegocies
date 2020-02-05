<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactar extends Model
{
    protected $table = 'contactar';

    public function contactos()
    {
    	$contactos = Contactar::orderBy('created_at' , 'desc')->get();

    	return $contactos;
    }

    public function porContactar()
    {
        return $this->where('contactado' , 0)->get();
    }
}
