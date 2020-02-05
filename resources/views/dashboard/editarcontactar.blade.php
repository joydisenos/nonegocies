@extends('layouts.dash')
@section('header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')

<div class="main-content">
<form action="{{ route('actualizarcontactar' ,[$contacto->id]) }}" method="post">
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
                  <div class="col">
                    <div class="text-right">
                      <h4 class="card-header-title">Contactado</h4>
                    </div>
                  </div>
                  <div class="col-auto">

                    
                    <div class="custom-control custom-checkbox-toggle">
                      <input type="checkbox" class="custom-control-input" id="contactado" name="contactado" {{ ($contacto->contactado == 0) ? '' : 'checked' }}>
                      <label class="custom-control-label" for="contactado"></label>
                    </div>
                  

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">

                <div class="row mt-4 mb-4">
                  <div class="col text-left">
                    <h4>{{ $contacto->servicio }}</h4>
                  </div>
                  <div class="col">
                    @if($contacto->factura != null)
                      <a href="{{ asset('storage/contacto/' . $contacto->id . '/' . $contacto->factura) }}" class="btn btn-primary">ver factura</a>
                    @endif
                  </div>
                </div>

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

                
              <textarea id="notastext" name="notas">{{$contacto->notas}}</textarea>
                  

                <div class="row mt-4 mb-4">
                  <div class="col">
                    <button type="submit" class="btn btn-primary">
                      Guardar Cambios
                    </button>
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
    $('#notastext').summernote();
  });
</script>
@endsection