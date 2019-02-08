<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'monto' => 'required',
            'desde' => 'required',
            'hasta' => 'required',
            ]);

        $categoria = Categoria::findOrFail($request->servicio);
        $refOfertas = new Ofertas;

        $desde = Carbon::parse($request->desde);
        $hasta = Carbon::parse($request->hasta);

        $periodo = $hasta->diffInDays($desde);
        $precio = $request->monto / $periodo;
            
        $ofertas = $refOfertas->getOfertasMenorPrecioLuz($categoria->id , $precio);

        return view('ofertas.resultados' , compact('ofertas' , 'categoria'));
    }
}
