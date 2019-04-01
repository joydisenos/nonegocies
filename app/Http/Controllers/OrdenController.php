<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ordenes;
use App\Datos;
use App\Ofertas;

class OrdenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contratar(Request $request)
    {
            if(Auth::user()->cup_luz == null){
                $user = Auth::user();
                $user->cup_luz = $request->cup;
                $user->save();
            }

            if(Auth::user()->tarjetas->first() == null || Auth::user()->tarjetas->first()->tarjeta == null || Auth::user()->tarjetas->first()->cvv == null || Auth::user()->tarjetas->first()->vence == null)
            {
                $tarjeta = Datos::where('user_id' , Auth::user()->id)->first();
                    if(Auth::user()->tarjetas->first() == null)
                    {
                        $tarjeta = new Datos();
                    }
                        $tarjeta->user_id = Auth::user()->id;
                        $tarjeta->tarjeta = $request->tarjeta;
                        $tarjeta->cvv = $request->cvv;
                        $tarjeta->vence = $request->vence;
                        $tarjeta->save();
            }
        
            $oferta = Ofertas::findOrFail($request->oferta_id);

            $contrato = $oferta->empresa->contrato;
            $contrato = str_replace('{nombre}' , Auth::user()->name . ' ' . Auth::user()->apellido , $contrato);
            $contrato = str_replace('{dni}' , Auth::user()->dni , $contrato);
            $contrato = str_replace('{direccion}' , Auth::user()->direccion , $contrato);

            $orden = new Ordenes ();
            $orden->user_id = Auth::user()->id;
            $orden->oferta_id = $request->oferta_id;
            $orden->comision = $request->comision;
            $orden->contrato = $contrato;
            $orden->save();

            return redirect()->route('panel.contratos')->with('status','Oferta contratada en breve nos comunicaremos para completar el proceso');
    }
}
