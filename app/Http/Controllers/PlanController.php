<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Datos;
use App\Comision;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cambiarPlan(Request $request)
    {
        $user = Auth::user();
        if( $user->plan_id == $request->plan)
        {
            return redirect()->route('planes')->with('status','Este plan ya se encuentra activo');
        }

        if( $user->plan_id > $request->plan && $user->comprobarTiempoPlan() < 12 )
        {
            return redirect()->route('planes')->with('status','debe tener al menos 12 meses de contrato para cambiar su plan');
        }

        /*if($user->tarjetas->first() == null)
                    {
                        $tarjeta = new Datos();
                        $tarjeta->user_id = Auth::user()->id;
                        $tarjeta->tarjeta = $request->tarjeta;
                        $tarjeta->cvv = $request->cvv;
                        $tarjeta->vence = $request->vence;
                        $tarjeta->save();
                    }*/
        if($request->plan == 0)
        {
            $user->plan_id = null;
        }else{
            $user->plan_id = $request->plan;
            //if($user->fecha_corte == null)
            //{
                $user->fecha_corte = Carbon::now();
            //}
        }
        $user->save();

        if($user->referido_id != null)
        {
            $padre = $user->padre;
            $data = [
                'user_id' => $padre->id,
                'referido_id' => $user->id,
                'concepto' => 'Cambio de plan' 
                ];

            if($padre->plan_id > 1){

                if($user->plan_id == 2){
                    $data['monto'] = env('MONTO_REGISTRO_PLAN_PREMIUM' , 0);
                }elseif($user->plan_id == 3){
                    $data['monto'] = env('MONTO_REGISTRO_PLAN_PLATINUM' , 0);
                }
                    
            }
        
            Comision::create($data);
        }

        return redirect()->route('planes')->with('status','Plan Contratado con éxito');
    }
}
