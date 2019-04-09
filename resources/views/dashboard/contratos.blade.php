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
                  Contratos
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
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
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
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          CUP
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
                    <tr>
                      <td class="goal-project">
                        {{ title_case($contrato->oferta->nombre) }}
                      </td>
                      <td class="goal-status">
                      {{ title_case($contrato->user->name) }} {{ title_case($contrato->user->apellido) }}
                      </td>
                      <td class="goal-progress">
                        {{ $contrato->user->email }}
                      </td>
                      <td class="goal-date">
                        @if($contrato->oferta->categoria->slug == 'gas')
                            {{ $contrato->user->cup_gas }}
                        @elseif($contrato->oferta->categoria->slug == 'luz')
                            {{ $contrato->user->cup_luz }}
                        @endif
                      </td>
                      <td class="text-right">
                        {{ $contrato->user->telefono }}
                      </td>
                      <td></td>
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
