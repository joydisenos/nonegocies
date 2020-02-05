@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('contrato.offline') }}" method="post" enctype="multipart/form-data">
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
	                		<select name="user" id="user" class="form-control" data-toggle="select" required>
	                			<option value="">Seleccione un Usuario</option>
	                			@foreach($usuarios as $usuario)
	                				<option value="{{ $usuario->id }}">{{ title_case($usuario->name) }} {{ title_case($usuario->apellido) }} - {{ $usuario->email }}</option>
	                			@endforeach
	                		</select>
	                	</div>
                    </div>

                    
                  
                </div>

				<div class="ocultar">
	                <div class="row">
	                	<div class="col">
	                        
	                        <div class="form-group">
	                            <label for="nombreempresa">Empresa</label>
	                            <select name="empresa_id" id="nombreempresa" class="form-control" data-toggle="select">
	                              <option value="">Seleccione una Empresa</option>
	                              @foreach($empresas as $empresa)
	                              	<option value="{{ $empresa->id }}">{{ title_case($empresa->nombre) }}</option>
	                              @endforeach
	                            </select>
	                            <small class="form-text text-muted">Empresa</small>
	                        </div>
	                    </div>

	                	<!--<div class="col">
	                		<div class="form-group">
		                		<label for="nombreoferta">Nombre</label>
		                		<input type="text" id="nombreoferta" name="nombre" class="form-control">
		                	</div>
	                	</div>
                    -->
                    <div class="col">
                    <div class="form-group">
                            <label for="nombre">Ofertas</label>
                            <select id="nombre" name="nombre" class="form-control ofertas">
                              <option value="">Seleccione una oferta</option>
                              @foreach($ofertas as $oferta)
                              @can($oferta->categoria->slug)
                                <option value="{{ $oferta->nombre }}" data-id="{{ $oferta->id }}" data-empresa="{{$oferta->empresa_id}}" data-precio="{{$oferta->precio}}" data-comision="{{ $oferta->comision }}" >{{ title_case($oferta->nombre) }}</option>
                              @endcan
                              @endforeach
                            </select>
                            <small class="form-text text-muted">Seleccione la Oferta</small>

                            <input type="hidden" id="inputOferta" name="oferta_id" value="0">
                            </div>
                    </div>
	                </div>

	                <div class="row">
	                	  <div class="col">
	                            <label for="tipooferta">Fecha</label>
	                            <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}">
	                     </div>
	                     <div class="col">
	                		<div class="form-group">
		                		<label for="precio">Precio</label>
		                		<input type="number" min="0" step="0.01" id="precio" name="precio" class="form-control">
		                	</div>
	                	</div>
	                </div>

                  <div class="row">
                      <div class="col">
                              <label for="inputDniAn">Dni (lado frontal)</label>
                              <input type="file" class="form-control" name="dni-scan-an">
                       </div>
                       <div class="col">
                              <label for="inputDniRe">Dni (lado reverso)</label>
                              <input type="file" class="form-control" name="dni-scan-re">
                       </div>
                       <div class="col">
                              <label for="inputFactura">Factura</label>
                              <input type="file" class="form-control" name="factura-scan">
                       </div>
                  </div>



                  <input type="hidden" step="0.01" name="comision" id="inputComision">

	                <div class="row">
	                	<div class="col">
	                		 <div class="form-group">
	                          <label for="detallesobservaciones">Observaciones</label>
	                          <textarea name="observaciones" class="form-control" id="detallesobservaciones" cols="30" rows="10"></textarea>
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
<script type="text/javascript" src="{{ asset('assets/js/offline.js') }}"></script>
@endsection