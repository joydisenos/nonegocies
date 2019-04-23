<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','apellido','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function usuarios()
    {
        $usuarios = User::all();

        return $usuarios;
    }

    public function cobros()
    {
        $usuarios = $this->where('plan_id' ,'!=' , null)->orderBy('fecha_corte')->get();

        return $usuarios;
    }

    public function empresas()
    {
        $empresas = User::all();

        return $empresas;
    }

    public function noleidos()
    {
        $num = $this->mensajes->where('leido' , 0)->count();

        return $num;
    }

    public function mensajes()
    {
        return $this->hasMany(Mensajes::class , 'user_id');
    }

    public function tarjeta()
    {
        return $this->hasOne(Datos::class , 'user_id');
    }

    public function tarjetas()
    {
        return $this->hasMany(Datos::class , 'user_id');
    }

    public function cuentas()
    {
        return $this->hasMany(Cobro::class , 'user_id');
    }

    public function contratos()
    {
        return $this->hasMany(Ordenes::class, 'user_id');
    }
}
