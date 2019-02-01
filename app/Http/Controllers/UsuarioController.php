<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed|max:255',
            ]);

        $user = new User();
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->direccion = $request->direccion;
        $user->dni = $request->dni;
        $user->cp = $request->cp;
        $user->localidad = $request->localidad;
        $user->telefono = $request->telefono;
        $user->save();

        return redirect()->route('usuarios')->with('status','Usuario Creado');

    }
}
