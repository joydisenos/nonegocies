@extends('layouts.logs')

@section('titulo')
Iniciar Sesión
@endsection

@section('content')
<div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">

             
          <div class="text-center mb-4">
              <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="">
          </div>

          <!--
          <h1 class="display-4 text-center mb-3">
            Iniciar Sesión
          </h1>

          <p class="text-muted text-center mb-5">
           Panel No Negocies
          </p>
          -->
          
          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                <div class="col-auto">
                  
                  <!-- Help text -->
                  <a href="password-reset.html" class="form-text small text-muted">
                    Olvido su contraseña?
                  </a>

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

           

            <!-- Submit -->
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Iniciar Sesión
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
