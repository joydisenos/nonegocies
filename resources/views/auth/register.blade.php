@extends('layouts.logs')

@section('titulo')
Registro
@endsection

@section('content')
<div class="container">
    @include('includes.errors')
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">

             <div class="text-center">
              <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="">
          </div>
          
          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
            Registro
          </h1>

         
          
          <!-- Subheading -->
          <p class="text-muted text-center mb-5">
           Registro de usuarios No Negocies
          </p>
          
          <!-- Form -->
          <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Nombre -->
            <div class="form-group">

              <!-- Label -->
              <label>Nombre</label>

              <!-- Input -->
              <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">

            </div>

            <!-- Apellido -->
            <div class="form-group">

              <!-- Label -->
              <label>Apellido</label>

              <!-- Input -->
              <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}">

            </div>

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" class="form-control">
                  <option value="1">Particular</option>
                  <option value="2">Empresa</option>
                </select>
        </div>


            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label>Email</label>

              <!-- Input -->
              <input type="email" class="form-control" name="email" placeholder="nombre@address.com" value="{{ old('email') }}">

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">
                      
                  <!-- Label -->
                  <label>Contraseña</label>

                </div>

              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Indique su contraseña">

                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text mostrar">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>

              </div>
            </div>

            <!-- Password Confirm -->
            <div class="form-group">

              <div class="row">
                <div class="col">
                      
                  <!-- Label -->
                  <label>Repita su Contraseña</label>

                </div>

              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input type="password" class="form-control form-control-appended pass" name="password_confirmation" placeholder="Indique su contraseña">

                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text mostrar">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>

              </div>
            </div>

           

            <!-- Submit -->
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Registrar
            </button>

            
          </form>

        </div>
      </div> <!-- / .row -->
    </div>



@endsection

@section('scripts')
<script>
$(document).ready(function () {
   $('.mostrar').click(function () {
    if ($(this).parents('.form-group').find('.pass').attr('type') === 'text') {
     $(this).parents('.form-group').find('.pass').attr('type', 'password');
    } else {
     $(this).parents('.form-group').find('.pass').attr('type', 'text');
    }
   });
  });
</script>
@endsection
