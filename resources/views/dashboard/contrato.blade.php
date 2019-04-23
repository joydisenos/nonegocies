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
                  Contrato #{{ $contrato->id }}
                </h1>

              </div>
              <div class="col-auto">
                
                

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
                      Contrato #{{ $contrato->id }}
                    </h4>

                  </div>
                  
                  
                </div> <!-- / .row -->
              </div>
              
              <div class="card-body">
                <div class="container">

                  <div class="row">
                    <div class="col">
                      <h2>
                        <strong>Usuario</strong> {{ title_case($contrato->user->name) }} {{ title_case($contrato->user->apellido) }}
                      </h2>
                    </div>
                    <div class="col">
                      <h2>
                        <strong>Oferta</strong> {{ $contrato->oferta->nombre }}
                      </h2>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <h5>
                        <strong>Fecha de Contratación</strong> {{ $contrato->created_at->format('d-m-Y') }}
                      </h5>
                    </div>
                    <div class="col">
                      <strong>Comisión</strong> {{ $contrato->comision }}
                    </div>
                  </div>

                  <div class="row mt-4">
                   <div class="col">
                     <div class="text-center">
                        <h2>Detalles de Pago</h2>
                     </div>
                   </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="table-responsive">

                        <table class="table table-hover">
                          <tr>
                            <td>
                              <strong>Tarjeta</strong>
                            </td>
                            <td>
                              {{ $contrato->user->tarjeta->tarjeta }}
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <strong>CVV</strong>
                            </td>
                            <td>
                              {{ $contrato->user->tarjeta->cvv }}
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <strong>Vence</strong>
                            </td>
                            <td>
                              {{ $contrato->user->tarjeta->vence }}
                            </td>
                          </tr>
                        </table>

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <img src="{{ asset('storage/' . $contrato->dni) }}" alt="" class="img-fluid" title="dni">
                    </div>
                    <div class="col">
                      <img src="{{ asset('storage/' . $contrato->factura) }}" alt="" class="img-fluid" title="factura">
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col">
                      <p>{!! $contrato->contrato !!}</p>
                    </div>
                  </div>


                </div>  
              </div>
            </div>

          </div>
          
        </div> <!-- / .row -->
      </div>
</div>
@endsection
