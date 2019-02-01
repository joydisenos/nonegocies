<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Categoria;
use App\Ofertas;

class OfertasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function crear()
    {
        $refEmpresas = new Empresa();
        $empresas = $refEmpresas->empresas();

        $refCategorias = new Categoria();
        $categorias = $refCategorias->categorias();

        return view('dashboard.crearoferta' , compact('empresas','categorias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'empresa_id' => 'required',
            'categoria_id' => 'required',
            'tipo' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            ]);

            $precio_diario = $request->precio / 360;

            $oferta = new Ofertas();
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $request->categoria_id;
            $oferta->tipo = $request->tipo;
            $oferta->precio = $request->precio;
            $oferta->precio_diario = $precio_diario;
            $oferta->descripcion = $request->descripcion;
            $oferta->save();
        
        return redirect()->route('ofertas')->with('status','Oferta Registrada');
    }

    public function editar($id)
    {
        $oferta = Ofertas::findOrFail($id);

        $refEmpresas = new Empresa();
        $empresas = $refEmpresas->empresas();

        $refCategorias = new Categoria();
        $categorias = $refCategorias->categorias();

        return view('dashboard.editaroferta' , compact('oferta' , 'empresas' , 'categorias'));
    }

    public function actualizar(Request $request , $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'empresa_id' => 'required',
            'categoria_id' => 'required',
            'tipo' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            ]);

            $precio_diario = $request->precio / 360;

            $oferta = Ofertas::findOrFail($id);
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $request->categoria_id;
            $oferta->tipo = $request->tipo;
            $oferta->precio = $request->precio;
            $oferta->precio_diario = $precio_diario;
            $oferta->descripcion = $request->descripcion;
            $oferta->save();
        
        return redirect()->route('ofertas')->with('status','Oferta Actualizada');
    }

    public function estatus($id , $estatus)
    {
        $oferta = Ofertas::findOrFail($id);
        $oferta->estatus = $estatus;
        $oferta->save();

        if($estatus == 0)
        {
            $mensaje = 'Eliminada';
        }else if($estatus == 1){
            $mensaje = 'Activada';
        }else if($estatus == 2){
            $mensaje = 'Desactivada';
        }

        return redirect()->back()->with('status','Oferta '. $mensaje);
    }
}
