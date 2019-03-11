<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    public function getMensajes($user_id)
    {
        $mensajes = Mensajes::where('user_id' , $user_id)->orderBy('created_at' , 'desc')->get();

        return $mensajes;
    }
}
