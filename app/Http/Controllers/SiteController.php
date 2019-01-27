<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajuste;

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

    public function index($categoria)
    {
        $refCategoria = new Categoria();
        $categoria = $refCategoria->getCategoriaSlug($categoria);

        $ofertas = Oferta::where('categoria_id' , $categoria->id)->get();

        return view('ofertas.solicitud' , compact('categoria'));
    }
}
