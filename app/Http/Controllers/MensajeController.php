<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensajes;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mensajes()
    {
        $usuarios = User::all();

        return view('dashboard.mensajes' , compact('usuarios'));
    }

    public function enviar(Request $request)
    {
        if($request->destino == null)
        {
            $usuarios = User::all();
            foreach($usuarios as $user)
            {
                $mensaje = new Mensajes();
                $mensaje->user_id = $user->id;
                $mensaje->asunto = $request->asunto;
                $mensaje->mensaje = $request->mensaje;
                $mensaje->save();
            }
        }else{        
            $mensaje = new Mensajes();
            $mensaje->user_id = $request->destino;
            $mensaje->asunto = $request->asunto;
            $mensaje->mensaje = $request->mensaje;
            $mensaje->save();
        }

        return redirect()->back()->with('status','Mensaje Enviado');
    }

    public function marcar(Request $request)
    {
        $mensaje = Mensajes::findOrFail($request->id);
        $mensaje->leido = $request->leido;
        $mensaje->save();

        if($request->leido == 1)
        {
            return response()->json([
                'guardado' => 'Marcado como Leido']);
        }
        elseif($request->leido == 0)
        {
            return response()->json([
                'guardado' => 'Marcado como Pendiente']);
        }
    }
}
