<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
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
        if($request->has('referido_id'))
        {
            $user->referido_id = $request->referido_id;    
        }
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

        $usuario = Auth::user();
        $roles = $usuario->getRoleNames()->toArray();
      
        
            if(in_array("admin", $roles))
            {
                return redirect()->route('usuarios')->with('status','Usuario Creado');
            }else{
                return redirect()->route('panel.usuarios')->with('status','Usuario Creado');
            }
        

    }

    public function modificar($id)
    {
        $usuario = User::findOrFail($id);
        $roles = $usuario->getRoleNames()->toArray();
        $permisos = Permission::all();
      
        
            if(in_array("admin", $roles))
            {
                $admin = true;
            }else{
                $admin = false;
            }
        

        return view('dashboard.editarusuario' , compact('usuario' , 'admin' , 'permisos'));
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
        $user->plan_id = $request->plan_id;
        $user->dias_plazo = $request->dias_plazo;
        $user->save();

        if($request->has('admin'))
        {
            $user->assignRole('admin');
        }else{
            $user->removeRole('admin');
        }
        
        if($request->has('gerente'))
        {
            $user->assignRole('gerente');
        }else{
            $user->removeRole('gerente');
        }

        $user->syncPermissions($request->permisos);

        $usuario = Auth::user();
        $roles = $usuario->getRoleNames()->toArray();
      
        
            if(in_array("admin", $roles))
            {
                return redirect()->route('usuarios')->with('status','Usuario Actualizado');
            }else{
                return redirect()->route('panel.usuarios')->with('status','Usuario Actualizado');
            }
    }

    public function borrar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios')->with('status','Usuario Eliminado');
    }
}
