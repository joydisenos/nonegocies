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
                @role('admin')
                  <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" name="admin" id="customControlAutosizing" {{ $admin == true ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customControlAutosizing">Usuario Administrador</label>
                  </div>
                  @endrole
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
                                  <input type="text" id="nombre" name="name" class="form-control" placeholder="Nombre" value="{{ $usuario->name }}" >
                                </div>

                                <div class="col-lg-4 col-md-6">
                                  <label for="apellido">Apellido</label>
                                  <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="{{ $usuario->apellido }}" >
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
                              <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Número telefónico" value="{{ $usuario->telefono }}">
                            </div>

                            <div class="col-md-4">
                              <label for="dni">DNI</label>
                              <input type="txt" name="dni" class="form-control" id="dni" placeholder="DNI" value="{{ $usuario->dni }}">
                            </div>

                            <div class="col-md-4">
                              <label for="localidad">Localidad</label>
                              <input type="text" name="localidad" class="form-control" id="localidad" placeholder="Localidad" value="{{ $usuario->localidad }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-8">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="{{ $usuario->direccion }}" >
                          </div>
                          <div class="col-md-4">
                            <label for="cp">CP</label>
                            <input type="number" name="cp" class="form-control" id="cp" placeholder="CP" value="{{ $usuario->cp }}">
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


            @role('admin')

            <div class="row">
            	<div class="col">
		            <div class="card">
		              <div class="card-header">
		                <div class="row align-items-center">
		                  <div class="col">

		                    <!-- Title -->
		                    <h4 class="card-header-title">
		                      Plan de usuario
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
		               			<select name="plan_id" id="" class="form-control">
		               				<option value="0">Gratis</option>
		               				<option value="2" @if($usuario->plan_id == 2) selected @endif>Premium</option>
		               				<option value="3" @if($usuario->plan_id == 3) selected @endif>Platinum</option>
		               			</select>
		               		</div>
		               	</div>
		               </div> 
		              </div>
		                
		              
		            </div>
            	</div>
            	<div class="col">
		            <div class="card">
		              <div class="card-header">
		                <div class="row align-items-center">
		                  <div class="col">

		                    <!-- Title -->
		                    <h4 class="card-header-title">
		                      Días de plazo
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
		               			<select name="dias_plazo" id="" class="form-control">
		               				<option value="0" @if(Auth::user()->dias_plazo == 0) selected @endif >0</option>
		               				<option value="15" @if(Auth::user()->dias_plazo == 15) selected @endif >15</option>
		               				<option value="30" @if(Auth::user()->dias_plazo == 30) selected @endif >30</option>
		               			</select>
		               		</div>
		               	</div>
		               </div> 
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
                      <div class="custom-control custom-checkbox mr-sm-2">
		                    <input type="checkbox" class="custom-control-input" name="gerente" id="customControlGerente" {{ $usuario->hasRole('gerente') ? 'checked' : '' }}>
		                    <label class="custom-control-label" for="customControlGerente">Usuario Gerente</label>
		                  </div>
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
                <div class="row">
                	@foreach($permisos as $permiso)
                	<div class="col-md-4">
                		<div class="custom-control custom-checkbox mr-sm-2">
		                    <input type="checkbox" class="custom-control-input" name="permisos[]" value="{{$permiso->name}}" id="customControl{{$permiso->name}}" {{ $usuario->can($permiso->name) == true ? 'checked' : '' }}>
		                    <label class="custom-control-label" for="customControl{{$permiso->name}}">{{$permiso->name}}</label>
		                  </div>
                	</div>
                	@endforeach
                </div>
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
            
            @endrole
            
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