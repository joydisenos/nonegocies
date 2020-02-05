<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection as Collection;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

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
        'name', 'email', 'password','apellido','tipo','referido_id'
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
        $usuarios = User::orderBy('id' , 'desc')->get();

        return $usuarios;
    }

    public function cobros()
    {
        $usuarios = $this->where('plan_id' ,'!=' , null)->orderBy('fecha_corte')->get();

        return $usuarios;
    }

    public function comisiones()
    {
        return $this->hasMany(Comision::class, 'user_id');
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

    public function referidos()
    {
        return $this->hasMany(User::class , 'referido_id');
    }

    public function padre()
    {
        return $this->belongsTo(User::class , 'referido_id');
    }

    public function tarjeta()
    {
        return $this->hasOne(Datos::class , 'user_id');
    }

    public function tarjetas()
    {
        return $this->hasMany(Datos::class , 'user_id');
    }

    public function cuenta()
    {
        return $this->hasOne(Cobro::class , 'user_id');
    }

    public function cuentas()
    {
        return $this->hasMany(Cobro::class , 'user_id');
    }

    public function contratos()
    {
        return $this->hasMany(Ordenes::class, 'user_id');
    }

    public function porCobrar(){
        $cobrar = Ordenes::where('user_id' , $this->id)
                            ->where('pagado' , 0)
                            ->sum('comision');
        return $cobrar;
    }

    public function comprobarTiempoPlan(){
        $corte = Carbon::parse($this->fecha_corte);
        $hoy = Carbon::now();
        $meses = $corte->diffInMonths($hoy);

        return $meses;
    }

    public function tiempoPlan(){
        $corte = Carbon::parse($this->fecha_corte);
        $hoy = Carbon::now();
        $meses = $corte->diffInMonths($hoy);

        $out = $meses . ' de 12 meses';

        return $out;
    }

    public function tipoUsuario()
    {
        $tipo = $this->tipo;

        switch ($tipo) {
            case 1:

                $singular = 'Particular';
                $plural = 'Particulares';

                break;

            case 2:

                $singular = 'Empresa';
                $plural = 'Empresas';
                
                break;

            case 3:

                $singular = 'Comunidad';
                $plural = 'Comunidades';
                
                break;

            case 4:

                $singular = 'Administrador';
                $plural = 'Administradores';
                
                break;
            
            default:
                
                $singular = 'no definido';
                $plural = 'no definido';

                break;

        }
            $datos = new \stdClass();
            $datos->singular = $singular;
            $datos->plural = $plural;

            return $datos;
    }
}
