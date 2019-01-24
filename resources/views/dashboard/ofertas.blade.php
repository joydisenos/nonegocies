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
                  Ofertas
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button -->
                <!--<a href="#!" class="btn btn-primary">
                  Crear Usuario
                </a>-->

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
                      Ofertas Registradas
                    </h4>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <!--
                    <a href="#!" class="btn btn-sm btn-white">
                      Export
                    </a>
                    -->

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-project">
                          Nombre
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-status">
                          Empresa
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-progress">
                          Categoría
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          Precio
                        </a>
                      </th>
                      <th class="text-right">
                          Estatus
                      </th>
                       <th class="text-right">
                          Ventas
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    
                    @foreach($ofertas as $oferta)
                    <tr>
                      <td class="goal-project">
                        {{ title_case($oferta->nombre) }}
                      </td>
                      <td class="goal-status">
                        Empresa
                      </td>
                      <td class="goal-progress">
                        Categoria
                      </td>
                      <td class="goal-date">
                        
                        {{ $oferta->precio }}
                      </td>
                      <td class="text-right">
                       @if($oferta->estatus == 0)
                        <span class="text-danger">●</span> Inactivo
                        @else
                        <span class="text-success">●</span> Activo
                        @endif
                      </td>
                      <td class="text-right">
                        {{ $oferta->ventas }}
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Editar
                            </a>
                      
                            <a href="#!" class="dropdown-item">
                              Eliminar
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
