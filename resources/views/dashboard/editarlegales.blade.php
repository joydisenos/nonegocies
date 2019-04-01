@extends('layouts.dash')

@section('header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')

<div class="main-content">
        <form action="{{ route('actualizarlegal' , $tabla) }}" method="post">
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
                  Editar {{$tabla}}
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
                      Editar {{$tabla}}
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
        
            <div class="row">
              <div class="col">
                  <textarea class="form-control" id="editor" name="contenido" cols="30" rows="10">{{$legal}}</textarea> 
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