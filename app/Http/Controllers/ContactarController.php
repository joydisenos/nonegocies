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
    	$contacto->save();

    	return response()->json([
    		'guardado' => 'Muchas Gracias por contactarnos '.title_case($request->nombre).', pronto nos pondremos en contacto.']);

	}
	
	public function editar ($id)
	{
		$contacto = Contactar::findOrFail($id);

		return view('dashboard.editarcontactar' , compact('contacto'));
	}
}
