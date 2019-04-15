<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Datos;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cambiarPlan(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if(Auth::user()->tarjetas->first() == null)
                    {
                        $tarjeta = new Datos();
                        $tarjeta->user_id = Auth::user()->id;
                        $tarjeta->tarjeta = $request->tarjeta;
                        $tarjeta->cvv = $request->cvv;
                        $tarjeta->vence = $request->vence;
                        $tarjeta->save();
                    }
        if($request->plan == 0)
        {
            $user->plan_id = null;
        }else{
            $user->plan_id = $request->plan;
            if($user->fecha_corte == null)
            {
                $user->fecha_corte = Carbon::now();
            }
        }
        $user->save();

        return redirect()->back()->with('status','Plan Contratado con éxito');
    }
}
