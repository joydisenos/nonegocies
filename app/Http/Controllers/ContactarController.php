<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactar;

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

    	return response()->json([
    		'guardado' => 'Muchas Gracias por contactarnos '.title_case($request->nombre).', pronto nos pondremos en contacto.']);

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
