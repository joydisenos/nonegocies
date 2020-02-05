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
                  Aqui podrás ver las comisiones generadas por tus usuarios referidos 
                </h1>

              </div>
              <div class="col-auto">
               
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
      
      <div class="container-fluid">
      
        </div>
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
                      Comisiones
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

                      @if($comisiones->count() == 0)
                        <h3>Aún no tienes comisiones, comparte tu link para que comiences a generar ingresos!</h3>
                      @else
                      <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date","goal-registro","goal-referidos"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-project">
                          Usuario
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-status">
                          Fecha
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-progress">
                          Concepto
                        </a>
                      </th>

                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-registro">
                          Importe
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          Estado
                        </a>
                      </th>
                      
                    </tr>
                  </thead>
                  <tbody class="list">
                    
                    @foreach($comisiones as $comision)
                    <tr>
                      <td class="goal-project">
                        {{ title_case($comision->referido->name) }} {{ title_case($comision->referido->apellido) }}
                      </td>
                      <td class="goal-status">
                       {{ $comision->created_at->format('d/m/y') }}
                      </td>
                      <td class="goal-progress">
                        {{ $comision->concepto }}
                      </td>
                      <td class="goal-registro">
                        {{ $comision->monto }}€
                      </td>
                      <td class="goal-date">
              			              @if(Carbon\Carbon::now() >= Carbon\Carbon::parse($comision->created_at)->addDays(30) && $comision->estatus == 0)
                                                   
                                    <a class="btn btn-primary p-1 pr-3 pl-3" href="{{ route('cobrar.comision' , $comision->id) }}">Cobrar</a>
                                  @else
                                    {{ $comision->verEstatus() }}
                                  @endif
                      </td>
                     
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                      </div>
                      @endif
            </div>

          </div>
          
        </div> <!-- / .row -->
      </div>
</div>
@endsection
