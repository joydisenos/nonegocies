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
                  Dashboard
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button 
                <a href="#!" class="btn btn-primary">
                  Create Report
                </a>
                 -->
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
      
      <!-- CARDS -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl">
            
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Total a recaudar
                    </h6>
                    
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      {{ $totalRecaudar }} €
                    </span>

                   

                  </div>
                  <div class="col-auto">
                    
                    <!-- Icon -->
                    <span class="h2 text-muted mb-0">€</span>

                  </div>
                </div> <!-- / .row -->

              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">
            
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Número de Ofertas
                    </h6>
                    
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      {{ $ofertasNum }}
                    </span>

                  </div>
                  <div class="col-auto">
                    
                    <!-- Icon -->
                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                  </div>
                </div> <!-- / .row -->

              </div>
            </div>
              
          </div>
          <div class="col-12 col-lg-6 col-xl">
            
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Por contactar
                    </h6>

                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">

                        <!-- Heading -->
                        <span class="h2 mr-2 mb-0">
                          {{ $porContactar }}
                        </span>
                        
                      </div>
                      <div class="col">
                        
                        

                      </div>
                    </div> <!-- / .row -->

                  </div>
                  <div class="col-auto">
                    
                    <!-- Icon -->
                    <span class="h2 fe fe-clipboard text-muted mb-0"></span>

                  </div>
                </div> <!-- / .row -->

              </div>
            </div>
              
          </div>
          <div class="col-12 col-lg-6 col-xl">
            
            <!-- Card -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="card-title text-uppercase text-muted mb-2">
                      Contratos
                    </h6>
                    
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      {{ $contratosNum }}
                    </span>

                  </div>
                  <div class="col-auto">
                    
                    <!-- Icon -->
                    <span class="h2 fe fe-activity text-muted mb-0"></span>

                  </div>
                </div> <!-- / .row -->

              </div>
            </div>
              
          </div>
        </div> <!-- / .row -->
        
        
        <div class="row">
          <div class="col-12">
            
            <!-- Goals -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h4 class="card-header-title">
                      Contratos
                    </h4>

                  </div>
                  <div class="col-auto">

                    <!-- Button
                    <a href="#!" class="btn btn-sm btn-white">
                      Export
                    </a>
                     -->

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-fecha" , "goal-project", "goal-status", "goal-progress", "goal-date"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                    	<th>
                        <a href="#" class="text-muted sort" data-sort="goal-fecha">
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
                    <td class="goal-fecha">
                        {{ $contrato->created_at->format('d/m/Y') }}
                      </td>
                      <td class="goal-project">
                        {{ title_case($contrato->oferta->nombre) }}
                      </td>
                      <td class="goal-status">
                      {{ $contrato->user != null ? title_case($contrato->user->name) : ''}} {{ $contrato->user != null ? title_case($contrato->user->apellido) : ''}}
                      </td>
                      <td class="goal-progress">
                        {{ $contrato->user != null ? $contrato->user->email : '' }}
                      </td>
                      <td class="goal-date">
                        @if($contrato->oferta->categoria->slug == 'gas')
                            {{ $contrato->user != null ? $contrato->user->cup_gas : '' }}
                        @elseif($contrato->oferta->categoria->slug == 'luz')
                            {{ $contrato->user != null ? $contrato->user->cup_luz : '' }}
                        @endif
                      </td>
                      <td class="text-right">
                        {{ $contrato->user != null ? $contrato->user->telefono : ''}}
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
