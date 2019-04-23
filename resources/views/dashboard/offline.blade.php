@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('contrato.offline') }}" method="post">
                @csrf
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
                  Crear Contrato Offline
                </h1>

              </div>
              <div class="col-auto">
               
                <!-- Button trigger modal -->
              
            
                    <button type="submit" class="btn btn-primary">
                            Crear
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
                      Crear Contrato Offline 
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

              <div class="container">
                <div class="row">
                    <div class="col">
                    	<div class="form-group">
	                		<label for="nombreusuario">Usuario</label>
	                		<select name="user" id="user" class="form-control" required>
	                			<option value="">Seleccione un Usuario</option>
	                			@foreach($usuarios as $usuario)
	                				<option value="{{ $usuario->id }}">{{ title_case($usuario->name) }} {{ title_case($usuario->apellido) }} - {{ $usuario->email }}</option>
	                			@endforeach
	                		</select>
	                	</div>
                    </div>

                    <input type="hidden" name="oferta_id" value="0">
                  <!--
                    <div class="col">
                    <div class="form-group">
                            <label for="ofertas">Ofertas</label>
                            <select name="oferta_id" id="ofertas" class="form-control ofertas">
                            	<option value="0">Nueva Oferta</option>
                            	@foreach($ofertas as $oferta)
                            		<option value="{{ $oferta->id }}">{{ title_case($oferta->nombre) }}</option>
                            	@endforeach
                            </select>
                            <small class="form-text text-muted">Seleccione la Oferta</small>
                            </div>
                    </div>
                  -->
                </div>

				<div class="ocultar">
	                <div class="row">
	                	<div class="col">
	                        
	                        <div class="form-group">
	                            <label for="nombreempresa">Empresa</label>
	                            <select name="empresa_id" id="nombreempresa" class="form-control">
	                              <option value="">Seleccione una Empresa</option>
	                              @foreach($empresas as $empresa)
	                              	<option value="{{ $empresa->id }}">{{ title_case($empresa->nombre) }}</option>
	                              @endforeach
	                            </select>
	                            <small class="form-text text-muted">Empresa</small>
	                        </div>
	                    </div>

	                	<div class="col">
	                		<div class="form-group">
		                		<label for="nombreoferta">Nombre</label>
		                		<input type="text" id="nombreoferta" name="nombre" class="form-control">
		                	</div>
	                	</div>
	                </div>

	                <div class="row">
	                	  <div class="col">
	                            <label for="tipooferta">Fecha</label>
	                            <input type="date" class="form-control" name="fecha">
	                     </div>
	                     <div class="col">
	                		<div class="form-group">
		                		<label for="precio">Precio</label>
		                		<input type="number" min="0" step="0.01" id="precio" name="precio" class="form-control">
		                	</div>
	                	</div>
	                </div>

                  <div class="form-group row">
                          <div class="col-md-3">
                            <label for="detallesoferta">Comisión</label>
                            <input type="number" step="0.01" class="form-control" name="comision" placeholder="$">
                          </div>

                          <div class="col-md-3">
                            <label for="detallesoferta">Plan Gratis</label>
                            <input type="number" step="0.01" name="plan1" class="form-control" placeholder="30%" />
                          </div>
                          <div class="col-md-3">
                            <label for="detallesoferta">Plan Premium</label>
                            <input type="number" step="0.01" name="plan2" class="form-control" placeholder="40%" />
                          </div>
                          <div class="col-md-3">
                            <label for="detallesoferta">Plan Platinum</label>
                            <input type="number" step="0.01" name="plan3" class="form-control" placeholder="40%" />
                          </div>
                        </div>

	                <div class="row">
	                	<div class="col">
	                		 <div class="form-group">
	                          <label for="detallesoferta">Detalles</label>
	                          <textarea name="descripcion" class="form-control" id="detallesoferta" cols="30" rows="10"></textarea>
	                        </div>
	                	</div>
	                </div>
				</div>

                
              </div>
                
              
            </div>

          
        </div> <!-- / .row -->
      </div>
    </form>
    </div>

@endsection
@section('scripts')
<script>
	$(document).ready(function(){
    /*
		$('.ofertas').change(function(){
			
			if($(this).val() == 0)
			{
				$('.ocultar').show();
			}else{
				$('.ocultar').hide();
			}
		});
    */
	});
</script>
@endsection