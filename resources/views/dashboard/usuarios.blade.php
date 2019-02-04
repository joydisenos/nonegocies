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
                  Usuarios
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button -->
                <a href="{{ route('crearusuario') }}" class="btn btn-primary">
                  Crear Usuario
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
                      Usuarios Registrados
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
                          Localidad
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-progress">
                          Email
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          Plan
                        </a>
                      </th>
                      <th class="text-right">
                          Teléfono
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    
                    @foreach($usuarios as $usuario)
                    <tr>
                      <td class="goal-project">
                        {{ title_case($usuario->name) }} {{ title_case($usuario->apellido) }}
                      </td>
                      <td class="goal-status">
                        {{ ($usuario->localidad)? title_case($usuario->localidad) : 'No Registrado' }}
                      </td>
                      <td class="goal-progress">
                        {{ $usuario->email }}
                      </td>
                      <td class="goal-date">
                        {{ ($usuario->plan_id) ? $usuario->plan_id : 'Inicial' }}
                      </td>
                      <td class="text-right">
                        {{ ($usuario->telefono) ? $usuario->telefono : 'No Registrado'}}
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('modificarusuario' , [$usuario->id]) }}" class="dropdown-item">
                              Editar
                            </a>
                      
                            <a href="{{ route('eliminarusuario' , [$usuario->id]) }}" class="dropdown-item">
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
