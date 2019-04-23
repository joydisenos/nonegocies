@extends('layouts.dash')

@section('content')

<div class="main-content">
<form action="{{ route('storeoferta') }}" method="post">
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
            Crear Oferta
            </h1>
          </div>
          <div class="col-auto">
            
            <!-- Button trigger modal -->
            
            
            <button type="submit" class="btn btn-primary">
            Registrar
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
                      Oferta
                      </h4>
                    </div>
                    <div class="col-auto">
                    </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <br>
                        <div class="form-group">
                          <label for="nombreoferta">Nombre de la Oferta</label>
                          <input type="text" name="nombre" class="form-control" id="nombreoferta" placeholder="Nombre de la Oferta" required>
                        </div>
                        <div class="form-group">
                          <label for="nombreoferta">Empresa</label>
                          <select name="empresa_id" class="form-control" required>
                            <option value="">Seleccione una Empresa</option>
                            @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id }}">
                              {{ $empresa->nombre }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group row">
                          <div class="col">
                            <label for="nombreoferta">Categoría</label>
                            <select name="categoria_id" class="form-control" id="categorias" required>
                              <option value="">Seleccione una Categoría</option>
                              @foreach($categorias as $categoria)
                              <option value="{{ $categoria->id }}" data-slug="{{$categoria->slug}}" >
                                {{ $categoria->nombre }}
                              </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col">
                            <label for="nombreoferta">Tipo de Oferta</label>
                            <select name="tipo" class="form-control" required>
                              <option value="">Seleccione una Opción</option>
                              <option value="1">Particular</option>
                              <option value="2">Empresa</option>
                              <option value="3">Comunidad</option>
                              <option value="4">Administrador</option>
                            </select>
                          </div>
                          <div class="col">
                            <div id="luz-tarifas" class="opciones">
                              <label for="tarifa">Tarifa</label>
                              <select name="tarifa" id="tarifa" class="form-control">
                                <option value="0">tarifa</option>
                                <option value="1" class="tarifas luz-opt">2.0A</option>
                                <option value="2" class="tarifas luz-opt">2.0ADH</option>
                                <option value="3" class="tarifas luz-opt">2.1A</option>
                                <option value="4" class="tarifas luz-opt">2.1ADH</option>
                                <option value="5" class="tarifas luz-opt">3.0A</option>
                                <option value="6" class="tarifas luz-opt">3.1A</option>
                                <option value="7" class="tarifas gas-opt">3.1</option>
                                <option value="8" class="tarifas gas-opt">3.2</option>
                                <option value="9" class="tarifas gas-opt">3.3</option>
                                <option value="10" class="tarifas gas-opt">3.4</option>
                              </select>
                            </div>

                            <div class="opciones telefonia-opt">
                                <label for="tarifa">Subcategoría</label>
                                <select name="subcategoria" id="subcategoria" class="form-control">
                                  <option value="1">Internet sin Fijo</option>
                                  <option value="2">Internet + Fijo</option>
                                  <option value="3">Tarifa Móvil Contrato</option>
                                  <option value="4">Internet + Fijo + TV</option>
                                  <option value="5">Internet + Fijo + Tarifa Móvil</option>
                                  <option value="6">Internet + Fijo + Tarifa Móvil + TV</option>
                                  <option value="7">Tarifa Móvil Prepago</option>
                                  <option value="8">Tarifa Móvil Prepago</option>
                                  <option value="9">Internet + Fútbol</option>
                                  <option value="10">Internet + Tarifa Móvil</option>
                                </select>
                            </div>
                          </div>
                        </div>

                        <div class="opciones telefonia-opt">
                          <div class="form-group row mb-4">
                            <div class="col-md-4">
                                <label>Subtítulo</label>
                                <input class="form-control" name="subtitulo_telefonia" type="text" placeholder="Subtítulo">
                            </div>
                            <div class="col-md-4">
                                <label>Precio</label>
                                <input class="form-control" name="precio_telefonia" type="number" min="0" step="0.01">
                            </div>
                            <div class="col-md-4">
                                <label>Móvil</label>
                                <input class="form-control" name="movil_telefonia" type="text">
                            </div>
                          </div>

                          <div class="form-group row mb-4">
                              <div class="col-md-4">
                                  <label>Fijo</label>
                                  <input class="form-control" name="fijo_telefonia" type="text">
                              </div>
                              <div class="col-md-4">
                                  <label>Internet</label>
                                  <input class="form-control" name="internet_telefonia" type="text">
                              </div>
                              <div class="col-md-4">
                                  <label>TV</label>
                                  <input class="form-control" name="tv_telefonia" type="text">
                              </div>
                            </div>
                        </div>
                        
                        <div class="opciones luz-opt">
                          <h3>Potencia</h3>
                          <div class="form-group row mb-4">
                            
                            <div class="col-md-4">
                              <label>p1</label>
                              <input class="form-control" name="pp1" type="number" min="0" step="0.000001">
                            </div>
                            <div class="col-md-4">
                              <label>p2</label>
                              <input class="form-control" name="pp2" type="number" min="0" step="0.000001">
                            </div>
                            <div class="col-md-4">
                              <label>p3</label>
                              <input class="form-control" name="pp3" type="number" min="0" step="0.000001">
                            </div>
                          </div>
                          <h3>Energía</h3><br>
                          <div class="form-group row">
                            
                            <div class="col-md-4">
                              <label>p1</label>
                              <input class="form-control" name="ep1" type="number" min="0" step="0.000001">
                            </div>
                            <div class="col-md-4">
                              <label>p2</label>
                              <input class="form-control" name="ep2" type="number" min="0" step="0.000001">
                            </div>
                            <div class="col-md-4">
                              <label>p3</label>
                              <input class="form-control" name="ep3" type="number" min="0" step="0.000001">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row opciones gas-opt">
                          <div class="col-md-6">
                            <label>Precio Tarifa</label>
                            <input class="form-control" name="precio_tarifa" type="number" min="0" step="0.1">
                          </div>
                          <div class="col-md-6">
                            <label>Precio Fijo</label>
                            <input class="form-control" name="precio_fijo" type="number" min="0" step="0.1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-3">
                            <label for="detallesoferta">Comisión</label>
                            <input type="number" step="0.01" class="form-control" name="comision" placeholder="$">
                          </div>

                          <div class="col-md-3">
                            <label for="detallesoferta">Plan Gratis</label>
                            <input type="number" step="0.01" name="plan1" class="form-control" placeholder="30%" />
                          </div>
                          <div class="col-md-3">
                            <label for="detallesoferta">Plan Premium</label>
                            <input type="number" step="0.01" name="plan2" class="form-control" placeholder="40%" />
                          </div>
                          <div class="col-md-3">
                            <label for="detallesoferta">Plan Platinum</label>
                            <input type="number" step="0.01" name="plan3" class="form-control" placeholder="40%" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="detallesoferta">Descripción</label>
                          <textarea name="descripcion" class="form-control" id="detallesoferta" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">
                          Registrar
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
            $('.gas-opt input').attr('required' , true);
            $('.luz-opt input').attr('required' , false);
          }else if( categoria == 'telefonia' ){
            $('.telefonia-opt').show();
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