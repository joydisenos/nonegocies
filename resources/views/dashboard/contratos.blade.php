@extends('layouts.dash')

<style>
  .color-Aprobado > td {
    background: lightgreen !important;
  }
  tr.color-Por.procesar td {
    background: yellow;
  }
  tr.color-Negado td{
    background: red;
  }
</style>

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
                  Contratos
                </h1>

              </div>
              <div class="col-auto">
                
                
                <a href="{{ route('offline') }}" class="btn btn-primary">
                    Crear Contrato Offline
                  </a>
                  

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
                      Registro de Contratos
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

              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["id-contrato","id-fecha","goal-project", "goal-status", "goal-progress", "goal-date","goal-estatus"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <!--<th>
                        <a href="#" class="text-muted sort" data-sort="id-contrato">
                          Número
                        </a>
                      </th>-->
                      <th>
                        <a href="#" class="text-muted sort" data-sort="id-fecha">
                          Fecha
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
                      <!--<th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          CUP
                        </a>
                      </th>-->
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-estatus">
                          estatus
                        </a>
                      </th>
                      <th class="text-right">
                          Teléfono
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    
                    @foreach($contratos as $contrato)
                    @can($contrato->oferta->categoria->slug)
                      <tr class="color-{{ $contrato->estatus() }}">
                        <!--<td class="id-contrato">
                          {{ $contrato->id }}
                        </td>-->
                        <td class="id-fecha">
                          {{ $contrato->created_at->format('Y/m/d') }}
                        </td>
                        <td class="goal-project">
                          {{ title_case($contrato->oferta->nombre) }}
                        </td>
                        <td class="goal-status">
                        {{ $contrato->user != null ? title_case($contrato->user->name): '' }} {{ $contrato->user != null ? title_case($contrato->user->apellido) : ''}}
                        </td>
                        <td class="goal-progress">
                          {{ $contrato->user != null ? $contrato->user->email : ''}}
                        </td>
                        <!--<td class="goal-date">
                          @if($contrato->oferta->categoria->slug == 'gas')
                              {{$contrato->user != null ?  $contrato->user->cup_gas : ''}}
                          @elseif($contrato->oferta->categoria->slug == 'luz')
                              {{$contrato->user != null ?  $contrato->user->cup_luz : ''}}
                          @endif
                        </td>-->
                        <td class="text-right goal-estatus">
                          {{ $contrato->estatus() }}
                        </td>
                        <td class="text-right">
                          {{ $contrato->user != null ? $contrato->user->telefono : ''}}
                        </td>
                        <td>
                           <div class="dropdown">
                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                              @role('admin')
                              <a href="{{ route('detalles.contrato' , [$contrato->id]) }}" class="dropdown-item">
                                Detalles
                              </a>
                              <a href="{{ route('aprobar.contrato' , [$contrato->id]) }}" class="dropdown-item">
                                Aprobar
                              </a>
                              <a href="{{ route('negar.contrato' , [$contrato->id]) }}" class="dropdown-item">
                                Negar
                              </a>
                              @else
                                @if(Auth::user()->plan_id == 3)
                                <a href="{{ route('panel.detalles.contrato' , [$contrato->id]) }}" class="dropdown-item">
                                  Detalles
                                </a>
                                @endif
                              @endrole
                      
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endcan
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
