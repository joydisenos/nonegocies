@extends('layouts.master')
@section('content')
<style>
	p{
		font-size: 13px !important;
	    color: dimgray !important;
	    line-height: 1.5 !important
	}
  .card {
      margin-bottom: 50px;
  }
</style>
<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Mis Datos</h1>
  </div>
</header>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-3">
      @include('includes.nav-panel')
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-4">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h4 class="card-header-title">
              Datos de {{ title_case(Auth::user()->name) }}
              </h4>
            </div>
            <div class="col-auto"></div>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <form action="{{ route('panel.datos') }}" method="post" id="form-datos">
                @csrf
                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                <input type="hidden" name="apellido" value="{{Auth::user()->apellido}}">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <th width="40%">Nombre:</th>
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
                          <select name="tipo" class="form-control">
                            <option value="1" {{(Auth::user()->tipo == 1)? 'selected' : ''}}>Particular</option>
                            <option value="2" {{(Auth::user()->tipo == 2)? 'selected' : ''}}>Empresa</option>
                            <option value="3" {{(Auth::user()->tipo == 3)? 'selected' : ''}}>Comunidad</option>
                            <option value="4" {{(Auth::user()->tipo == 4)? 'selected' : ''}}>Administrador</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Nueva Contraseña:
                        </td>
                        <td>
                          <div class="form-group input-group input-group-merge m-0">
                            <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Indique su contraseña nueva">
                            <div class="input-group-append">
                              <span class="input-group-text mostrar">
                                <i class="fe fe-eye"></i>
                              </span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Teléfono:
                        </td>
                        <td>
                          <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Número telefónico" value="{{ Auth::user()->telefono }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          DNI:
                        </td>
                        <td>
                          <input type="number" name="dni" class="form-control" id="dni" placeholder="DNI" value="{{ Auth::user()->dni }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Dirección:
                        </td>
                        <td>
                          <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="{{ Auth::user()->direccion }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Localidad:
                        </td>
                        <td>
                          <input type="text" name="localidad" class="form-control" id="localidad" placeholder="Localidad" value="{{ Auth::user()->localidad }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          CP
                        </td>
                        <td>
                          <input type="number" name="cp" class="form-control" id="cp" placeholder="CP" value="{{ Auth::user()->cp }}" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          CUP Servicio Gas
                        </td>
                        <td>
                          <input type="text" name="cup_gas" class="form-control" id="cup_gas" placeholder="CUP Gas" value="{{ Auth::user()->cup_gas }}">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          CUP Servicio Luz
                        </td>
                        <td>
                          <input type="text" name="cup_luz" class="form-control" id="cup_luz" placeholder="CUP Luz" value="{{ Auth::user()->cup_luz }}">
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
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header p-4">
            <div class="row align-items-center">
              <div class="col">
                <!-- Title -->
                <h4 class="card-header-title">
                Datos de Pago
                </h4>
              </div>
              <div class="col-auto">
                tu membresía se debitará cada mes de esta tarjeta.
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <th width="40%">
                    Tarjeta
                  </th>
                  <th>
                    <input type="text" class="form-control" value="{{ $tarjeta == null ? '' : $tarjeta->tarjeta }}" name="tarjeta">
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Código de Seguridad (CVV)
                    </td>
                    <td>
                      <input type="number" min="0" class="form-control" value="{{ $tarjeta == null ? '' : $tarjeta->cvv }}" name="cvv">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Vence
                    </td>
                    <td>
                      <input type="text" class="form-control" value="{{ $tarjeta == null ? '' : $tarjeta->vence }}" name="vence">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header p-4">
            <div class="row mb-2 mt-2">
              <div class="col">
                <h3>Datos de Cobro</h3>
              </div>
              <div class="col-auto">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <th width="40%">
                    Cuenta
                  </th>
                  <th>
                    <input type="text" class="form-control" value="{{ $cuenta == null ? '' : $cuenta->numero }}" name="numero">
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Titular
                    </td>
                    <td>
                      <input type="text" class="form-control" value="{{ $cuenta == null ? title_case(Auth::user()->name) : title_case($cuenta->nombre) }} {{ $cuenta == null ? title_case(Auth::user()->apellido) : title_case($cuenta->apellido) }}" name="nombre">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Banco
                    </td>
                    <td>
                      <input type="text" class="form-control" value="{{ $cuenta == null ? '' : $cuenta->banco }}" name="banco">
                    </td>
                  </tr>
                  <tr>
                    <td>
                    </td>
                    <td>
                      
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
      <a href="#!" id="actualizar" class="btn btn-sm btn-primary p-2" style="float: right;padding: 10px 20px !important;">Actualizar Datos</a>
      <br><br><br><br>
    </div>
  </div>
</div>
</form>
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
                                              <option value="3" {{(Auth::user()->tipo == 3)? 'selected' : ''}}>Comunidad</option>
                                              <option value="4" {{(Auth::user()->tipo == 4)? 'selected' : ''}}>Administrador</option>
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

<div class="modal fade" id="registrar-tarjeta" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true"> 
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header pt-3 pl-4">
          <h5 class="modal-title" id="Label">Registrar Tarjeta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
          <form action="{{ route('registrar.tarjeta') }}" method="post">
            @csrf
                <div class="modal-body p-4">
                   

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="numero">Número de Tarjeta</label>
                                <input type="text" id="numero" name="tarjeta" class="form-control" placeholder="Número de Tarjeta" required>
            
                          </div>
                        </div>
                  
                      
                          
                      <div class="form-group row">

                          <div class="col-md-6">
                              <label for="vence">Vence</label>
                              <input type="text" id="vence" name="vence" class="form-control" placeholder="Fecha de Vencimiento AAAA/MM" required>
                            </div> 

                              <div class="col-md-6">
                                <label for="cvv">Código de Seguridad (CVV)</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" placeholder="Código de 3 dígitos" required>
                              </div>

                                    
                      </div>
                
                
                
                                     
                
                                        <div class="form-group row">
                                                <button type="submit" class="btn btn-primary">
                                                        Registrar
                                                </button>
                                        </div>
  
                            
                            
                         
                        
                      
              </div>
            </form>
  
  
      </div>
    </div>
  </div>


  <div class="modal fade" id="registrar-cuenta" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true"> 
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header pt-3 pl-4">
            <h5 class="modal-title" id="Label">Registrar Tarjeta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        
            <form action="{{ route('registrar.cuenta') }}" method="post">
              @csrf
                  <div class="modal-body p-4">
                     
  
                      <div class="form-group row">
                          <div class="col-md-6">
                              <label for="numero">Número de Cuenta</label>
                                  <input type="text" id="numero" name="numero" class="form-control" placeholder="Número de Cuenta" required>
              
                            </div>

                            <div class="col-md-6">
                                <label for="banco">Banco</label>
                                    <input type="text" id="banco" name="banco" class="form-control" placeholder="Nombre del Banco" required>
                
                              </div>
                          </div>
                    
                        
                            
                        <div class="form-group row">
  
                            <div class="col-md-6">
                                <label for="nombre-cuenta">Nombre</label>
                                <input type="text" id="nombre-cuenta" name="nombre" class="form-control" placeholder="Nombre del titular" value="{{ Auth::user()->name }}" required>
                              </div> 
  
                                <div class="col-md-6">
                                  <label for="apellido-cuenta">Apellido</label>
                                  <input type="text" id="apellido-cuenta" name="apellido" class="form-control" placeholder="Apellido del titular" value="{{ Auth::user()->apellido }}" required>
                                </div>
  
                                      
                        </div>
                  
                  
                  
                                       
                  
                                          <div class="form-group row">
                                                  <button type="submit" class="btn btn-primary">
                                                          Registrar
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
      //$('#datos').modal('show');
      $('#form-datos').submit();
    });

    $('#tarjeta').click(function(e){
      e.preventDefault();
      $('#registrar-tarjeta').modal('show');
    });

    $('#cuenta').click(function(e){
      e.preventDefault();
      $('#registrar-cuenta').modal('show');
    });

  });
</script>
@endsection
