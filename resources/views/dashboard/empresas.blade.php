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
                  No Negocies
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
          <div class="col-12 col-xl-7">
            
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
                        {{ $empresa->logo }}
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
      <form action="{{ route('crearempresa') }}" method="post">
      	@csrf
      	  <div class="modal-body">
        		<div class="form-group">
			    <label for="nombreempresa">Nombre</label>
			    <input type="text" name="nombre" class="form-control" id="nombreempresa" placeholder="Nombre de la empresa">
			    <small id="emailHelp" class="form-text text-muted">Nombre de la empresa</small>
			  </div>
			  <div class="form-group">
			    <label for="descripcionempresa">Descripción</label>
			    <textarea name="descripcion" class="form-control" id="descripcionempresa" cols="30" rows="10" placeholder="Descripción de la empresa"></textarea>
			    <small id="emailHelp" class="form-text text-muted">Descripción</small>
			  </div>
			  <div class="form-group">
			    <label for="logotipo">Logotipo</label>
			    <input type="file" class="form-control-file" name="logo" id="logotipo">
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Registrar</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection
