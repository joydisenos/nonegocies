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
                  Ofertas @if (isset($categoria)) de {{ title_case($categoria->nombre) }} @endif
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button -->

                
              @if (isset($categoria))
                @if($categoria->slug == 'offline')
                  <a href="{{ route('offline') }}" class="btn btn-primary">
                    Crear Oferta
                  </a>
                @else
                <a href="{{ route('crearoferta') }}" class="btn btn-primary">
                  Crear Oferta
                </a>
                @endif

              @else
                <a href="{{ route('crearoferta') }}" class="btn btn-primary">
                  Crear Oferta
                </a>
              @endif


              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
      
      <!-- CARDS -->
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            
            
			
			@if (isset($categoria))
            <!-- Listas -->
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
                  <span class="fe fe-search text-muted"></span>
                  </div>
                  <div class="col">
                    <input type="search" id="buscar" class="form-control form-control-flush search" placeholder="Buscar">
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date", "goal-img"]'>
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                       <th>
                        <a href="#" class="text-muted sort" data-sort="goal-img">
                          Imagen
                        </a>
                      </th>
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
                      <th class="text-right">
                          Tipo
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
                      <td class="goal-img">
                       <img width="50" height="auto" src="{{ asset('storage/ofertas/' . $oferta->id . '/' . $oferta->imagen_oferta ) }}" alt="" class="thumbnail" style="border-radius:6px">
                      </td>
                      <td class="goal-project">
                        {{ title_case($oferta->nombre) }}
                      </td>
                      <td class="goal-status">
                        {{ $oferta->empresa->nombre }}
                      </td>
                      <td class="goal-progress">
                        {{ $oferta->categoria->nombre }}
                      </td>
                      <td class="text-right">
                        @if($oferta->tipo == 1)
                        Particulares
                        @elseif($oferta->tipo == 2)
                        Empresas
                        @elseif($oferta->tipo == 3)
                        Comunidades
                        @else
                        Administradores
                        @endif
                      </td>
                      <td class="text-right">
                       @if($oferta->estatus == 1)
                       <span class="text-success">●</span> Activo
                        @else
                        <span class="text-danger">●</span> Inactivo
                        @endif
                      </td>
                      <td class="text-right">
                        {{ $oferta->ventasPorId($oferta->id) }}
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('editaroferta' , [$oferta->id]) }}" class="dropdown-item">
                              Editar
                            </a>

                            <a href="{{ route('duplicar.oferta' , [$oferta->id]) }}" class="dropdown-item">
                              Duplicar
                            </a>

                            @if($oferta->estatus == 1)
                            <a href="{{ route('estatusoferta' , [$oferta->id , 2]) }}" class="dropdown-item">
                              Desactivar
                            </a>
                            @elseif($oferta->estatus == 2)
                            <a href="{{ route('estatusoferta' , [$oferta->id , 1]) }}" class="dropdown-item">
                              Activar
                            </a>
                            @endif

                            <a href="{{ route('estatusoferta' , [$oferta->id , 0]) }}" class="dropdown-item">
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
            @else
            <div class="row">
	            @foreach($categorias as $categoria)
              @can($categoria->slug)
	            <div class="col-md-3">
	            	<a href="{{ route('ofertascategoria' , [$categoria->slug]) }}">
			            <div class="card">
			              <div class="card-body">
			                <div class="row align-items-center">
			                  <div class="col">

			                    <!-- Title -->
			                    <h6 class="card-title text-uppercase text-muted mb-2">
			                      {{ $categoria->nombre }}
			                    </h6>
			                    
			                    <!-- Heading -->
			                    <span class="h2 mb-0">
			                      {{ $categoria->ofertas->count() }}
			                    </span>

			                  </div>
			                  <div class="col-auto">
			                    
			                    <!-- Icon -->
			                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

			                  </div>
			                </div> <!-- / .row -->

			              </div>
			            </div>
	           		</a>
	            </div>
              @endcan
	            @endforeach
	         </div>
            @endif




          </div>
          
        </div> <!-- / .row -->
      </div>
</div>
@endsection
