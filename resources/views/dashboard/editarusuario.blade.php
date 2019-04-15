@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('actualizarusuario' , [$usuario->id]) }}" method="post">
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
                  Actualizar Usuario {{ title_case($usuario->name) }} {{ title_case($usuario->apellido) }}
                </h1>

              </div>
              <div class="col-auto">
               
                <!-- Button trigger modal -->
              
            
                    <button type="submit" class="btn btn-primary">
                            Actualizar
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
                      Datos de Usuario
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="form-group row">
                                <div class="col-lg-4 col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" id="nombre" name="name" class="form-control" placeholder="Nombre" value="{{ $usuario->name }}" required>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                  <label for="apellido">Apellido</label>
                                  <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="{{ $usuario->apellido }}" required>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                  <label for="email">Email</label>
                                  <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $usuario->email }}" disabled>
                                </div>
                        </div>



                        <div class="form-group row">
                          <div class="col-md-6">
                              <label for="password">Contraseña</label>
                            <div class="input-group input-group-merge">

                              <!-- Input -->
                              <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Indique su contraseña nueva">
              
                              <!-- Icon -->
                              <div class="input-group-append">
                                <span class="input-group-text mostrar">
                                  <i class="fe fe-eye"></i>
                                </span>
                              </div>
              
                            </div>
                            </div>

                            <!--
                            <div class="col-md-4">
                               <label for="password_confirmation">Confirme su Contraseña</label>
                              <div class="input-group input-group-merge">
                                <input type="password" class="form-control form-control-appended pass" name="password_confirmation" placeholder="Repita su contraseña nueva">
                                <div class="input-group-append">
                                  <span class="input-group-text mostrar">
                                    <i class="fe fe-eye"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                            -->

                        <div class="col-md-6">
                          <label for="telefono">Tipo</label>
                              <select name="tipo" class="form-control">
                                <option value="1" {{($usuario->tipo == 1)? 'selected' : ''}}>Particular</option>
                                <option value="2" {{($usuario->tipo == 2)? 'selected' : ''}}>Empresa</option>
                                <option value="3" {{($usuario->tipo == 3)? 'selected' : ''}}>Comunidad</option>
                                <option value="4" {{($usuario->tipo == 4)? 'selected' : ''}}>Administrador</option>
                              </select>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-4">
                              <label for="telefono">Teléfono</label>
                              <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Número telefónico" value="{{ $usuario->telefono }}" required>
                            </div>

                            <div class="col-md-4">
                              <label for="dni">DNI</label>
                              <input type="number" name="dni" class="form-control" id="dni" placeholder="DNI" value="{{ $usuario->dni }}" required>
                            </div>

                            <div class="col-md-4">
                              <label for="localidad">Localidad</label>
                              <input type="text" name="localidad" class="form-control" id="localidad" placeholder="Localidad" value="{{ $usuario->localidad }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-8">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="{{ $usuario->direccion }}" required>
                          </div>
                          <div class="col-md-4">
                            <label for="cp">CP</label>
                            <input type="number" name="cp" class="form-control" id="cp" placeholder="CP" value="{{ $usuario->cp }}" required>
                          </div>
                        </div>

                       

                       <!-- <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        Actualizar
                                </button>
                        </div> -->
                    </div>
                </div>

                
              </div>
                
              
            </div>

            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h4 class="card-header-title">
                      Datos de Cobro
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                @foreach($usuario->tarjetas as $tarjeta)
                  <div class="row p-3">
                      <div class="col-4">

                              <h4>Tarjeta:</h4>

                      </div>
                      <div class="col">
                             <h4> {{ $tarjeta->tarjeta }}</h4>
                      </div>
                  </div>

                  <div class="row p-3">
                      <div class="col-4">

                              <h4>Código de Seguridad (CVV):</h4>

                      </div>
                      <div class="col">
                             <h4> {{ $tarjeta->cvv }}</h4>
                      </div>
                  </div>

                  <div class="row p-3">
                      <div class="col-4">

                              <h4>Vence:</h4>

                      </div>
                      <div class="col">
                             <h4> {{ $tarjeta->vence }}</h4>
                      </div>
                  </div>
                @endforeach
                
              </div>
                
              
            </div>

            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h4 class="card-header-title">
                      Datos de Pago
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                @foreach($usuario->cuentas as $cuenta)
                  <div class="row p-3">
                      <div class="col-4">

                              <h4>Número:</h4>

                      </div>
                      <div class="col">
                             <h4> {{ $cuenta->numero }}</h4>
                      </div>
                  </div>

                  <div class="row p-3">
                      <div class="col-4">

                              <h4>Titular:</h4>

                      </div>
                      <div class="col">
                             <h4> {{ title_case($cuenta->nombre) }} {{ title_case($cuenta->apellido) }}</h4>
                      </div>
                  </div>

                  <div class="row p-3">
                      <div class="col-4">

                              <h4>Banco:</h4>

                      </div>
                      <div class="col">
                             <h4> {{ $cuenta->banco }}</h4>
                      </div>
                  </div>
                @endforeach
                
              </div>
                
              
            </div>
          
        </div> <!-- / .row -->
      </div>
    </form>
    </div>

@endsection

@section('scripts')
<script>
$(document).ready(function () {
   $('.mostrar').click(function () {
    if ($(this).parents('.input-group').find('.pass').attr('type') === 'text') {
     $(this).parents('.input-group').find('.pass').attr('type', 'password');
    } else {
     $(this).parents('.input-group').find('.pass').attr('type', 'text');
    }
   });
  });
</script>
@endsection