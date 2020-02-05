@extends('layouts.dash')

@section('content')

<div class="main-content">
<form action="{{ route('actualizaroferta' , [ $oferta->id ]) }}" enctype="multipart/form-data" method="post">
  @csrf
  <!-- HEADER -->
  <div class="header">
    <div class="container-fluid">
      
      <!-- Body -->
      <div class="header-body">
        <div class="row align-items-end">
          <div class="col">
            
            <!-- Pretitle -->
            <h6 class="header-pretitle">
            Bienvenido, {{ title_case(Auth::user()->name) }} {{ title_case(Auth::user()->apellido) }}
            </h6>
            <!-- Title -->
            <h1 class="header-title">
            Actualizar Oferta {{ title_case($oferta->nombre) }}
            </h1>
          </div>
          <div class="col-auto">
            
            <!-- Button trigger modal -->
    
            <button type="submit" class="btn btn-primary">
            Guardar
            </button>
            
          </div>
          </div> <!-- / .row -->
          </div> <!-- / .header-body -->
        </div>
        </div> <!-- / .header -->
        
        <!-- CARDS -->
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">
              
              <!-- Goals -->
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col">
                      <!-- Title -->
                      <h4 class="card-header-title">
                      Oferta {{ title_case($oferta->nombre) }}
                      </h4>
                    </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        

                        <div class="form-group row">
                          <div class="col">
                            <label for="nombreoferta">Nombre de la Oferta</label>
                            <input type="text" name="nombre" class="form-control" id="nombreoferta" placeholder="Nombre de la Oferta" value="{{ $oferta->nombre }}" required>
                          </div>
                          @if($oferta->categoria->slug == 'luz' || $oferta->categoria->slug == 'luz')
                          @else
                          <div class="col-md-4">
                          	<label>Para usuarios:</label>
                          	 <select name="tipo" class="form-control">
      			                  <option value="1" {{ $oferta->tipo == 1 ? 'selected' : '' }}>Particulares</option>
      			                  <option value="2" {{ $oferta->tipo == 2 ? 'selected' : '' }}>Empresas</option>
      			                  <option value="3" {{ $oferta->tipo == 3 ? 'selected' : '' }}>Comunidades</option>
      			                  <option value="4" {{ $oferta->tipo == 4 ? 'selected' : '' }}>Administradores</option>
      			                </select>
                          </div>
                          @endif
                        </div>


                        <div class="form-group row">


                          <div class="col-md-4">
                            <label for="nombreoferta">Empresa</label>
                            <select name="empresa_id" class="form-control" data-toggle="select" required>
                              <option value="">Seleccione una Empresa</option>
                              @foreach($empresas as $empresa)
                              <option value="{{ $empresa->id }}"
                                {{ ($oferta->empresa_id == $empresa->id) ? 'selected' : '' }}>
                                {{ $empresa->nombre }}
                              </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label for="nombreoferta">Categoría</label>
                            <select name="categoria_id" class="form-control" id="categorias" required>
                              <option value="">Seleccione una Categoría</option>
                              @foreach($categorias as $categoria)
                              @can($categoria->slug)
                              <option value="{{ $categoria->id }}" data-slug="{{$categoria->slug}}"
                                {{ ($oferta->categoria_id == $categoria->id) ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                              </option>
                              @endcan
                              @endforeach
                            </select>
                          </div>

                          <div class="col-md-4">
                            <div id="luz-tarifas" class="opciones">
                              <label for="tarifa">Tarifa</label>
                              <select name="tarifa" id="tarifa" class="form-control">
                                <option value="0">tarifa</option>
                                <option value="1" class="tarifas luz-opt" {{ ($oferta->tarifa == 1) ? 'selected' : '' }}>2.0A</option>
                                <option value="2" class="tarifas luz-opt" {{ ($oferta->tarifa == 2) ? 'selected' : '' }}>2.0ADH</option>
                                <option value="3" class="tarifas luz-opt" {{ ($oferta->tarifa == 3) ? 'selected' : '' }}>2.1A</option>
                                <option value="4" class="tarifas luz-opt" {{ ($oferta->tarifa == 4) ? 'selected' : '' }}>2.1ADH</option>
                                <option value="5" class="tarifas luz-opt" {{ ($oferta->tarifa == 5) ? 'selected' : '' }}>3.0A</option>
                                <option value="6" class="tarifas luz-opt" {{ ($oferta->tarifa == 6) ? 'selected' : '' }}>3.1A</option>
                                <option value="7" class="tarifas gas-opt" {{ ($oferta->tarifa == 7) ? 'selected' : '' }}>3.1</option>
                                <option value="8" class="tarifas gas-opt" {{ ($oferta->tarifa == 8) ? 'selected' : '' }}>3.2</option>
                                <option value="9" class="tarifas gas-opt" {{ ($oferta->tarifa == 9) ? 'selected' : '' }}>3.3</option>
                                <option value="10" class="tarifas gas-opt" {{ ($oferta->tarifa == 10) ? 'selected' : '' }}>3.4</option>
                              </select>
                            </div>
                            
                            <div class="opciones telefonia-opt">
                                <label for="tarifa">Subcategoría</label>
                                <select name="subcategoriaTelefonia" id="subcategoriaTelefonia" class="form-control">
                                  <option value="1" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 1) ? 'selected' : '' }}>Internet sin Fijo</option>
                                  <option value="2" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 2) ? 'selected' : '' }}>Internet + Fijo</option>
                                  <option value="3" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 3) ? 'selected' : '' }}>Tarifa Móvil Contrato</option>
                                  <option value="4" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 4) ? 'selected' : '' }}>Internet + Fijo + TV</option>
                                  <option value="5" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 5) ? 'selected' : '' }}>Internet + Fijo + Tarifa Móvil</option>
                                  <option value="6" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 6) ? 'selected' : '' }}>Internet + Fijo + Tarifa Móvil + TV</option>
                                  <option value="7" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 7) ? 'selected' : '' }}>Tarifa Móvil Prepago</option>
                                  <option value="8" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 8) ? 'selected' : '' }}>Tarifa Móvil Prepago</option>
                                  <option value="9" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 9) ? 'selected' : '' }}>Internet + Fútbol</option>
                                  <option value="10" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 10) ? 'selected' : '' }}>Internet + Tarifa Móvil</option>
                                  <option value="11" {{ ($oferta->opcion != null && $oferta->opcion->categoria_telefonia == 11) ? 'selected' : '' }}>Solo TV</option>
                                </select>
                            </div>

                            <div class="opciones seguros-opt">
                                <label for="tarifa">Subcategoría</label>
                                <select name="subcategoria" id="seguros_sub" class="form-control">
                                  <option value="1" {{ ($oferta->subcategoria == 1) ? 'selected' : '' }}>Coche</option>
                                  <option value="2" {{ ($oferta->subcategoria == 2) ? 'selected' : '' }}>Moto</option>
                                  <option value="3" {{ ($oferta->subcategoria == 3) ? 'selected' : '' }}>Bici</option>
                                  <option value="4" {{ ($oferta->subcategoria == 4) ? 'selected' : '' }}>Hogar</option>
                                  <option value="5" {{ ($oferta->subcategoria == 5) ? 'selected' : '' }}>Viaje</option>
                                  <option value="6" {{ ($oferta->subcategoria == 6) ? 'selected' : '' }}>Salud</option>
                                  <option value="7" {{ ($oferta->subcategoria == 7) ? 'selected' : '' }}>Dental</option>
                                  <option value="8" {{ ($oferta->subcategoria == 8) ? 'selected' : '' }}>Vida</option>
                                  <option value="9" {{ ($oferta->subcategoria == 9) ? 'selected' : '' }}>Decesos</option>
                                  <option value="10" {{ ($oferta->subcategoria == 10) ? 'selected' : '' }}>Mascotas</option>
                                  <option value="11" {{ ($oferta->subcategoria == 11) ? 'selected' : '' }}>Furgonetas</option>
                                  <option value="12" {{ ($oferta->subcategoria == 12) ? 'selected' : '' }}>Autónomos</option>
                                  <option value="13" {{ ($oferta->subcategoria == 13) ? 'selected' : '' }}>Impagos</option>
                                  <option value="14" {{ ($oferta->subcategoria == 14) ? 'selected' : '' }}>Empresas</option>
                                  <option value="15" {{ ($oferta->subcategoria == 15) ? 'selected' : '' }}>Deportes</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="opciones telefonia-opt">
                            <div class="form-group row mb-4">
                              <div class="col-md-4">
                                  <label>Subtítulo</label>
                                  <input class="form-control" name="subtitulo_telefonia" type="text" placeholder="Subtítulo" value="{{$oferta->opcion != null ? $oferta->opcion->subtitulo_telefonia : '' }}">
                              </div>
                              <div class="col-md-4">
                                  <label>Precio</label>
                                  <input class="form-control" name="precio_telefonia" type="number" value="{{ $oferta->opcion != null ? number_format($oferta->opcion->precio_telefonia , 2) : '' }}" min="0" step="any">
                              </div>
                              <div class="col-md-4">
                                  <label>Móvil</label>
                                  <input class="form-control" name="movil_telefonia" type="text" value="{{ $oferta->opcion != null ? $oferta->opcion->movil_telefonia : '' }}">
                              </div>
                            </div>
  
                            <div class="form-group row mb-4">
                                <div class="col-md-4">
                                    <label>Fijo</label>
                                    <input class="form-control" name="fijo_telefonia" type="text" value="{{ $oferta->opcion != null ? $oferta->opcion->fijo_telefonia : '' }}">
                                </div>
                                <div class="col-md-4">
                                    <label>Internet</label>
                                    <input class="form-control" name="internet_telefonia" type="text" value="{{ $oferta->opcion != null ? $oferta->opcion->internet_telefonia : '' }}">
                                </div>
                                <div class="col-md-4">
                                    <label>TV</label>
                                    <input class="form-control" name="tv_telefonia" type="text" value="{{ $oferta->opcion != null ? $oferta->opcion->tv_telefonia : '' }}">
                                </div>
                              </div>
                          </div>
                        
                        <div class="opciones luz-opt">
                          <h3>Potencia</h3>
                          <div class="form-group row mb-4">
                            
                            <div class="col-md-4">
                              <label>p1</label>
                              <input class="form-control" id="pp1-luz" name="pp1" type="number" min="0" step="any" value="{{ $oferta->opcion != null ? $oferta->opcion->pp1 : '' }}">
                            </div>
                            <div class="col-md-4">
                              <label>p2</label>
                              <input class="form-control" id="pp2-luz" name="pp2" type="number" min="0" step="any" value="{{ $oferta->opcion != null ? $oferta->opcion->pp2 : '' }}">
                            </div>
                            <div class="col-md-4">
                              <label>p3</label>
                              <input class="form-control" id="pp3-luz" name="pp3" type="number" min="0" step="any" value="{{ $oferta->opcion != null ? $oferta->opcion->pp3 : '' }}">
                            </div>
                          </div>
                          <h3>Energía</h3><br>
                          <div class="form-group row">
                            
                            <div class="col-md-4">
                              <label>p1</label>
                              <input class="form-control" id="ep1-luz" name="ep1" type="number" min="0" step="any" value="{{ $oferta->opcion != null ? $oferta->opcion->ep1 : '' }}">
                            </div>
                            <div class="col-md-4">
                              <label>p2</label>
                              <input class="form-control" id="ep2-luz" name="ep2" type="number" min="0" step="any" value="{{ $oferta->opcion != null ? $oferta->opcion->ep2 : '' }}">
                            </div>
                            <div class="col-md-4">
                              <label>p3</label>
                              <input class="form-control" id="ep3-luz" name="ep3" type="number" min="0" step="any" value="{{ $oferta->opcion != null ? $oferta->opcion->ep3 : '' }}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row opciones gas-opt">
                          
                          
                          <div class="col-md-6">
                            <label>Precio KW</label>
                            <input class="form-control" name="precio_tarifa" type="number" value="{{ $oferta->opcion != null ? $oferta->opcion->precio_tarifa : '' }}" min="0" step="any">
                          </div>
                          <div class="col-md-6">
                            <label>Precio Fijo</label>
                            <input class="form-control" name="precio_fijo" type="number" value="{{ $oferta->opcion != null ? $oferta->opcion->precio_fijo : '' }}" min="0" step="any">
                          </div>
                          
                          
                        </div>

                        <div class="opciones seguros-opt precio-opt">
                        <div class="form-group row">

                        	   <div class="col-md-3">
                                <label for="precio_inicial">Precio</label>
                                <input type="number" class="form-control" step="any" id="precio_inicial" name='precio_inicial' min="0" value="{{ $oferta->precio }}">
                            </div>

                            @role('contador')
                            <div class="col-md-3">
                                <label for="porcentaje_comision">Porcentaje de comisión</label>
                                <input type="number" class="form-control" step="any" id="porcentaje_comision" name='porcentaje_comision' min="0" value="{{ $oferta->porcentaje_comision }}">
                            </div>
                            @endrole
                            
                        </div>
                        </div>
                        	
                        <div class="form-group row">
                        @role('contador')
                          <div class="col">
                            <label for="comision_real">Comisión Real</label>
                            <input type="number" step="any" class="form-control" name="comision_real" placeholder="€" id="comision_real" value="{{ $oferta->comision_real }}">
                          </div>
                        @endrole
                          <div class="col">
                            <label for="detallesoferta">Comisión</label>
                            <input type="number" step="any" class="form-control" name="comision" placeholder="€" value="{{ $oferta->comision }}">
                          </div>
                          <div class="col-md-2">
                            <label for="detallesoferta">Plan Gratis</label>
                            <input type="number" step="any" name="plan1" class="form-control" placeholder="30%" value="{{ $oferta->plan1 }}" readonly />
                          </div>
                          <div class="col-md-2">
                            <label for="detallesoferta">Plan Premium</label>
                            <input type="number" step="any" name="plan2" class="form-control" placeholder="40%" value="{{ $oferta->plan2 }}" readonly />
                          </div>
                          <div class="col-md-2">
                            <label for="detallesoferta">Plan Platinum</label>
                            <input type="number" step="any" name="plan3" class="form-control" placeholder="40%" value="{{ $oferta->plan3 }}" readonly />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="detallesoferta">Descripción</label>
                          <textarea name="descripcion" class="form-control" id="detallesoferta" cols="30" rows="4">{{ $oferta->descripcion }}</textarea>
                        </div>

                        <!-- imagenes / pdf -->
                        
                          <div class="form-group">
                            <label for="imagen_oferta">Imagen de la Oferta (listado / card)</label>
                            <input type="file" name="imagen_oferta" class="form-control" id="imagen_oferta" placeholder="Imagen">
                            <br>
                            @if($oferta->imagen_oferta != null)
                            <a target="__blank" data-fancybox="gallery" href="{{ asset('storage/ofertas/' . $oferta->id . '/' . $oferta->imagen_oferta ) }}">Ver imagen oferta</a> 
                            
                            <div class="float-right">
                              <input type="checkbox" name="del_imagen_oferta" id="del_imagen_oferta"> 
                              <label for="del_imagen_oferta"><span class="fe fe-trash-2"></span> eliminar imagen</label>
                            </div>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="imagen_oferta">Imagen de la Oferta (dentro de la oferta / flyer)</label>
                            <input type="file" name="flyer_oferta" class="form-control" id="flyer_oferta" placeholder="Imagen">
                            <br>
                            @if($oferta->flyer_oferta != null)
                            <a target="__blank" data-fancybox="gallery" href="{{ asset('storage/ofertas/' . $oferta->id . '/' . $oferta->flyer_oferta ) }}">Ver flyer oferta</a> 

                            <div class="float-right">
                              <input type="checkbox" name="del_flyer_oferta" id="del_flyer_oferta"> 
                              <label for="del_flyer_oferta"><span class="fe fe-trash-2"></span> eliminar flyer</label>
                            </div>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="pdf_oferta">Adjuntar PDF</label>
                            <input type="file" name="pdf_oferta" class="form-control" id="pdf_oferta" placeholder="PDF">
                            <br>
                             @if($oferta->pdf_oferta != null)
                            <a target="__blank" data-fancybox="gallery" href="{{ asset('storage/ofertas/' . $oferta->id . '/' . $oferta->pdf_oferta ) }}">Ver PDF</a> 

                            <div class="float-right">
                              <input type="checkbox" name="del_pdf_oferta" id="del_pdf_oferta"> 
                              <label for="del_pdf_oferta"><span class="fe fe-trash-2"></span> eliminar PDF</label>
                            </div>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="tabla_comisiones">Tabla de comisiones</label>
                            <input type="file" name="tabla_comisiones" class="form-control" id="tabla_comisiones" placeholder="Tabla de comisiones">
                            <br>
                             @if($oferta->tabla_comisiones != null)
                            <a target="__blank" data-fancybox="gallery" href="{{ asset('storage/ofertas/' . $oferta->id . '/' . $oferta->tabla_comisiones ) }}">Ver Tabla</a> 

                            <div class="float-right">
                              <input type="checkbox" name="del_tabla_comisiones" id="del_tabla_comisiones"> 
                              <label for="del_tabla_comisiones"><span class="fe fe-trash-2"></span> eliminar Tabla</label>
                            </div>
                            @endif
                          </div>
                        
                        <!-- end imagenes / pdf -->

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">
                          Guardar
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div> <!-- / .row -->
              </div>
            </form>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        // Opciones de Tarifas
        $('.tarifas').hide();
        $('.opciones').hide();

        $('#porcentaje_comision').keyup(function(){
          porcentaje = $(this).val();
          calcularPorcentaje(porcentaje);
        });

        $('#comision_real').keyup(function(){
          precioComision = $(this).val();
          calcularPorcentajePrecio(precioComision);
        });

        $('#precio_inicial').keyup(function(){
          precioInicial = $(this).val();
          calcularPorcentajeFinal(precioInicial);
        });

        function calcularPorcentajeFinal(precioInicial)
        {
          porcentajeCalculo = $('#porcentaje_comision').val();
          comisionReal = (parseFloat(porcentajeCalculo) / 100) * parseFloat(precioInicial);

          $('#comision_real').val(comisionReal);
        }

        function calcularPorcentaje(porcentaje){
          precio = $('#precio_inicial').val();
          comision = (parseFloat(porcentaje) / 100) * parseFloat(precio);

          $('#comision_real').val(comision);
        }

        function calcularPorcentajePrecio(precioComision){
          precio = $('#precio_inicial').val();

          porcentaje = (precioComision / precio) * 100;
          $('#porcentaje_comision').val(porcentaje);
        }

        categoria = $('#categorias option:selected').data('slug');

        $('#tarifa').change(function(){
            // 1 0 3
            if($(this).val() == 1 || $(this).val() == 3)
            {
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').val(0);
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').prop('readonly', true);
            }else{
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').val('');
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').prop('readonly', false);
            }
        });

        if(categoria == 'luz'){
          $('.luz-opt').show();
          $('#luz-tarifas').show();
          $('.luz-opt input').attr('required' , true);
          $('.gas-opt input').attr('required' , false);
        }else if( categoria == 'gas'){
          $('.gas-opt').show();
          $('#luz-tarifas').show();
          $('.gas-opt input').attr('required' , true);
          $('.luz-opt input').attr('required' , false);
        }else if( categoria == 'telefonia' ){
            $('.telefonia-opt').show();
            $('.gas-opt input').attr('required' , false);
            $('.luz-opt input').attr('required' , false);
          }else if( categoria == 'seguros' ){
            $('.seguros-opt').show();
            $('.gas-opt input').attr('required' , false);
            $('.luz-opt input').attr('required' , false);
          }else if( categoria == 'alarmas' || categoria == 'tarjetas' || categoria == 'prestamos' || categoria == 'renta' || categoria == 'formacion' || categoria == 'extintores' || categoria == 'prot-datos' || categoria == 'solar' || categoria == 'tarjetas' || categoria == 'financiacion' || categoria == 'contadores' || categoria == 'ascensores' || categoria == ' fincas' || categoria == 'cargadores' || categoria == 'cosmeticos' || categoria == 'agua' || categoria == 'obras'){
            $('.precio-opt').show();
            $('.gas-opt input').attr('required' , false);
            $('.luz-opt input').attr('required' , false);
          }

        $('#categorias').change(function(){

          $('.tarifas').hide();
          $('.opciones').hide();
          //$('.opciones input').val('');

          $('#tarifa').val(0);
          categoria = $('#categorias option:selected').data('slug');

          if(categoria == 'luz'){
            $('.luz-opt').show();
            $('#luz-tarifas').show();
            $('.luz-opt input').attr('required' , true);
            $('.gas-opt input').attr('required' , false);
          }else if( categoria == 'gas'){
            $('.gas-opt').show();
            $('#luz-tarifas').show();
            $('.gas-opt input').attr('required' , true);
            $('.luz-opt input').attr('required' , false);
          }else if( categoria == 'telefonia' ){
            $('.telefonia-opt').show();
            $('.gas-opt input').attr('required' , false);
            $('.luz-opt input').attr('required' , false);
          }else if( categoria == 'seguros' ){
            $('.seguros-opt').show();
            $('.gas-opt input').attr('required' , false);
            $('.luz-opt input').attr('required' , false);
          }else if( categoria == 'alarmas' || categoria == 'tarjetas' || categoria == 'prestamos' || categoria == 'renta' || categoria == 'formacion' || categoria == 'extintores' || categoria == 'prot-datos' || categoria == 'solar' || categoria == 'tarjetas' || categoria == 'financiacion' || categoria == 'contadores' || categoria == 'ascensores' || categoria == ' fincas' || categoria == 'cargadores' || categoria == 'cosmeticos' || categoria == 'agua' || categoria == 'obras'){
            $('.precio-opt').show();
            $('.gas-opt input').attr('required' , false);
            $('.luz-opt input').attr('required' , false);
          }

        });
        // Fin Opciones de Tarifas

        opcion = '<div class="row eliminar mb-4 mt-4"><div class="col" style="display:flex;align-items:center"><input type="text" name="nombreopcion[]" class="form-control" placeholder="Nombre de la Opción" value=""></div><div class="col-4" style="display:flex;align-items:center"><select name="tipoopcion[]" class="form-control"><option value="1">Texto</option><option value="2">Numérico</option></select></div><div class="col-4" style="display:flex;align-items:center"><a href="#!" class="btn btn-sm btn-white delete">Eliminar</a></div></div>';

        $('.agregar').click(function(event){
            event.preventDefault();
            $('.campos').append(opcion);
        });

        $('.campos').on('click', '.delete', function(){
            $(this).parents('.eliminar').remove();
        });
    });
</script>
@endsection