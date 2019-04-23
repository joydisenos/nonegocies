<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Categoria;
use App\Ofertas;
use App\Ordenes;
use App\User;
use App\CamposOferta;

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
            'tarifa' => 'required',
            ]);

            $precio_diario = $request->precio / 360;

            $oferta = new Ofertas();
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $request->categoria_id;
            $oferta->tipo = $request->tipo;
            $oferta->tarifa = $request->tarifa;
            $oferta->precio = 0;
            $oferta->precio_diario = 0;
            if ( $request->descripcion !=null )
            {
                $oferta->descripcion = $request->descripcion;
            }else{
                $oferta->descripcion = '';
            }
            if ( $request->comision !=null )
            {
                $oferta->comision = $request->comision;
            }else{
                $oferta->comision = 0;
            }
            if ( $request->plan1 !=null )
            {
                $oferta->plan1 = $request->plan1;
            }else{
                $oferta->plan1 = 0;
            }
            if ( $request->plan2 !=null )
            {
                $oferta->plan2 = $request->plan2;
            }else{
                $oferta->plan2 = 0;
            }
            if ( $request->plan3 !=null )
            {
                $oferta->plan3 = $request->plan3;
            }else{
                $oferta->plan3 = 0;
            }
            $oferta->save();

            //  opciones

            $categoria = Categoria::findOrFail($request->categoria_id);
            
            if($categoria->slug == 'luz')
            {
                
                    $opcion = new CamposOferta ();
                    $opcion->oferta_id = $oferta->id;
                    $opcion->nombre = 'luz';
                    $opcion->pp1 = $request->pp1;
                    $opcion->pp2 = $request->pp2;
                    $opcion->pp3 = $request->pp3;
                    $opcion->ep1 = $request->ep1;
                    $opcion->ep2 = $request->ep2;
                    $opcion->ep3 = $request->ep3;
                    $opcion->save();
                
            }else if($categoria->slug == 'gas')
            {
                    $opcion = new CamposOferta ();
                    $opcion->oferta_id = $oferta->id;
                    $opcion->nombre = 'gas';
                    $opcion->precio_tarifa = $request->precio_tarifa;
                    $opcion->precio_fijo = $request->precio_fijo;
                    $opcion->save();
            }else if($categoria->slug == 'telefonia')
            {
                    $opcion = new CamposOferta ();
                    $opcion->oferta_id = $oferta->id;
                    $opcion->nombre = 'telefonia';
                    $opcion->categoria_telefonia = $request->subcategoria;
                    $opcion->subtitulo_telefonia = $request->subtitulo_telefonia;
                    $opcion->precio_telefonia = $request->precio_telefonia;
                    $opcion->movil_telefonia = $request->movil_telefonia;
                    $opcion->fijo_telefonia = $request->fijo_telefonia;
                    $opcion->internet_telefonia = $request->internet_telefonia;
                    $opcion->tv_telefonia = $request->tv_telefonia;
                    $opcion->save();
            }
        
        return redirect()->route('ofertas')->with('status','Oferta Registrada');
    }

    public function contratoOffline(Request $request)
    {

        if($request->oferta_id == 0)
        {
            $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'empresa_id' => 'required',
            'precio' => 'required',
            'user' => 'required'
            ]);

            //obtener categoria offline
            $refCategoria = new Categoria();
            $categoria = $refCategoria->getCategoriaSlug('contratos-offline');

            $oferta = new Ofertas();
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $categoria->id;
            $oferta->tipo = 1;
            $oferta->precio = 0;
            $oferta->precio_diario = 0;
            if ( $request->descripcion !=null )
            {
                $oferta->descripcion = $request->descripcion;
            }else{
                $oferta->descripcion = '';
            }
            if ( $request->comision !=null )
            {
                $oferta->comision = $request->comision;
            }else{
                $oferta->comision = 0;
            }
            if ( $request->plan1 !=null )
            {
                $oferta->plan1 = $request->plan1;
            }else{
                $oferta->plan1 = 0;
            }
            if ( $request->plan2 !=null )
            {
                $oferta->plan2 = $request->plan2;
            }else{
                $oferta->plan2 = 0;
            }
            if ( $request->plan3 !=null )
            {
                $oferta->plan3 = $request->plan3;
            }else{
                $oferta->plan3 = 0;
            }
            $oferta->save();
                
            $opcion = new CamposOferta ();
            $opcion->oferta_id = $oferta->id;
            $opcion->nombre = 'offline';
            $opcion->precio_fijo = $request->precio;
            $opcion->fecha = $request->fecha;
            $opcion->save();

            
                //$oferta = Ofertas::findOrFail($request->oferta_id);

                $contrato = $oferta->empresa->contrato;
                $contrato = $oferta->contratoUser($oferta->empresa->contrato , $request->user);

                    $user = User::findOrFail($request->user);

                    if($user->plan_id == 0)
                    {
                        $multiplo = $request->plan1 / 100;
                    }else if($user->plan_id == 2)
                    {
                        $multiplo = $request->plan2 / 100;
                    }else if($user->plan_id == 3)
                    {
                        $multiplo = $request->plan3 / 100;
                    }

                $comision = $request->comision * $multiplo;

                $orden = new Ordenes ();
                $orden->user_id = $request->user;
                $orden->oferta_id = $oferta->id;
                $orden->comision = $comision;
                $orden->contrato = $contrato;
                $orden->save();
            
                return redirect()->route('index.contratos')->with('status','Oferta Offline Registrada');

        }else{

            if($request->user != 0)
            {

                $oferta = Ofertas::findOrFail($request->oferta_id);

                $contrato = $oferta->empresa->contrato;
                $contrato = $oferta->contratoUser($oferta->empresa->contrato , $request->user);

                $orden = new Ordenes ();
                $orden->user_id = $request->user;
                $orden->oferta_id = $request->oferta_id;
                $orden->comision = 0;
                $orden->contrato = $contrato;
                $orden->save();
            }
        }
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
            'tarifa' => 'required',
            ]);

            $oferta = Ofertas::findOrFail($id);
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $request->categoria_id;
            $oferta->tipo = $request->tipo;
            $oferta->tarifa = $request->tarifa;
            $oferta->precio = 0;
            $oferta->precio_diario = 0;
            if ( $request->descripcion !=null )
            {
                $oferta->descripcion = $request->descripcion;
            }else{
                $oferta->descripcion = '';
            }
            if ( $request->comision !=null )
            {
                $oferta->comision = $request->comision;
            }else{
                $oferta->comision = 0;
            }
            if ( $request->plan1 !=null )
            {
                $oferta->plan1 = $request->plan1;
            }else{
                $oferta->plan1 = 0;
            }
            if ( $request->plan2 !=null )
            {
                $oferta->plan2 = $request->plan2;
            }else{
                $oferta->plan2 = 0;
            }
            if ( $request->plan3 !=null )
            {
                $oferta->plan3 = $request->plan3;
            }else{
                $oferta->plan3 = 0;
            }
            $oferta->save();

            //  opciones

            $categoria = Categoria::findOrFail($request->categoria_id);
            
            if($categoria->slug == 'luz')
            {  
                    $opcion = CamposOferta::where('oferta_id' , $oferta->id)->first();
                    $opcion->pp1 = $request->pp1;
                    $opcion->pp2 = $request->pp2;
                    $opcion->pp3 = $request->pp3;
                    $opcion->ep1 = $request->ep1;
                    $opcion->ep2 = $request->ep2;
                    $opcion->ep3 = $request->ep3;
                    $opcion->save();

            }else if($categoria->slug == 'gas')
            {

                    $opcion = CamposOferta::where('oferta_id' , $oferta->id)->first();
                    $opcion->precio_tarifa = $request->precio_tarifa;
                    $opcion->precio_fijo = $request->precio_fijo;
                    $opcion->save();
                
            }else if($categoria->slug == 'telefonia')
            {
                    $opcion = CamposOferta::where('oferta_id' , $oferta->id)->first();
                    $opcion->oferta_id = $oferta->id;
                    $opcion->categoria_telefonia = $request->subcategoria;
                    $opcion->subtitulo_telefonia = $request->subtitulo_telefonia;
                    $opcion->precio_telefonia = $request->precio_telefonia;
                    $opcion->movil_telefonia = $request->movil_telefonia;
                    $opcion->fijo_telefonia = $request->fijo_telefonia;
                    $opcion->internet_telefonia = $request->internet_telefonia;
                    $opcion->tv_telefonia = $request->tv_telefonia;
                    $opcion->save();
            }
            
        
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
