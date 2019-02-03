@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('actualizarcategoria' , [$categoria->id]) }}" method="post">
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
                  Editar {{ title_case($categoria->nombre) }}
                </h1>

              </div>
              <div class="col-auto">
               
                <!-- Button trigger modal -->
              
            
                    <button type="submit" class="btn btn-primary">
                            Guardar Cambios
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
                      Editar  {{ title_case($categoria->nombre) }}
                    </h4>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <!--
                    <a href="#!" class="btn btn-sm btn-white">
                      Export
                    </a>
                    -->

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="form-group">
                            <label for="nombrecategoria">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombrecategoria" placeholder="Nombre de la categoría" value="{{ $categoria->nombre }}">
                            <small class="form-text text-muted">Nombre de la categoría</small>
                        </div>
                    </div>
                </div>

                
              </div>
                
              
            </div>

            <!--
            <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col">
      
                         
                          <h4 class="card-header-title">
                            Campos Especiales para  {{ title_case($categoria->nombre) }}
                          </h4>
      
                        </div>
                        <div class="col-auto">
      
                          
                          <a href="#" class="btn btn-sm btn-white agregar">
                            Agregar campo especial
                          </a>
                         
      
                        </div>
                      </div> 
                    </div>
      
                    <div class="container">
                      
                        <div class="campos">
                            @foreach($categoria->campos as $campo)
                            <div class="row eliminar mb-4 mt-4">
                                <div class="col" style="display:flex;align-items:center">
                                        <input type="text" name="nombreopcion[]" class="form-control" placeholder="Nombre de la Opción" value="{{ $campo->nombre }}">
                                    
                                </div>

                                <div class="col-4" style="display:flex;align-items:center">
                                <select name="tipoopcion[]" class="form-control" value="{{ $campo->tipo }}">
                                            <option value="1" {{ ($campo->tipo == 1) ? 'selected' : '' }}>Texto</option>
                                            <option value="2" {{ ($campo->tipo == 2) ? 'selected' : '' }}>Numérico</option>
                                        </select>
                                    </div>

                                <div class="col-4" style="display:flex;align-items:center">
                                    <a href="#!" class="btn btn-sm btn-white delete">Eliminar</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                      
                    </div>
                      
                    
                  </div>

          </div>
        -->


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