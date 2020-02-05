<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Contactar;
use App\Ofertas;
use App\Mail\ContactarMail;

class ContactarController extends Controller
{
    public function crear(Request $request)
    {
        $request->nombre = strtolower($request->nombre);
        $request->apellido = strtolower($request->apellido);
        $request->email = strtolower($request->email);

    	$contacto = new Contactar();
    	$contacto->nombre = $request->nombre;
    	$contacto->apellido = $request->apellido;
    	$contacto->email = $request->email;
    	$contacto->telefono = $request->telefono;
    	if ($request->has('llamar')) {
            $contacto->llamar = 1;
		}
		if ($request->has('servicio')) {
            $contacto->servicio = $request->servicio;
        }
        if ($request->has('notas')) {
            $contacto->notas = $request->notas;
        }
    	$contacto->save();

        if ($request->hasFile('factura')) {
            $rutaFactura = 'contacto/'. $contacto->id;
            $factura = $request->file('factura');
            $nombreFactura = $factura->getClientOriginalName();
            $request->file('factura')->storeAs($rutaFactura, $nombreFactura, 'public');
            $contacto->factura = $nombreFactura;
            $contacto->save();
        }

    	//Mail::to('joydisenos@gmail.com')

        if ($request->has('servicio') && $request->servicio == 'Alarmas') {
            $contactoMail = ['alarmas@nonegocies.es' , 'humberto@nonegocies.es'];
        }else if ($request->has('servicio') && $request->servicio == 'Seguros') {
            $contactoMail = ['seguros@nonegocies.es' , 'humberto@nonegocies.es' , 'sergi@nonegocies.es'];
        }else{
            $contactoMail = ['contactar@nonegocies.es'];
        }

        if($request->has('oferta_id')){
            $oferta = Ofertas::findOrFail($request->oferta_id);
            if($oferta->empresa->email != null){
                $contactoMail[] = $oferta->empresa->email;
            }
        }

    	Mail::to($contactoMail)
                   ->send(new ContactarMail($contacto));

    	if(Auth::user()->telefono == null)
    	{
    		$user = Auth::user();
    		$user->telefono = $request->telefono;
    		$user->save();
    	}

    	return response()->json([
    		'guardado' => 'Muchas Gracias por su oferta '.title_case($request->nombre).', enseguida nos pondremos en contacto para continuar la contratación.']);

	}
	
	public function editar ($id)
	{
		$contacto = Contactar::findOrFail($id);

		return view('dashboard.editarcontactar' , compact('contacto'));
	}

	public function actualizar(Request $request , $id)
    {
	   $contacto = Contactar::findOrFail($id);
	   $contacto->notas = $request->notas;
	   if($request->has('contactado'))
	   {
		   $contacto->contactado = 1;
	   }else{
		   $contacto->contactado = 0;
	   }
	   $contacto->save();

	   return redirect()->route('contactos')->with('status' , 'Contacto Modificado');
	}

	public function eliminar($id)
	{
		$contacto = Contactar::findOrFail($id);
		$contacto->delete();

		return redirect()->back()->with('status' , 'Contacto Eliminado');
	}
}
