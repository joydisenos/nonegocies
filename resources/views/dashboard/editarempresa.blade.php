@extends('layouts.dash')

@section('header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')

<div class="main-content">
        <form action="{{ route('actualizarempresa' , [$empresa->id]) }}" enctype="multipart/form-data" method="post">
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
                  Editar Empresa {{ title_case($empresa->nombre) }}
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
                      Editar Empresa  {{ title_case($empresa->nombre) }}
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
                            <label for="nombreempresa">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombreempresa" placeholder="Nombre de la empresa" value="{{ $empresa->nombre }}">
                            <small class="form-text text-muted">Nombre de la empresa</small>
                        </div>
                    </div>

                    <div class="col">
                    <div class="form-group">
                            <label for="logoempresa">Logotipo</label>
                            <input type="file" name="logo" class="form-control" id="logoempresa" placeholder="Logotipo" value="{{ $empresa->logo }}">
                            <small class="form-text text-muted">Logotipo de la empresa</small>
                            </div>
                    </div>
                </div>

                <div class="row m-4">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="final" id="op-1" value="1">
                        <label class="form-check-label" for="op-1">
                          Opción 1
                        </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="final" id="op-2" value="2">
                        <label class="form-check-label" for="op-2">
                          Opción 2
                        </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="final" id="op-3" value="3">
                        <label class="form-check-label" for="op-3">
                          Opción 3
                        </label>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="final" id="op-4" value="4">
                        <label class="form-check-label" for="op-4">
                          Opción 4
                        </label>
                    </div>
                  </div>
                </div>


                <div class="row">
                       <div class="col">
                            <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10">{{ $empresa->descripcion }}</textarea>
                                    <small class="form-text text-muted">Descripción de la empresa</small>
                            </div>
                        </div> 
                </div>

                <div class="row">
                    <div class="col">
                        <textarea id="editor" name="contrato" cols="30" rows="10">{{ $empresa->contrato }}</textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
<script>
  $(document).ready(function(){
    $('#editor').summernote();
  });
</script>
@endsection