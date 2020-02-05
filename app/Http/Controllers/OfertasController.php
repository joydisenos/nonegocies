<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function duplicar($id)
    {
        $oferta = new Ofertas();
        $ofertaNueva = $oferta->duplicarOferta($id);

        return redirect()->route('editaroferta' , $ofertaNueva->id)->with('status' , 'La oferta se ha duplicado, guarda los cambios de esta para la nueva oferta');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'empresa_id' => 'required',
            'categoria_id' => 'required',
            'tarifa' => 'required',
            ]);

            $precio_diario = $request->precio / 360;

            $oferta = new Ofertas();
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $request->categoria_id;
            if($request->has('tipo'))
                    {
                        $oferta->tipo = $request->tipo;
                    }
            if($request->has('comision_real'))
                    {
                        $oferta->comision_real = $request->comision_real;
                    }
            $oferta->tarifa = $request->tarifa;
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
            if ( $request->precio_inicial !=null )
            {
                $oferta->precio = $request->precio_inicial;
            }else{
                $oferta->precio = 0;
            }
            $oferta->save();

            if( $request->hasFile('imagen_oferta') )
                {
                    $rutaImagen = 'ofertas/'. $oferta->id;
                    $imagen = $request->file('imagen_oferta');
                    $nombreImagen = $imagen->getClientOriginalName();
                    $request->file('imagen_oferta')->storeAs($rutaImagen, $nombreImagen, 'public');
                    $oferta->imagen_oferta = $nombreImagen;
                    $oferta->save();
                }

            if( $request->hasFile('pdf_oferta') )
                {
                    $rutaPdf = 'ofertas/'. $oferta->id;
                    $pdf = $request->file('pdf_oferta');
                    $nombrePdf = $pdf->getClientOriginalName();
                    $request->file('pdf_oferta')->storeAs($rutaPdf, $nombrePdf, 'public');
                    $oferta->pdf_oferta = $nombrePdf;
                    $oferta->save();
                }
                
            if( $request->hasFile('flyer_oferta') )
                {
                    $rutaFlyer = 'ofertas/'. $oferta->id;
                    $flyer = $request->file('flyer_oferta');
                    $nombreflyer = $flyer->getClientOriginalName();
                    $request->file('flyer_oferta')->storeAs($rutaFlyer, $nombreflyer, 'public');
                    $oferta->flyer_oferta = $nombreflyer;
                    $oferta->save();
                }

            if( $request->hasFile('tabla_comisiones') )
                {
                    $rutaTabla = 'ofertas/'. $oferta->id;
                    $tablaComisiones = $request->file('tabla_comisiones');
                    $nombreTabla = $tablaComisiones->getClientOriginalName();
                    $request->file('tabla_comisiones')->storeAs($rutaTabla, $nombreTabla, 'public');
                    $oferta->tabla_comisiones = $nombreTabla;
                    $oferta->save();
                }

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
                    $opcion->categoria_telefonia = $request->subcategoriaTelefonia;
                    $opcion->subtitulo_telefonia = $request->subtitulo_telefonia;
                    $opcion->precio_telefonia = $request->precio_telefonia;
                    $opcion->movil_telefonia = $request->movil_telefonia;
                    $opcion->fijo_telefonia = $request->fijo_telefonia;
                    $opcion->internet_telefonia = $request->internet_telefonia;
                    $opcion->tv_telefonia = $request->tv_telefonia;
                    $opcion->save();
            }else if ($categoria->slug == 'seguros')
            {
                $oferta->subcategoria = $request->subcategoria;
                $oferta->save();
            }
        
        return redirect()->route('ofertas')->with('status','Oferta Registrada');
    }

    public function contratoOffline(Request $request)
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

            // datos para crear nuevas ofertas
            /*
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
            */       

            if($request->user != 0)
            {

                $user = User::findOrFail($request->user);

                $oferta = Ofertas::findOrFail($request->oferta_id);

                $contrato = $oferta->empresa->contrato;
                $contrato = $oferta->contratoUser($oferta->empresa->contrato , $request->user);

                $orden = new Ordenes ();
                $orden->user_id = $request->user;
                $orden->contratista_id = Auth::user()->id;
                $orden->oferta_id = $request->oferta_id;
                $orden->comision = $request->comision;
                $orden->contrato = $contrato;
                $orden->observaciones = $request->observaciones;
                $orden->save();

                //archivos

                if($request->hasFile('dni-scan-an')){
                    $rutaDni = 'contrato/'. $orden->id;
    	            $dni = $request->file('dni-scan-an');
    	            $nombreDni = $dni->getClientOriginalName();
    	            $request->file('dni-scan-an')->storeAs($rutaDni, $nombreDni, 'public');
    	            $orden->dni = $rutaDni . '/' . $nombreDni;
    	            $orden->save();
    	        }

    	        if($request->hasFile('dni-scan-re')){
    	            $rutaDniRe = 'contrato/'. $orden->id;
    	            $dniRe = $request->file('dni-scan-re');
    	            $nombreDniRe = $dniRe->getClientOriginalName();
    	            $request->file('dni-scan-re')->storeAs($rutaDniRe, $nombreDniRe, 'public');
    	            $orden->dni_re = $rutaDniRe . '/' . $nombreDniRe;
    	            $orden->save();
    	        }

    	        if($request->hasFile('factura-scan')){
    	            $rutaFactura = 'contrato/'. $orden->id;
    	            $factura = $request->file('factura-scan');
    	            $nombreFactura = $factura->getClientOriginalName();
    	            $request->file('factura-scan')->storeAs($rutaFactura, $nombreFactura, 'public');
    	            $orden->factura = $rutaFactura . '/' . $nombreFactura;
    	            $orden->save();
    	        }

	            
	            
	            

                if(Auth::user()->hasRole('admin')){
                	$redirect = 'index.contratos';
                }elseif(Auth::user()->hasRole('gerente')){
                	$redirect = 'panel.contratos.referidos';
                }else{
                	$redirect = 'index.contratos';
                }

                return redirect()->route($redirect)->with('status' , 'Contrato registrado con exito');
            }else{
                return redirect()->back()->with('status' , 'Debe seleccionar un usuario');
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
            'tarifa' => 'required',
            ]);
            
            $oferta = Ofertas::findOrFail($id);
            $oferta->nombre = $request->nombre;
            $oferta->slug = str_slug($request->nombre , '-');
            $oferta->empresa_id = $request->empresa_id;
            $oferta->categoria_id = $request->categoria_id;
            if($request->has('tipo'))
                    {
                        $oferta->tipo = $request->tipo;
                    }
            if($request->has('comision_real'))
                    {
                        $oferta->comision_real = $request->comision_real;
                    }
            if($request->has('porcentaje_comision'))
                {
                        $oferta->porcentaje_comision = $request->porcentaje_comision;
                    }
            $oferta->tarifa = $request->tarifa;
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
            if ( $request->precio_inicial !=null )
            {
                $oferta->precio = $request->precio_inicial;
                $oferta->comision_real = $oferta->precio * ($oferta->porcentaje_comision / 100);
            }else{
                $oferta->precio = 0;
            }
            $oferta->save();

            if( $request->hasFile('imagen_oferta') )
                {
                    $rutaImagen = 'ofertas/'. $oferta->id;
                    $imagen = $request->file('imagen_oferta');
                    $nombreImagen = $imagen->getClientOriginalName();
                    $request->file('imagen_oferta')->storeAs($rutaImagen, $nombreImagen, 'public');
                    $oferta->imagen_oferta = $nombreImagen;
                    $oferta->save();
                }
            if($request->has('del_imagen_oferta'))
                    {
                        $oferta->imagen_oferta = null;
                        $oferta->save();
                    }

            if( $request->hasFile('pdf_oferta') )
                {
                    $rutaPdf = 'ofertas/'. $oferta->id;
                    $pdf = $request->file('pdf_oferta');
                    $nombrePdf = $pdf->getClientOriginalName();
                    $request->file('pdf_oferta')->storeAs($rutaPdf, $nombrePdf, 'public');
                    $oferta->pdf_oferta = $nombrePdf;
                    $oferta->save();
                }

            if($request->has('del_pdf_oferta'))
                    {
                        $oferta->pdf_oferta = null;
                        $oferta->save();
                    }
                
            if( $request->hasFile('flyer_oferta') )
                {
                    $rutaFlyer = 'ofertas/'. $oferta->id;
                    $flyer = $request->file('flyer_oferta');
                    $nombreflyer = $flyer->getClientOriginalName();
                    $request->file('flyer_oferta')->storeAs($rutaFlyer, $nombreflyer, 'public');
                    $oferta->flyer_oferta = $nombreflyer;
                    $oferta->save();
                }

            if($request->has('del_flyer_oferta'))
                    {
                        $oferta->flyer_oferta = null;
                        $oferta->save();
                    }

            if( $request->hasFile('tabla_comisiones') )
                {
                    $rutaTabla = 'ofertas/'. $oferta->id;
                    $tablaComisiones = $request->file('tabla_comisiones');
                    $nombreTabla = $tablaComisiones->getClientOriginalName();
                    $request->file('tabla_comisiones')->storeAs($rutaTabla, $nombreTabla, 'public');
                    $oferta->tabla_comisiones = $nombreTabla;
                    $oferta->save();
                }

            if($request->has('del_tabla_comisiones'))
                    {
                        $oferta->tabla_comisiones = null;
                        $oferta->save();
                    }

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
                    $opcion->categoria_telefonia = $request->subcategoriaTelefonia;
                    $opcion->subtitulo_telefonia = $request->subtitulo_telefonia;
                    $opcion->precio_telefonia = $request->precio_telefonia;
                    $opcion->movil_telefonia = $request->movil_telefonia;
                    $opcion->fijo_telefonia = $request->fijo_telefonia;
                    $opcion->internet_telefonia = $request->internet_telefonia;
                    $opcion->tv_telefonia = $request->tv_telefonia;
                    $opcion->save();
            }else if ($categoria->slug == 'seguros')
            {
                $oferta->subcategoria = $request->subcategoria;
                $oferta->save();
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
