<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mensajes;
use App\Datos;
use App\Cobro;
use App\Ordenes;
use App\Comision;

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
        $cuenta = Cobro::where('user_id' , Auth::user()->id)->first();
        $tarjeta = Datos::where('user_id' , Auth::user()->id)->first();

        return view('panel.configuracion' , compact('cuenta' , 'tarjeta'));
    }

    public function contratos()
    {
        $contratos = Ordenes::where('user_id' , Auth::user()->id)->orderBy('created_at' , 'desc')->get();

        return view('panel.contratos' , compact('contratos'));
    }

    public function comisiones()
    {
        $comisiones = Auth::user()->comisiones;

        return view('dashboard.comisiones' , compact('comisiones'));
    }

    public function contrato($id)
    {
        $contrato = Ordenes::findOrFail($id);

        return view('panel.contrato' , compact('contrato'));
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
        
        /*if($request->tarjeta != null || $request->cvv != null || $request->vence != null)
        {
            $validatedData = $request->validate([
                'tarjeta' => 'required|string|max:255',
                'cvv' => 'required',
                'vence' => 'required|string|max:255',
                ]);
        }*/

        if($request->numero != null || $request->banco != null)
        {
           /* $validatedData = $request->validate([
                'numero' => 'required|string|max:255',
                'nombre' => 'required',
                'banco' => 'required|string|max:255',
                ]);*/
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


            $tarjeta = Datos::where('user_id' , Auth::user()->id)->first();
            if($tarjeta == null)
            {
                $tarjeta = new Datos();
                $tarjeta->user_id = Auth::user()->id;
            }
            $tarjeta->tarjeta = $request->tarjeta;
            $tarjeta->cvv = $request->cvv;
            $tarjeta->vence = $request->vence;
            $tarjeta->save();

        
            $cobro = Cobro::where('user_id' , Auth::user()->id)->first();
            if($cobro == null)
            {
                $cobro = new Cobro();
                $cobro->user_id = Auth::user()->id;
            }
            $cobro->numero = $request->numero;
            $nombre = explode( ' ' , $request->nombre);
           
            if($request->nombre != '')
            {
                if(count($nombre) == 1)
                {
                    $cobro->nombre = $nombre[0];
                }else{
                    $cobro->nombre = $nombre[0];
                    $cobro->apellido = $nombre[1];
                }
            }else{
                $cobro->nombre = '';
                $cobro->apellido = '';
            }
            $cobro->banco = $request->banco;
            $cobro->save();
        

        return redirect()->back()->with('status','Datos Actualizados Correctamente');
    }
    
    public function mensajes()
    {
        $mensajesRef = new Mensajes();
        $mensajes = $mensajesRef->getMensajes(Auth::user()->id);

        return view('panel.mensajes' , compact('mensajes'));
    }

    public function usuarios()
    {
        $users = Auth::user();
        $usuarios = $users->referidos;

        return view('dashboard.usuarios' , compact('usuarios'));
    }

    public function crearUsuario()
    {
        return view('dashboard.crearusuario');
    }

    public function contratosReferidos()
    {
        $users = Auth::user();
        $usuarios = $users->referidos;

        $idUsers = array();

        foreach ($usuarios as $user) {
            array_push( $idUsers, $user->id);
        }

        $contratos = Ordenes::whereIn('user_id' , $idUsers)
                                ->orWhere('contratista_id' , Auth::user()->id)
                                ->get(); 
        

        return view('dashboard.contratos' , compact('contratos'));
    }

    public function detallesContrato($id)
    {
        $contrato = Ordenes::findOrFail($id);

        return view('dashboard.contrato' , compact('contrato'));
    }

    public function referidos()
    {
        return view('panel.referidos');
    }
}
