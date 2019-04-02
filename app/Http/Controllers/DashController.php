<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contactar;
use App\Empresa;
use App\Categoria;
use App\Ajuste;
use App\Ofertas;
use App\Ordenes;

class DashController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $refOfertas = new Ofertas();
        $ofertasNum = $refOfertas->ofertas()->count();

        $refContratos = new Ordenes();
        $contratosNum = $refContratos->contratos()->count();

        $refContactar = new Contactar();
        $porContactar = $refContactar->porContactar()->count();

        $refUser = new User();
        $usuariosCobros = $refUser->where('plan_id' , '!=' , null)->get();

        $planPremium = $refUser->where('plan_id' , 2)->count() * 29;
        $planPlatinum = $refUser->where('plan_id' , 3)->count() * 49;
        $totalRecaudar = $planPlatinum + $planPremium;

        $contratos = Ordenes::orderBy('created_at' , 'desc')->take(10)->get();

        return view('dashboard.home' , compact('ofertasNum' , 'contratosNum' , 'porContactar','usuariosCobros' , 'totalRecaudar','contratos'));
    }

    public function usuarios()
    {
    	$users = new User();
    	$usuarios = $users->usuarios();

    	return view('dashboard.usuarios' , compact('usuarios'));
    }

    public function cobros()
    {
    	$users = new User();
    	$usuarios = $users->cobros();

    	return view('dashboard.cobros' , compact('usuarios'));
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

    public function ofertasPorCategoria($categoria)
    {
        $refCategoria = new Categoria();
        $categoria = $refCategoria->getCategoriaSlug($categoria);

        $refOfertas = new Ofertas();
        $ofertas = $refOfertas->getOfertasCategoria($categoria->id);

        return view('dashboard.ofertas' , compact('ofertas' , 'categoria'));
    }

    public function crearUsuario()
    {
        return view('dashboard.crearusuario');
    }

    public function contratos()
    {
        $contratos = Ordenes::all();

        return view('dashboard.contratos' , compact('contratos'));
    }
}
