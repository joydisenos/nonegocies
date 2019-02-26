@extends('layouts.dash')

@section('content')
<div class="main-content">
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
                  Configuración
                </h1>

              </div>
              <div class="col-auto">
                
                
                <a href="#!" id="actualizar" class="btn btn-primary">
                  Actualizar Datos
                </a>
                 
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
      
      <!-- CARDS -->
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12 col-xl-8">
            
            <!-- Orders -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Datos de {{ title_case(Auth::user()->name) }}
                    </h4>

                  </div>

                  <!--
                  <div class="col-auto mr--3">
                    <span class="text-muted">
                      Show affiliate:
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="custom-control custom-checkbox-toggle">
                      <input type="checkbox" class="custom-control-input" id="cardToggle">
                      <label class="custom-control-label" for="cardToggle"></label>
                    </div>
                  </div>
                  -->
                </div> <!-- / .row -->

              </div>
              <div class="card-body">
                
              <div class="row align-items-center">
                  <div class="col">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <th>Nombre:</th>
                          <th>{{ title_case(Auth::user()->name) }} {{ title_case(Auth::user()->apellido) }}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    {{ Auth::user()->email }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tipo de Usuario:
                                </td>
                                <td>
                                    @if(Auth::user()->tipo == 1)
                                    Particular
                                    @elseif(Auth::user()->tipo == 2)
                                    Empresa
                                    @elseif(Auth::user()->tipo == 3)
                                    Comunidad
                                    @elseif(Auth::user()->tipo == 4)
                                    Administrador
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Teléfono:
                                </td>
                                <td>
                                    {{ Auth::user()->telefono }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    DNI:
                                </td>
                                <td>
                                    {{ Auth::user()->dni }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dirección:
                                </td>
                                <td>
                                    {{ Auth::user()->direccion }}
                                </td>
                            </tr>
                            <tr>    
                                <td>
                                    Localidad:
                                </td>
                                <td>
                                    {{ Auth::user()->localidad }}
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- / .row -->

              </div>
            </div>

          </div>
          <div class="col-12 col-xl-4">

            <!-- Devices -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Plan Activo
                    </h4>

                  </div>
                  <div class="col-auto">
                   
                  @if (Auth::user()->plan_id == null)
                    Gratis
                    @elseif (Auth::user()->plan_id == 2)
                    Premium
                    @elseif (Auth::user()->plan_id == 3)
                    Platinum
                    @endif
                    

                  </div>
                </div> <!-- / .row -->

              </div>
              <div class="card-body">
                
                @if (Auth::user()->plan_id == null)
                    <img src="{{ asset('svg/free.svg') }}" alt="free" class="plan-img" />
                    @elseif (Auth::user()->plan_id == 2)
                    <img src="{{ asset('svg/premium.svg') }}" alt="free" class="plan-img" />
                    @elseif (Auth::user()->plan_id == 3)
                    <img src="{{ asset('svg/platinum.svg') }}" alt="free" class="plan-img" />
                    @endif

              </div>
            </div>
            
          </div>
        </div> <!-- / .row -->
        
      </div>
</div>


<!-- Modal -->
<div class="modal fade" id="datos" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <form action="{{ route('panel.datos') }}" method="post">
      @csrf
          <div class="modal-body">
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
                                          <input type="text" id="nombre" name="name" class="form-control" placeholder="Nombre" value="{{ Auth::user()->name }}" required>
                                        </div>
        
                                        <div class="col-lg-4 col-md-6">
                                          <label for="apellido">Apellido</label>
                                          <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="{{ Auth::user()->apellido }}" required>
                                        </div>
        
                                        <div class="col-lg-4 col-md-12">
                                          <label for="email">Email</label>
                                          <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
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
                                    
        
                                <div class="col-md-6">
                                  <label for="telefono">Tipo</label>
                                      <select name="tipo" class="form-control">
                                        <option value="1" {{(Auth::user()->tipo == 1)? 'selected' : ''}}>Particular</option>
                                        <option value="2" {{(Auth::user()->tipo == 2)? 'selected' : ''}}>Empresa</option>
                                        <option value="3" {{(Auth::user()->tipo == 2)? 'selected' : ''}}>Comunidad</option>
                                        <option value="4" {{(Auth::user()->tipo == 2)? 'selected' : ''}}>Administrador</option>
                                      </select>
                                </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-4">
                                      <label for="telefono">Teléfono</label>
                                      <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Número telefónico" value="{{ Auth::user()->telefono }}" required>
                                    </div>
        
                                    <div class="col-md-4">
                                      <label for="dni">DNI</label>
                                      <input type="number" name="dni" class="form-control" id="dni" placeholder="DNI" value="{{ Auth::user()->dni }}" required>
                                    </div>
        
                                    <div class="col-md-4">
                                      <label for="localidad">Localidad</label>
                                      <input type="text" name="localidad" class="form-control" id="localidad" placeholder="Localidad" value="{{ Auth::user()->localidad }}" required>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                  <div class="col-md-8">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="{{ Auth::user()->direccion }}" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="cp">CP</label>
                                    <input type="number" name="cp" class="form-control" id="cp" placeholder="CP" value="{{ Auth::user()->cp }}" required>
                                  </div>
                                </div>
        
                               
        
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                                Actualizar
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
  </div>
</div>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){

    $('#actualizar').click(function(e){
      e.preventDefault();
      $('#datos').modal('show');
    });

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
