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

    	Empresa::create($request->all());
    	
    	return redirect()->back()->with('status','Empresa registrada');
    }
}
