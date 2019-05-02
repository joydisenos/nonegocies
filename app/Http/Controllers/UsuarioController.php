<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Datos;
use App\Cobro;

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
            'password' => 'required|string|min:6|max:255',
            ]);
        
        if($request->tarjeta != null || $request->cvv != null || $request->vence != null)
        {
            $validatedData = $request->validate([
                'tarjeta' => 'required|string|max:255',
                'cvv' => 'required',
                'vence' => 'required|string|max:255',
                ]);
        }

        if($request->numero != null || $request->banco != null)
        {
            $validatedData = $request->validate([
                'numero' => 'required|string|max:255',
                'banco' => 'required|string|max:255',
                ]);
        }

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
        $user->tipo = $request->tipo;
        $user->save();

        if($request->has('admin'))
        {
            $user->assignRole('admin');
        }

        if($request->tarjeta != null || $request->cvv != null || $request->vence != null)
        {

            
            $tarjeta = new Datos();
            $tarjeta->user_id = $user->id;
        
            $tarjeta->tarjeta = $request->tarjeta;
            $tarjeta->cvv = $request->cvv;
            $tarjeta->vence = $request->vence;
            $tarjeta->save();

        }

        if($request->numero != null || $request->banco != null)
        {
            
            $cobro = new Cobro();
            $cobro->user_id = $user->id;
    
            $cobro->numero = $request->numero;
            $cobro->nombre = $request->name;
            $cobro->apellido = $request->apellido;
            $cobro->banco = $request->banco;
            $cobro->save();
        }

        return redirect()->route('usuarios')->with('status','Usuario Creado');

    }

    public function modificar($id)
    {
        $usuario = User::findOrFail($id);

        return view('dashboard.editarusuario' , compact('usuario'));
    }

    public function actualizar(Request $request, $id)
    {
        if($request->password != null)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'password' => 'required|string|min:6|max:255',
                ]);
        }else{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                ]);
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        // $user->email = $request->email;
        if($request->password != null)
        {
            $user->password = Hash::make($request->password);
        }
        $user->direccion = $request->direccion;
        $user->dni = $request->dni;
        $user->cp = $request->cp;
        $user->localidad = $request->localidad;
        $user->telefono = $request->telefono;
        $user->tipo = $request->tipo;
        $user->save();

        return redirect()->route('usuarios')->with('status','Usuario Actualizado');
    }

    public function borrar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios')->with('status','Usuario Eliminado');
    }
}
