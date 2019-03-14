<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cobro;

class CuentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'banco' => 'required|string|max:255',
            ]);

        $cuenta = new Cobro();
        $cuenta->user_id = Auth::user()->id;
        $cuenta->numero = $request->numero;
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->banco = $request->banco;
        $cuenta->save();

        return redirect()->back()->with('status','Cuenta Registrada con éxito');
    }
}
