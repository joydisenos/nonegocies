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
                  Empresas
                </h1>

              </div>
              <div class="col-auto">
               
                <!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearempresa">
				  Crear Empresa
				</button>

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
                      Empresas Registradas
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
                          Nombre
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-status">
                          Estatus
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-progress">
                          Descripción
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="goal-date">
                          Logo
                        </a>
                      </th>
                      
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    
                    @foreach($empresas as $empresa)
                    <tr>
                      <td class="goal-project">
                        {{ title_case($empresa->nombre) }}
                      </td>
                      <td class="goal-status">
                      	@if($empresa->estatus == 1)
                        <span class="text-success">●</span> Activo
                        @else
                        <span class="text-danger">●</span> Inactivo
                        @endif
                      </td>
                      <td class="goal-progress">
                        {{ $empresa->descripcion }}
                      </td>
                      <td class="goal-date">
                        <img src="{{ ($empresa->logo) ? asset('storage/'. $empresa->logo) : asset('img/nonegocies.png')}}" style="max-width:100px;" class="img-fluid" alt="Logo {{$empresa->nombre}}">
                      </td>
                      
                      <td class="text-right">
                        <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('editarempresa' , [$empresa->id]) }}" class="dropdown-item">
                              Editar
                            </a>

                            @if($empresa->estatus == 1)
                            <a href="{{ route('estatusempresa' , [$empresa->id , 2]) }}" class="dropdown-item">
                              Desactivar
                            </a>
                            @elseif($empresa->estatus == 2)
                            <a href="{{ route('estatusempresa' , [$empresa->id , 1]) }}" class="dropdown-item">
                              Activar
                            </a>
                            @endif

                            <a href="{{ route('estatusempresa' , [$empresa->id , 0]) }}" class="dropdown-item">
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


<!-- Modal -->
<div class="modal fade" id="crearempresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('crearempresa') }}" method="post" enctype="multipart/form-data">
      	@csrf
      	  <div class="modal-body">
        		<div class="form-group">
			    <label for="nombreempresa">Nombre</label>
			    <input type="text" name="nombre" class="form-control" id="nombreempresa" placeholder="Nombre de la empresa">
			    <small id="emailHelp" class="form-text text-muted">Nombre de la empresa</small>
			  </div>
			  <div class="form-group">
			    <label for="descripcionempresa">Descripción</label>
			    <textarea name="descripcion" class="form-control" id="descripcionempresa" cols="30" rows="10" placeholder="Descripción de la empresa (opcional)"></textarea>
			    <small id="emailHelp" class="form-text text-muted">Descripción</small>
			  </div>
			  <div class="form-group">
			    <label for="logo">Logotipo</label>
			    <input type="file" class="form-control-file" name="logo" id="logo">
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Crear</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection
