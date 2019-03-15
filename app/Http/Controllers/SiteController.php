<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ajuste;
use App\Categoria;
use App\Ofertas;
use Carbon\Carbon;

class SiteController extends Controller
{
    public function inicio()
    {
    	return view('inicio');
    }

     public function planes()
    {
        return view('planes');
    }

     public function nosotros()
    {
        return view('nosotros');
    }

    public function terminos()
    {
        $refLegal = Ajuste::first();
        $legal = $refLegal->terminos;

    	return view('terminos' , compact('legal'));
    }

    public function privacidad()
    {
        $refLegal = Ajuste::first();
        $legal = $refLegal->privacidad;

    	return view('privacidad' , compact('legal'));
    }

    public function cookies()
    {
        $refLegal = Ajuste::first();
        $legal = $refLegal->cookies;

    	return view('cookies', compact('legal'));
    }

    public function categoria()
    {
        $refCategoria = new Categoria();
        $categorias = $refCategoria->categorias();

        return view('ofertas.formulario' , compact('categorias'));
    }

    public function consultar(Request $request)
    {
        $validatedData = $request->validate([
            'servicio' => 'required',
            'persona' => 'required',
            'tarifa' => 'required',
            'pp1' => 'required',
            'pp2' => 'required',
            'pp3' => 'required',
            'ep1' => 'required',
            'ep2' => 'required',
            'ep3' => 'required',
            'monto' => 'required',
            'desde' => 'required',
            'hasta' => 'required',
            ]);
        if($user = Auth::user() && Auth::user()->tipo == null)
            {
                $user = Auth::user();
                $user->tipo = $request->persona;
                $user->save();
            }   

        $categoria = Categoria::findOrFail($request->servicio);
        $refOfertas = new Ofertas;

        $desde = Carbon::parse($request->desde);
        $hasta = Carbon::parse($request->hasta);

        $dias = $hasta->diffInDays($desde);
        $precio = (float)$request->monto;

        $pp1 = (float)$request->pp1;
        $pp2 = (float)$request->pp2;
        $pp3 = (float)$request->pp3;
        $ep1 = (float)$request->ep1 / $dias;
        $ep2 = (float)$request->ep2 / $dias;
        $ep3 = (float)$request->ep3 / $dias;
        $categoriaId = $categoria->id;
        $tipoPersona = $request->persona;
        $tarifa = (int)$request->tarifa;
        
        $ofertas = $refOfertas->getOfertasMenorPrecioLuz($categoriaId , $tarifa , $tipoPersona , $precio , $pp1 , $pp2 , $pp3 , $ep1 , $ep2 , $ep3 , $dias);
        
        return view('ofertas.resultados' , compact('ofertas' , 'categoria'));
    }
}
