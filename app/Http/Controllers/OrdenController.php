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

    public function aprobar($id)
    {
    	$contrato = Ordenes::findOrFail($id);
    	$contrato->estatus = 2;
    	$contrato->save();

    	return redirect()->back()->with('status' , 'Contrato #'. $contrato->id .' Aprobado');
    }

    public function negar($id)
    {
    	$contrato = Ordenes::findOrFail($id);
    	$contrato->estatus = 0;
    	$contrato->save();

    	return redirect()->back()->with('status' , 'Contrato #'. $contrato->id .' Negado');
    }

    public function pagado($id)
    {
    	$contrato = Ordenes::findOrFail($id);
    	$contrato->pagado = 1;
    	$contrato->save();

    	return redirect()->back()->with('status' , 'Contrato #'. $contrato->id .' Marcado como Pago');
    }

    public function contratar(Request $request)
    {
        $validatedData = $request->validate([
        'dni-scan' => 'required',
        'factura-scan' => 'required'
        ]);

            
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
            $contrato = $oferta->contrato($oferta->empresa->contrato);

            $orden = new Ordenes ();
            $orden->user_id = Auth::user()->id;
            $orden->oferta_id = $request->oferta_id;
            $orden->comision = $request->comision;
            $orden->contrato = $contrato;
            $orden->save();

            $rutaDni = 'contrato/'. $orden->id;
            $dni = $request->file('dni-scan');
            $nombreDni = $dni->getClientOriginalName();
            $request->file('dni-scan')->storeAs($rutaDni, $nombreDni, 'public');

            $rutaFactura = 'contrato/'. $orden->id;
            $factura = $request->file('factura-scan');
            $nombreFactura = $factura->getClientOriginalName();
            $request->file('factura-scan')->storeAs($rutaFactura, $nombreFactura, 'public');

            $orden->dni = $rutaDni . '/' . $nombreDni;
            $orden->factura = $rutaFactura . '/' . $nombreFactura;
            
            $orden->save();

            return redirect()->route('panel.contratos')->with('status','Oferta contratada en breve nos comunicaremos para completar el proceso');
    }
}
