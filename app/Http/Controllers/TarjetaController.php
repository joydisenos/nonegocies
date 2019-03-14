<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Datos;

class TarjetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar(Request $request)
    {
        $validatedData = $request->validate([
            'tarjeta' => 'required|string|max:255',
            'cvv' => 'required|string|max:4',
            'vence' => 'required|string|max:255',
            ]);

        $cuenta = new Datos();
        $cuenta->user_id = Auth::user()->id;
        $cuenta->tarjeta = $request->tarjeta;
        $cuenta->cvv = $request->cvv;
        $cuenta->vence = $request->vence;
        $cuenta->save();

        return redirect()->back()->with('status','Tarjeta Registrada con éxito');
    }
}
