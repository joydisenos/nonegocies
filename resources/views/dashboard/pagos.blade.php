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
                  Pago a Usuarios
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
                      Pago a Usuarios
                    </h4>

                  </div>
                  <div class="col-auto">
                  <span class="fe fe-search text-muted"></span>
                  </div>
                  <div class="col">
                    <input type="search" id="buscar" class="form-control form-control-flush search" placeholder="Buscar">
                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["id-contrato","goal-project", "goal-status", "goal-progress", "goal-date"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="id-contrato">
                          Número
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="id-contrato">
                          Fecha de contrato
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-project">
                          Oferta
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-status">
                          Usuario
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-progress">
                          Email
                        </a>
                      </th>
                      
                      <th class="text-right">
                          Teléfono
                      </th>
                      <th>
                        Comision
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    
                    @foreach($contratos as $contrato)
                    <tr>
                      <td class="id-contrato">
                        {{ $contrato->id }}
                      </td>
                      <td class="id-contrato">
                        {{ $contrato->created_at->format('d/m/Y') }}
                      </td>
                      <td class="goal-project">
                        {{ title_case($contrato->oferta->nombre) }}
                      </td>
                      <td class="goal-status">
                      {{ title_case($contrato->user->name) }} {{ title_case($contrato->user->apellido) }}
                      </td>
                      <td class="goal-progress">
                        {{ $contrato->user->email }}
                      </td>
                      

                      <td class="text-right">
                        {{ $contrato->user->telefono }}
                      </td>
                      <td>
                        {{ $contrato->comision }} €
                      </td>
                      <td>
                         <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('detalles.contrato' , [$contrato->id]) }}" class="dropdown-item">
                              Detalles
                            </a>
                            <a href="{{ route('pagar.contrato' , [$contrato->id]) }}" class="dropdown-item">
                              Marcar como Pago
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach

                    @foreach($comisiones as $comision)
                    <tr>
                      <td class="id-contrato">
                        COM-{{ $comision->id }}
                      </td>
                      <td class="id-contrato">
                        {{ $comision->created_at->format('d/m/Y') }}
                      </td>
                      <td class="goal-project">
                        {{ $comision->orden_id != null ? title_case($comision->orden->oferta->nombre) : $comision->concepto }}
                      </td>
                      <td class="goal-status">
                      {{ title_case($comision->user->name) }} {{ title_case($comision->user->apellido) }}
                      </td>
                      <td class="goal-progress">
                        {{ $comision->user->email }}
                      </td>
                      

                      <td class="text-right">
                        {{ $comision->user->telefono }}
                      </td>
                      <td>
                        {{ $comision->monto }} €
                      </td>
                      <td>
                         <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            
                            <a href="{{ route('pagar.comision' , [$comision->id]) }}" class="dropdown-item">
                              Marcar como Pago
                            </a>

                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>

            </div>

          </div>
          
        </div> <!-- / .row -->
      </div>
</div>
@endsection
