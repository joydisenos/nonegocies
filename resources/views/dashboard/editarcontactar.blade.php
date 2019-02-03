@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="" method="post">
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
                  Contactar {{ title_case($contacto->nombre) }} {{ title_case($contacto->apellido) }}
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
                      Contactar {{ title_case($contacto->nombre) }} {{ title_case($contacto->apellido) }}
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
                    <div class="col-md-4">
                        
                        <div class="form-group">
                            <label for="nombrecontacto">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombrecontacto" placeholder="Nombre del contacto" value="{{ $contacto->nombre }} {{ $contacto->apellido }}" disabled>
                            <small class="form-text text-muted">Nombre del contacto</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                      <div class="form-group">
                          <label for="telefonocontacto">teléfono</label>
                          <input type="text" name="telefono" class="form-control" id="telefonocontacto" placeholder="Teléfono del contacto" value="{{ $contacto->telefono }}" disabled>
                          <small class="form-text text-muted">Teléfono del contacto</small>
                      </div>
                    </div>

                    <div class="col-md-4">
                        
                    <div class="form-group">
                        <label for="emailcontacto">Email</label>
                        <input type="text" name="email" class="form-control" id="emailcontacto" placeholder="Nombre del contacto" value="{{ $contacto->email }}" disabled>
                        <small class="form-text text-muted">Email del contacto</small>
                    </div>
                </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div data-toggle="quill" data-quill-placeholder="Notas" name="notas"></div>
                  </div>
                </div>

                
              </div>
                
              
            </div>


        </div> <!-- / .row -->
      </div>
    </form>
    </div>

@endsection