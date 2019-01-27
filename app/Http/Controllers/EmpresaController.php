<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function crear(Request $request)
    {
    	$validatedData = $request->validate([
        'nombre' => 'required|max:255',
        'descripcion' => 'required',
        ]);
        
        if( $request->hasFile('logo') )
        {
            $ruta = '/empresa/'. str_slug($request->nombre , '-');
            $logo = $request->file('logo');
            $nombre = $logo->getClientOriginalName();
            $request->file('logo')->storeAs($ruta, $nombre, 'public');
        }

        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        if ( $request->hasFile('logo') )
        {
            $empresa->logo = $ruta . '/' . $nombre;
        }
        $empresa->save();
    	
    	return redirect()->back()->with('status','Empresa registrada');
    }
}
