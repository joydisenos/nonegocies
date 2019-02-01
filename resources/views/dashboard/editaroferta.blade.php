@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('actualizaroferta' , [$oferta->id]) }}" method="post">
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
                      Oferta {{ title_case($oferta->nombre) }}
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="form-group">
                                <label for="nombreoferta">Empresa</label>
                                <select name="empresa_id" class="form-control" required>
                                    <option value="">Seleccione una Empresa</option>
                                        @foreach($empresas as $empresa)
                                            <option value="{{ $empresa->id }}" 
                                            {{ ($oferta->empresa_id == $empresa->id) ? 'selected' : '' }}>
                                                {{ $empresa->nombre }}
                                            </option>
                                        @endforeach
                                </select>
                        </div>



                        <div class="form-group row">
                          <div class="col">
                            <label for="nombreoferta">Categoría</label>
                                  <select name="categoria_id" class="form-control" required>
                                      <option value="">Seleccione una Categoría</option>
                                          @foreach($categorias as $categoria)
                                              <option value="{{ $categoria->id }}" 
                                              {{ ($oferta->categoria_id == $categoria->id) ? 'selected' : '' }}>
                                                  {{ $categoria->nombre }}
                                              </option>
                                          @endforeach
                                  </select>
                            </div>
                            <div class="col">
                                  <label for="nombreoferta">Tipo de Oferta</label>
                                  <select name="tipo" class="form-control" required>
                                      <option value="">Seleccione una Opción</option>
                                      <option value="1"
                                      {{ ($oferta->tipo == 1) ? 'selected' : '' }}
                                      >Particular</option>
                                      <option value="2"
                                      {{ ($oferta->tipo == 2) ? 'selected' : '' }}
                                      >Empresa</option>
                                  </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="nombreoferta">Nombre de la Oferta</label>
                            <input type="text" name="nombre" class="form-control" id="nombreoferta" placeholder="Nombre de la Oferta" value="{{ $oferta->nombre }}" required>
                        </div>

                        <div class="form-group">
                            <label for="preciooferta">Precio de la oferta Anual</label>
                            <input type="number" min="0" step="0.1" name="precio" class="form-control" id="preciooferta" placeholder="Precio Anual" value="{{ $oferta->precio }}" required>
                        </div>

                        <div class="form-group">
                                <label for="detallesoferta">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="detallesoferta" cols="30" rows="10" required>{{ $oferta->descripcion }}</textarea>
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