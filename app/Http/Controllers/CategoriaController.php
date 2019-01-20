<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function crear(Request $request)
    {
    	$validatedData = $request->validate([
        'nombre' => 'required|max:255',
    	]);

    	Categoria::create($request->all());
    	
    	return redirect()->back()->with('status','Categoría registrada');
    }
}
