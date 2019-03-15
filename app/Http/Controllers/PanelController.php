<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mensajes;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('panel.inicio');
    }

    public function configuracion()
    {
        return view('panel.configuracion');
    }

    public function planes()
    {
        return view('panel.planes');
    }

    public function datos(Request $request)
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

        $user = User::findOrFail(Auth::user()->id);
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
        $user->cup_gas = $request->cup_gas;
        $user->cup_luz = $request->cup_luz;
        $user->save();

        return redirect()->back()->with('status','Datos Actualizados Correctamente');
    }
    
    public function mensajes()
    {
        $mensajesRef = new Mensajes();
        $mensajes = $mensajesRef->getMensajes(Auth::user()->id);

        return view('panel.mensajes' , compact('mensajes'));
    }
}
