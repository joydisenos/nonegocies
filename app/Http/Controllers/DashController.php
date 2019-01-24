<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contactar;
use App\Empresa;
use App\Categoria;
use App\Ajuste;
use App\Ofertas;

class DashController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.home');
    }

    public function usuarios()
    {
    	$users = new User();
    	$usuarios = $users->usuarios();

    	return view('dashboard.usuarios' , compact('usuarios'));
    }

    public function empresas()
    {
    	$refEmpresas = new Empresa();
    	$empresas = $refEmpresas->empresas();

    	return view('dashboard.empresas' , compact('empresas'));
    }

    public function contactar()
    {
    	$contactar = new Contactar();
    	$contactos = $contactar->contactos();

    	return view('dashboard.contactar' , compact('contactos'));
    }

    public function categorias()
    {
    	$refCategorias = new Categoria();
    	$categorias = $refCategorias->categorias();

    	return view('dashboard.categorias' , compact('categorias'));
    }

    public function legales()
    {
        $refLegales = new Ajuste();
        $legales = $refLegales->legales();

        return view('dashboard.legales' , compact('legales'));
    }

    public function ofertas()
    {
        $refOfertas = new Ofertas();
        $ofertas = $refOfertas->ofertas();

        return view('dashboard.ofertas' , compact('ofertas'));
    }
}
