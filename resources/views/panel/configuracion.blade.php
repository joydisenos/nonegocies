@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('/css/user.css')}}">
@endsection
@section('content')

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
                   
                    <tbody>
                      <tr>
                        <td width="40%">Nombre:</td>
                        <td>{{ title_case(Auth::user()->name) }} {{ title_case(Auth::user()->apellido) }}</td>
                      </tr>
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
                          <input type="text" name="dni" class="form-control" id="dni" placeholder="DNI" value="{{ Auth::user()->dni }}" required>
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
                          <input type="text" name="cup_gas" class="form-control cups-datos" id="cup_gas" placeholder="CUP Gas" value="{{ Auth::user()->cup_gas }}">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          CUP Servicio Luz
                        </td>
                        <td>
                          <input type="text" name="cup_luz" class="form-control cups-datos" id="cup_luz" placeholder="CUP Luz" value="{{ Auth::user()->cup_luz }}">
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
                Tu plan se debitará cada mes de esta tarjeta.
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                  <tr>
                  <td width="40%">
                    Tarjeta
                  </td>
                  <td>
                    <input type="text" class="form-control" value="{{ $tarjeta == null ? '' : $tarjeta->tarjeta }}" name="tarjeta">
                  </td>
                </tr>
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
            <div class="row align-items-center">
              <div class="col">
                <!-- Title -->
                <h4 class="card-header-title">
                Datos de Cobro
                </h4>
              </div>
              <div class="col-auto">
                Necesitamos tu cuenta para pagarte.
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                   <tr>
                  <td width="40%">
                    Cuenta
                  </td>
                  <td>
                    <input type="text" class="form-control" value="{{ $cuenta == null ? '' : $cuenta->numero }}" name="numero">
                  </td>
                  </tr>
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
@endsection
@section('scripts')
<script>
  $(document).ready(function(){

    $('#actualizar').click(function(e){
      e.preventDefault();
      //$('#datos').modal('show');
      $('#form-datos').submit();
    });

    /*
    $('#tarjeta').click(function(e){
      e.preventDefault();
      $('#registrar-tarjeta').modal('show');
    });

    $('#cuenta').click(function(e){
      e.preventDefault();
      $('#registrar-cuenta').modal('show');
    });
    */

    $('.cups-datos').change(function() {
        if ($(this).val() != '') {

          
              res = valida_cups($(this).val());

              if (!res.success) {
              alert(res.msg);
              }
          }
        });


// Validar Cups

function valida_cups(CUPS){

  RegExPattern =/^[a-zA-Z]{2}[0-9]{16}[a-zA-Z]{2}([0-9][A-Za-z])?$/;

  if (CUPS.length>22) {
  return {success: false, code: 1, msg:'Demasiado largo' }; //Demasiado largo
  }

  if (CUPS.length<20) {
  return {success: false, code: 2, msg:'Demasiado corto' }; //Demasiado corto
  }

  if (!CUPS.match(RegExPattern)) {
  return {success: false, code: 3, msg:'Estructura no válida' }; //Estructura no válida
  }

  CUPS_16 = parseInt(CUPS.substr(2,16));
  control = CUPS.substr(18,2).toUpperCase();
  letters = Array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');

  R0 = CUPS_16 % 529;
  cont_C = Math.floor(R0/23);
  cont_R = R0 % 23;

  dc1 = letters[cont_C];
  dc2 = letters[cont_R];
  status = (control === dc1+dc2);

      if(!status){
        return {
        success: false, code: 4, msg:'Dígitos de control no válidos, se esperaba ' + dc1 + dc2 
        }; //Los dígitos de control no son válidos
      }else{
        return {
        success: true
        };
      }
  
  }


      
     

  });
</script>
@endsection
