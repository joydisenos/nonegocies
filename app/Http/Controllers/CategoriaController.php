<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\CamposCategoria;

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
        
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->slug = str_slug($request->nombre , '-');
        $categoria->save();
    	
    	return redirect()->back()->with('status','Categoría registrada');
    }

    public function editar($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('dashboard.editarcategoria' , compact('categoria'));
    }

    public function actualizar(Request $request , $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        foreach($categoria->campos as $campo)
        {
            $campo->delete();
        }

        if ($request->has('nombreopcion')) {

            $opciones = array_combine($request->nombreopcion , $request->tipoopcion);

            foreach($opciones as $nombre => $tipo)
            {
                $opcion = new CamposCategoria();
                $opcion->categoria_id = $id;
                $opcion->nombre = $nombre;
                $opcion->tipo = $tipo;
                $opcion->save();
            }
        }

        return redirect()->route('categorias')->with('status','Categoría Actualizada');
    }
}
