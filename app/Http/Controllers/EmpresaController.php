<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function crear(Request $request)
    {
    	$validatedData = $request->validate([
        'nombre' => 'required|max:255'
        ]);
        
        if( $request->hasFile('logo') )
        {
            $ruta = 'empresa/'. str_slug($request->nombre , '-');
            $logo = $request->file('logo');
            $nombre = $logo->getClientOriginalName();
            $request->file('logo')->storeAs($ruta, $nombre, 'public');
        }

        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        if( $request->descripcion != null)
        {
            $empresa->descripcion = $request->descripcion;
        }else{
            $empresa->descripcion = '';
        }
        if ( $request->hasFile('logo') )
        {
            $empresa->logo = $ruta . '/' . $nombre;
        }
        $empresa->save();
    	
    	return redirect()->back()->with('status','Empresa registrada');
    }

    public function estatus($id , $estatus)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->estatus = $estatus;
        $empresa->save();

        if($estatus == 0)
        {
            $mensaje = 'Eliminada';
        }else if($estatus == 1){
            $mensaje = 'Activada';
        }else if($estatus == 2){
            $mensaje = 'Desactivada';
        }

        return redirect()->back()->with('status','Empresa '. $mensaje);
    }

    public function editar ($id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('dashboard.editarempresa' , compact('empresa'));
    }

    public function actualizar(Request $request , $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255'
            ]);
            
            if( $request->hasFile('logo') )
            {
                $ruta = 'empresa/'. str_slug($request->nombre , '-');
                $logo = $request->file('logo');
                $nombre = $logo->getClientOriginalName();
                $request->file('logo')->storeAs($ruta, $nombre, 'public');
            }
    
            $empresa = Empresa::findOrFail($id);
            $empresa->nombre = $request->nombre;
            if( $request->descripcion != null)
            {
                $empresa->descripcion = $request->descripcion;
            }else{
                $empresa->descripcion = '';
            }
            if ( $request->hasFile('logo') )
            {
                $empresa->logo = $ruta . '/' . $nombre;
            }
            $empresa->save();
            
            return redirect()->route('empresas')->with('status','Empresa actualizada');
    }
}
