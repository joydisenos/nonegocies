<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Ajuste;
use App\Categoria;
use App\Ofertas;
use App\User;
use Carbon\Carbon;
use App\Mail\ColaboraMail;

class SiteController extends Controller
{
    public function inicio()
    {
    	return view('inicio');
    }

     public function planes()
    {
    	$refLegal = Ajuste::first();
        $legal = $refLegal->contrato_plan;

        return view('planes' , compact('legal'));
    }

     public function nosotros()
    {
        return view('nosotros');
    }

    public function colabora()
    {
        return view('colabora');
    }

    public function mailColabora(Request $request)
    {
        Mail::to('info@nonegocies.es')
        //Mail::to('joydisenos@gmail.com')
                   ->send(new ColaboraMail($request));

        return redirect()->back()->with('status' , 'Mensaje enviado con exito');
    }

    public function seguros()
    {
        return view('ofertas.seguros');
    }

    public function ofertasTelefonia()
    {

        $refCategoria = new Categoria();
        $categoria = $refCategoria->getCategoriaSlug('telefonia');

        $refOfertas = new Ofertas();
        $ofertas = $refOfertas->getOfertasCategoria($categoria->id);

        return view('ofertas.telefonia' , compact('ofertas'));
    }

    public function ofertasCategoria($categoria)
    {

        $refCategoria = new Categoria();
        $categoria = $refCategoria->getCategoriaSlug($categoria);

        $refOfertas = new Ofertas();
        $ofertas = $refOfertas->getOfertasCategoria($categoria->id);

        $contratoRef = Ajuste::first();
        $contrato = $contratoRef->contrato_oferta;

        return view('ofertas.resultados-varios' , compact('ofertas' , 'categoria' , 'contrato'));
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

    public function contrato_plan()
    {
        $refLegal = Ajuste::first();
        $legal = $refLegal->contrato_plan;

    	return view('contrato', compact('legal'));
    }

    public function categoria()
    {
        $refCategoria = new Categoria();
        $categorias = $refCategoria->categorias();

        return view('ofertas.formulario' , compact('categorias'));
    }

    public function consultar_gas(Request $request)
    {
         $validatedData = $request->validate([
            'servicio' => 'required',
            'monto' => 'required',
            'persona' => 'required',
            'tarifa' => 'required',
            'precio_tarifa' => 'required',
            'precio_fijo' => 'required',
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

        $desde = Carbon::createFromFormat('d/m/Y' , $request->desde);
        $hasta = Carbon::createFromFormat('d/m/Y' , $request->hasta);

        $dias = $hasta->diffInDays($desde);
        $precio = $request->monto;

        $categoriaId = $categoria->id;
        $tipoPersona = $request->persona;
        $tarifa = (int)$request->tarifa;
        $kw = $request->precio_tarifa;
        $monto = $request->monto;
        $userip = $request->ip();
        if($request->has('order')){
            $order = $request->order;
        }else{ 
            $order = 'totalgeneral';
             }

        $contratoRef = Ajuste::first();
        $contrato = $contratoRef->contrato_oferta;
        
        $ofertas = $refOfertas->getOfertasMenorPrecioGas($categoriaId , $tarifa , $tipoPersona , $precio , $dias , $kw , $order);
        
        
        return view('ofertas.resultados-gas' , compact('ofertas' , 'categoria','kw','monto' ,'dias','contrato','userip' ,'precio'));
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

        $desde = Carbon::createFromFormat('d/m/Y' , $request->desde);
        $hasta = Carbon::createFromFormat('d/m/Y' , $request->hasta);

        $dias = $hasta->diffInDays($desde);
        $precio = (float)$request->monto;

        $pp1 = (float)$request->pp1;
        $pp2 = (float)$request->pp2;
        $pp3 = (float)$request->pp3;
        $ep1 = (float)$request->ep1;
        $ep2 = (float)$request->ep2;
        $ep3 = (float)$request->ep3;
        $categoriaId = $categoria->id;
        $tipoPersona = $request->persona;
        $tarifa = (int)$request->tarifa;
        $userip = $request->ip();
        if($request->has('order')){
            $order = $request->order;
        }else{ 
            $order = 'totalgeneral';
             }

        $contratoRef = Ajuste::first();
        $contrato = $contratoRef->contrato_oferta;
        
        $ofertas = $refOfertas->getOfertasMenorPrecioLuz($categoriaId , $tarifa , $tipoPersona , $precio , $pp1 , $pp2 , $pp3 , $ep1 , $ep2 , $ep3 , $dias , $order);
        
        return view('ofertas.resultados-luz' , compact('ofertas' , 'categoria' ,'precio','contrato' , 'request' , 'dias','userip'));
    }

    public function registro($referido)
    {
        $user = User::findOrFail($referido);

        return view('auth.register',compact('referido'));
    }
}
