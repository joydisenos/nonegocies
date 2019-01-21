<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajuste;

class LegalesController extends Controller
{
    public function editar($tabla)
    {
        $refLegal = Ajuste::first();
        $legal = $refLegal->$tabla;

        return view('dashboard.editarlegales' , compact('legal','tabla'));
    }

    public function actualizar(Request $request , $tabla)
    {
        $refLegal = Ajuste::first();
        $refLegal->$tabla = $request->contenido;
        $refLegal->save();

        return redirect()->route('legales')->with('status', 'Actualizado');
    }
}
