@extends('layouts.master')
@section('content')
<style>
	p{
		font-size: 13px !important;
	    color: dimgray !important;
	    line-height: 1.5 !important
	}
</style>
<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Configuración</h1>
  <p class="animated fadeInDown">Bienvenido {{ title_case(Auth::user()->name) }}, Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
	</div>
</header>

<div class="container">

  <div class="row mt-4">
    <div class="col-md-4">
      @include('includes.nav-panel')
    </div>
    <div class="col-md-8">
    <div class="card">
              <div class="card-header p-4">
                
              <div class="row align-items-center">
                  <div class="col">
                
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Datos de {{ title_case(Auth::user()->name) }}
                    </h4>

                  </div>

                  
                  
                  <div class="col-auto">
                    <a href="#!" id="actualizar" class="btn btn-sm btn-block btn-primary p-2">
                      Actualizar Datos
                    </a>
                  </div>
                  
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
                            <tr>
                              <td>
                                Plan activo:
                              </td>
                              <td>
                                @if(Auth::user()->plan_id == null)
                                Gratis
                                @elseif(Auth::user()->plan_id == 2)
                                Premium
                                @elseif(Auth::user()->plan_id == 3)
                                Platinum
                                @endif
                              <a href="{{ route('planes') }}">cambiar plan</a>
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
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="datos" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header pt-3 pl-4">
        <h5 class="modal-title" id="Label">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
        <form action="{{ route('panel.datos') }}" method="post">
          @csrf
              <div class="modal-body p-4">
                 
                        
                                      <div class="form-group row">
                                              <div class="col-md-6">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" id="nombre" name="name" class="form-control" placeholder="Nombre" value="{{ Auth::user()->name }}" required>
                                              </div>
              
                                              <div class="col-md-6">
                                                <label for="apellido">Apellido</label>
                                                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="{{ Auth::user()->apellido }}" required>
                                              </div>
              
                                              
                                      </div>
              
              
              
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="password">Contraseña</label>
                                          <div class="input-group input-group-merge">
              
                                          
                                            <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Indique su contraseña nueva">
                            
                                      
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

  });
</script>
@endsection
