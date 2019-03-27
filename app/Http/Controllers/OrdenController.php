<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ordenes;

class OrdenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contratar($oferta_id , $comision)
    {
        if(Auth::user()->tarjetas->count() < 1 )
        {
            return redirect()->back()->with('status','Debe completar los datos para realizar el pago');
        }
        elseif(Auth::user()->cup_luz == null ){
            return redirect()->back()->with('status','Debe completar los datos para realizar el pago');
        }else{
            $orden = new Ordenes ();
            $orden->user_id = Auth::user()->id;
            $orden->oferta_id = $oferta_id;
            $orden->comision = $comision;
            $orden->save();

            return redirect()->route('panel.planes')->with('status','Oferta contratada en breve nos comunicaremos para completar el proceso');
        }
    }
}
