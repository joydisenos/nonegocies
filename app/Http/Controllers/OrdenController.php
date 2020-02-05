<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Ordenes;
use App\Datos;
use App\Ajuste;
use App\Ofertas;
use App\Comision;
use App\Cobro;
use App\Mail\ContratoMail;

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

        if($contrato->user->referido_id != null)
        {
            $padre = $contrato->user->padre;

            $data = [
                'user_id' => $padre->id,
                'referido_id' => $contrato->user->id,
                'orden_id' => $contrato->id,
                'concepto' => 'Contratacion de servicio'
                ];

            if($padre->plan_id == 2)
            {

                if($contrato->user->plan_id == null || $contrato->user->plan_id == 0){
                    $porcentaje = (env('MONTO_PADRE_PREMIUM_HIJO_GRATIS' , 0) / 100);
                }elseif($contrato->user->plan_id == 2){
                    $porcentaje = (env('MONTO_PADRE_PREMIUM_HIJO_PREMIUM' , 0) / 100);
                }elseif($contrato->user->plan_id == 3){
                    $porcentaje = (env('MONTO_PADRE_PREMIUM_HIJO_PLATINUM' , 0) / 100);
                }

            }elseif($padre->plan_id == 3)
            {

                if($contrato->user->plan_id == null || $contrato->user->plan_id == 0){
                    $porcentaje = (env('MONTO_PADRE_PLATINUM_HIJO_GRATIS' , 0) / 100);
                }elseif($contrato->user->plan_id == 2){
                    $porcentaje = (env('MONTO_PADRE_PLATINUM_HIJO_PREMIUM' , 0) / 100);
                }elseif($contrato->user->plan_id == 3){
                    $porcentaje = (env('MONTO_PADRE_PLATINUM_HIJO_PLATINUM' , 0) / 100);
                }

            }

            $data['monto'] = $contrato->oferta->comision * $porcentaje;

            Comision::create($data);

            if($padre->referido_id != null)
            {
            	// referido 2do nivel
            	$abuelo = $padre->padre;

                $data = [
                'user_id' => $abuelo->id,
                'referido_id' => $padre->id,
                'orden_id' => $contrato->id,
                'concepto' => 'Contratacion de servicio 2do nivel'
                ];

                $data['monto'] = $contrato->oferta->comision * 0.05;

                Comision::create($data);
            }

        }

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
        'dni-scan-an' => 'required',
        'dni-scan-re' => 'required',
        'factura-scan' => 'required'
        ]);

            
            if(Auth::user()->cup_luz == null){
                $user = Auth::user();
                $user->cup_luz = $request->cup;
                $user->save();
            }

            if(Auth::user()->dni == null){
                $user = Auth::user();
                $user->dni = $request->dni;
                $user->save();
            }

            if(Auth::user()->telefono == null || Auth::user()->telefono == ''){
                $user = Auth::user();
                $user->telefono = $request->telefono;
                $user->save();
            }

            /*if(Auth::user()->tarjetas->first() == null || Auth::user()->tarjetas->first()->tarjeta == null || Auth::user()->tarjetas->first()->cvv == null || Auth::user()->tarjetas->first()->vence == null)
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
            }*/

            if(Auth::user()->cuenta == null)
            {
                $cuenta = new Cobro();
                $cuenta->user_id = Auth::user()->id;
            }else{
                $cuenta = Auth::user()->cuenta;
            }
            
            $cuenta->nombre = $request->nombre;
            $cuenta->apellido = $request->apellido;
            $cuenta->numero = $request->numero;
            $cuenta->banco = $request->banco;
            $cuenta->save();
            
        
            $oferta = Ofertas::findOrFail($request->oferta_id);

            $contratoRef = Ajuste::first();
            $contratoBase = $contratoRef->contrato_oferta;
            $contrato = $oferta->contrato($contratoBase);

            $orden = new Ordenes ();
            $orden->user_id = Auth::user()->id;
            $orden->oferta_id = $request->oferta_id;
            $orden->comision = $request->comision;
            $orden->contrato = $contrato;
            $orden->firma = $request->firma;
            $orden->ip = $request->ip();
            $orden->save();

            $rutaDni = 'contrato/'. $orden->id;
            $dni = $request->file('dni-scan-an');
            $nombreDni = $dni->getClientOriginalName();
            $request->file('dni-scan-an')->storeAs($rutaDni, $nombreDni, 'public');

            $rutaDniRe = 'contrato/'. $orden->id;
            $dniRe = $request->file('dni-scan-re');
            $nombreDniRe = $dniRe->getClientOriginalName();
            $request->file('dni-scan-re')->storeAs($rutaDniRe, $nombreDniRe, 'public');

            $rutaFactura = 'contrato/'. $orden->id;
            $factura = $request->file('factura-scan');
            $nombreFactura = $factura->getClientOriginalName();
            $request->file('factura-scan')->storeAs($rutaFactura, $nombreFactura, 'public');

            $orden->dni = $rutaDni . '/' . $nombreDni;
            $orden->dni_re = $rutaDniRe . '/' . $nombreDniRe;
            $orden->factura = $rutaFactura . '/' . $nombreFactura;
            
            $orden->save();

            $finalizar = $oferta->empresa->cerrar;
            $mails = ['contactar@nonegocies.es' , 'humberto@nonegocies.es' , 'info@nonegocies.es'];

            if($oferta->empresa->email != null){
                $mails[] = $oferta->empresa->email;
            }

            Mail::to($mails)
            //Mail::to('joydisenos@gmail.com')
                   ->send(new ContratoMail($orden));

            return redirect()->route('panel.contratos')->with('status','Oferta contratada en breve nos comunicaremos para completar el proceso');
            // return view('ofertas.finalizar' , compact('finalizar'))->with('status','Oferta contratada en breve nos comunicaremos para completar el proceso');
            // return redirect()->route('finalizar.oferta' , ['finalizar' => $finalizar]);
    }

    public function finalizar($finalizar)
    {
    	return view('ofertas.finalizar' , compact('finalizar'));
    }

    public function cobrar($id)
    {
        $orden = Ordenes::findOrFail($id);
        $orden->estatus = 3;
        $orden->save();

        return redirect()->back()->with( 'status' , 'Cobro solicitado');
    }

    public function cobrarComision($id)
    {
        $comision = Comision::findOrFail($id);
        if($comision->estatus != 0)
        {
            return redirect()->back();
        }
        $comision->estatus = 1;
        $comision->save();

        return redirect()->back()->with( 'status' , 'Cobro solicitado');
    }

    public function negarComision($id)
    {
        $comision = Comision::findOrFail($id);
        $comision->estatus = 3;
        $comision->save();

        return redirect()->back()->with('status' , 'Comision #COM-'. $comision->id .' Negado');
    }

    public function pagadoComision($id)
    {
        $comision = Comision::findOrFail($id);
        $comision->estatus = 2;
        $comision->save();

        return redirect()->back()->with('status' , 'Comision #COM-'. $comision->id .' Marcado como Pago');
    }
}
