@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/ofertas.css')}}">
<style> 
	/*fix el precio que aparecia duplicado*/
	.card__info > .price {display: none;}
	.red {color: red !important;}
</style>
@endsection
@section('content')
<header class="page">
	<div class="container">
   		<h2 class="center wow blue animated fadeIn text-center">Ofertas de {{ title_case($categoria->nombre) }}</h2>
    	<p class="center">El Precio aproximado de cada oferta corresponde a lo que pagarias si tuvieras los mismos consumos que ingresaste previamente en el comparador de {{ title_case($categoria->nombre) }}</p>
    </div>
</header>

<section class="resultados" id="resultados">
	<div class="container">

		<div class="row mb-4">
		<div class="col-9 text-right">
		</div>
		<div class="col-3">

				<form action="{{ route('consultar.gas.get') }}" id="ordenarOfertas" method="get">
					@csrf
					<input type="hidden" value="{{ $_GET['servicio'] }}" name="servicio">
					<input type="hidden" value="{{ $_GET['monto'] }}" name="monto">
					<input type="hidden" value="{{ $_GET['persona'] }}" name="persona">
					<input type="hidden" value="{{ $_GET['tarifa'] }}" name="tarifa">
					<input type="hidden" value="{{ $_GET['precio_tarifa'] }}" name="precio_tarifa">
					<input type="hidden" value="{{ $_GET['precio_fijo'] }}" name="precio_fijo">
					<input type="hidden" value="{{ $_GET['desde'] }}" name="desde">
					<input type="hidden" value="{{ $_GET['hasta'] }}" name="hasta">
					<select class="categorias form-control" name="order">
								<option>Ordenar resultados por ▼</option>
								<option value="promedio" {{ isset($_GET['order']) && $_GET['order'] == 'promedio'? 'selected' : '' }}>Recomendado</option>
								<option value="totalgeneral" {{ isset($_GET['order']) && $_GET['order'] == 'totalgeneral'? 'selected' : '' }}>Precio</option>
								<option value="comision" {{ isset($_GET['order']) && $_GET['order'] == 'comision'? 'selected' : '' }}>Comisión</option>
					</select>
				</form>

		</div>
	</div>

	<div class="row">
		
		<div class="col center">
			
			<div class="results">
			    @if($ofertas->count() == 0)
			        <h3>No encontramos ofertas</h3>
			    @endif



				@foreach($ofertas->chunk(3) as $row)
				<div class="row mb-4">
					@foreach($row as $oferta)
					<div class="col-md-4 filtrar cat-{{ $oferta->opcion != null ? $oferta->opcion->categoria_telefonia : ''}} grid-oferta">

						@component('components.card')
						@slot('oferta' , $oferta)	
						@slot('contenido')
							
								<div class="row-card">
								
								<span class="item-left">Precio aproximado:</span>
								<span class="item-right price-small">{{ number_format( ( ( $kw * $oferta->precio_tarifa) + ($oferta->precio_fijo * $dias) ) * 1.21 , 2 ) }} €</span>
								</div>
								<div class="row-card">
								<span  class="item-left">Ahorras al año:</span>

								<span class="item-right {{ ( ( ($precio - $oferta->totalgeneral) / $dias) * 365) < 0 ? 'red' : 'green-price' }}">{{ number_format( ( ( ($precio - $oferta->totalgeneral) / $dias) * 365) , 2 , ',' , '.')  }} €</span>

								</div>
								<div class="row-card">
								@guest
								
								<span>{{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan1 / 100); ?></span>
								<hr>
								@else
									@if(Auth::user()->plan_id == null)
									<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt"> -->
									<span >Ganas desde: </span><span class="item-right green-txt">{{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
									<?php $comision = $oferta->comision * ($oferta->plan1 / 100);  ?></span>
									</div>
									@elseif(Auth::user()->plan_id == 2)
									<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt"> -->
									<span class="item-left">Ganas desde: </span><span class="item-right">{{ number_format( ($oferta->comision * ($oferta->plan2 / 100)) , 2 , ',' , '.') }} €
									<?php $comision = $oferta->comision * ($oferta->plan2 / 100);  ?></span>
									</div>
									@elseif(Auth::user()->plan_id == 3)
									<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt"> -->
									<span class="item-left">Ganas desde: </span><span class="item-right">{{ number_format( ($oferta->comision * ($oferta->plan3 / 100)) , 2 , ',' , '.') }} €
									<?php $comision = $oferta->comision * ($oferta->plan3 / 100);  ?></span>
									</div>
									@endif
								@endguest
						
								<div class="text-center ver-offerta-btn">
										<button href="#form-contactar" class="btn btn-white step btn-contratar" 

											data-id="{{ $oferta->ofertaid }}"
											data-titulo="{{ title_case($oferta->titulo) }}"
											data-descripcion="{{ $oferta->descripcion }}"
											data-comision="{{ $comision }}"
											data-total="{{ number_format( ($oferta->precio_fijo) , 2 , ',' , '.') }}"
											data-contrato="{{ $oferta->contrato($oferta->empresa->contrato) }}"
											data-kw = "{{ $oferta->precio_tarifa }}"
											data-aproximado = "{{ number_format( ( ( $kw * $oferta->precio_tarifa) + ($oferta->precio_fijo * $dias) ) * 1.21 , 2 ) }}"
											data-ahorro="{{ number_format( ( ( ($precio - $oferta->totalgeneral) / $dias) * 365) , 2 , ',' , '.')  }}"
											data-imagen="{{ $oferta->imagen_oferta == null ? asset('img/hero.jpg') : asset('storage/ofertas/' . $oferta->ofertaid . '/' . $oferta->imagen_oferta) }}"
											data-flyer="{{ $oferta->flyer_oferta == null? 'na' : asset('storage/ofertas/' . $oferta->ofertaid . '/' . $oferta->flyer_oferta) }}"
											data-pdf="{{ $oferta->pdf_oferta == null? 'na' : asset('storage/ofertas/' . $oferta->ofertaid . '/' . $oferta->pdf_oferta) }}"
											data-tabla="{{ $oferta->tabla_comisiones == null? 'na' : asset('storage/ofertas/' . $oferta->ofertaid . '/' . $oferta->tabla_comisiones) }}"
											data-plan1="{{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }}"
											data-plan2="{{ number_format( ($oferta->comision * ($oferta->plan2 / 100)) , 2 , ',' , '.') }}"
											data-plan3="{{ number_format( ($oferta->comision * ($oferta->plan3 / 100)) , 2 , ',' , '.') }}"


											>Ver Oferta</button>
								</div>
						@endslot
						@endcomponent
					</div>
					@endforeach
				</div>
				@endforeach
	</div>
			
		</div>
		
		</div>
	</div>
</section>

<section class="oculto detalles-oferta" id="luz-oferta">

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<!-- imagen flyer -->
				<img src="https://via.placeholder.com/550x320.png" id="flyer_ofertas" class="img-fluid" alt="flyer">
				<br>
				<a href="#" data-fancybox='gallery' class="btn btn-primary p-1" id="btn-pdf" target="_blank">Ver PDF</a>

				<!-- condicional si existe el tabla de comisiones adjunto: -->
				<a href="#" data-fancybox='gallery' class="btn btn-primary p-1" id="btn-comisiones" target="_blank">Ver Tabla</a>
				<!-- end condicional -->
			</div>
			<div class="col-md-6 card card-body">
				<h3 id="titulo" class="left-title"></h3>
				<p id="descripcion"></p>
				<br>
				<div class="resumen">
					<span class="precio-title">Factura aproximada segun su consumo:</span>
					<span class="price float-right"><span id="precio"></span>€</span>
					<hr>
					<span class="precio-title">Precio Potencia:</span>
					<span class="price float-right"><span id="potencia"></span>€</span>
					<hr>
					<span class="precio-title">Precio kw:</span>
					<span class="price float-right"><span id="consumo"></span>€</span>
					<hr>

					@if( Auth::user()->plan_id == 3 ) <!-- si es plan Platinum -->

					<span class="precio-title">Con tu plan de usuario Platinum ganas:</span>
					<span class="price float-right"><span id="comision"></span>€</span>
						<br>

					@else <!-- si no -->

						<span class="precio-title">Con tu plan de usuario 
							@if( Auth::user()->plan_id == NULL )
	                			Gratuito
				            @elseif( Auth::user()->plan_id == 1 )
				                Premium
				            @elseif( Auth::user()->plan_id == 2 )
				                Platinum
				            @endif ganas:
				        </span>
					
						<span class="price float-right"><span id="comision"></span>€</span>
						<br>

						<a class="loadModalHelp" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i>i</i> Sube de plan y gana más en cada oferta !</a>

						<div class="collapse" id="collapseExample">
						  <div class="info-table">
						    	@if( Auth::user()->plan_id == NULL ) <!-- si es gratis -->
	                			<br>
								<span class="precio-title">Con Plan Premium ganarias:</span>
								<span class="price float-right"><span id="Premium-price"></span>€</span>
								<hr>
								<span class="precio-title">Con Plan Platinum ganarias:</span>
								<span class="price float-right"><span id="Platinum-price"></span>€</span>

			            		@elseif( Auth::user()->plan_id == 2 ) <!-- si es premium -->
			                
			        			<span class="precio-title">Con Plan Platinum ganarias:</span>
								<span class="price float-right"><span id="Platinum-price"></span>€</span>
			                
			            		@endif
			            		<br><br>
			            		<a href="/planes">Quiero cambiar de plan!</a>
						  </div>
						</div>

					@endif

					<hr>
					<span class="precio-title">Contratando esta oferta ahorras al año:</span>
					<span class="price float-right"><span id="ahorras"></span>€</span>
				</div>
				<br>
				<div class="actions">
					<a href="#" class="btn btn-primary p-1 comeback">&larr; Volver a las ofertas</a>
					<a href="#data-required" id="showmetheform" class="btn btn-primary p-1 contratar">Contratar esta oferta</a>
				</div>
			</div>
			<br>
			@guest
			@else
			<form action="{{ route('contratar.oferta') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="oferta_id" value="" id="oferta_id">
				<input type="hidden" name="comision" value="" id="comision_input">
				<br>
				<br>
				
				<div class="datos-requeridos hidden" id="data-required">
				
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
								<td colspan="2"><h3 class="left-title">Datos Requeridos para contratar</h3></td>
							</tr>
							<tr>
								<td width="40%">DNI Escaneado(cara frontal)</td>
								<td>
									<input type="file" name="dni-scan-an" value="" class="form-control" required>
								</td>
							</tr>

							<tr>
								<td width="40%">DNI Escaneado(cara trasera)</td>
								<td>
									<input type="file" name="dni-scan-re" value="" class="form-control" required>
								</td>
							</tr>

							<tr>
								<td width="40%">Factura Escaneada</td>
								<td>
									<input type="file" name="factura-scan" value="" class="form-control" required>
								</td>
							</tr>

							<tr>
								<td colspan="2"><h3 class="left-title">Datos para la domiciliación del suministro</h3></td>
							</tr>

							<tr>
								<td width="40%">Nombres (titular de la cuenta)</td>
								<td>
									<input type="text" name="nombre" value="{{ Auth::user()->cuenta != null ? Auth::user()->cuenta->nombre : '' }}" class="form-control" required>
								</td>
							</tr>

							<tr>
								<td width="40%">Apellidos (titular de la cuenta)</td>
								<td>
									<input type="text" name="apellido" value="{{ Auth::user()->cuenta != null ? Auth::user()->cuenta->apellido : '' }}" class="form-control" required>
								</td>
							</tr>

								@if(Auth::user()->telefono == null)
							<tr>
								<td width="40%">Teléfono</td>
								<td>
									<input type="text" name="telefono" value="" class="form-control" required>
								</td>
							</tr>
							@endif
							

							<tr>
								<td width="40%">Número de Cuenta</td>
								<td>
									<input type="text" name="numero" value="{{ Auth::user()->cuenta != null ? Auth::user()->cuenta->numero : '' }}" class="form-control verificarCuenta" required>
								</td>
							</tr>

							<!-- <tr>
								<td width="40%">Banco</td>
								<td>
									<input type="text" name="banco" value="{{ Auth::user()->cuenta != null ? Auth::user()->cuenta->banco : '' }}" class="form-control" required>
								</td>
							</tr> -->

							<!-- @if(Auth::user()->cup_luz == null)
							<tr>
								<td width="40%">CUP</td>
								<td>
									<input type="text" name="cup" value="" class="form-control cups-datos" required>
								</td>
							</tr>
							@endif -->

						
							</tbody>
						</table>
					</div>
				</div>

					<div class="legal hidden">
						<h3 class="left-title">Términos y Condiciones de contratación</h3>
						<br>
						<div id="div1">
					    <div id="div2">
					    	<div id="contrato" class="contrato-texto">{!! $contrato !!}</div>
					    </div>
					</div>
					<div class="form-check mt-3 mb-4">
				      <input type="checkbox" class="form-check-input" id="terminos-contrato">
				      <label class="form-check-label" for="terminos-contrato">He leído y acepto los términos y condiciones</label>
				    </div>
				
				</div>
			   <br>
					
				<div class="firma-wrapper hidden">
					<h3 class="left-title">Firma digital:</h3>
					<p>utiliza el mouse,trackpad o tu dedo si estas en una pantalla táctil para firmar en el recuadro inferior.</p>
				    <div id="signature"></div>
				    <p class="center">Ip de contratación: {{ $userip }}</p>
				    <input type="hidden" name="firma" id="firma" value="" >
				    <div class="btn-bottom">
					    <a href="#" class="limpiar btn btn-primary mt-4">Borrar y firmar de nuevo</a>
					    <button type="submit" class="btn btn-primary mt-4 confirmar-contrato" id="contratar" disabled>Contratar</button>
				    </div>
				</div>

				<br>
			    <div id="result"></div>

				
		</form>
			@endguest

		</div>
	</div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('js/jSignature.min.js') }}"></script>
<script>
	$(document).ready(function(){
	
		// intento de poner rojo el negativo.
		var str = $('.green-price').text();
		var pos = str.indexOf("-"); 
		
		if( pos == 0 ){
			str.addClass('red');
		}
		
		$('#btn-atras,.comeback').click(function(event){
			event.preventDefault();
			$('#luz-oferta').hide();
			$('#resultados').show();
		});

		$('.limpiar').click(function(e){
			e.preventDefault();
			 $("#signature").jSignature('clear');
		});

		$("#signature").bind('change', function(e){ 
			datapair = $('#signature').jSignature("getData", "svg"); console.log(datapair);
			i = new Image();
			i.src = "data:" + datapair[0] + "," + datapair[1];
			$("#firma").val(datapair[1]);
		 });

		$('#showmetheform').click(function(event){
			 target = $(this).attr('href');
			
			$(".datos-requeridos").removeClass("hidden");
			$(".legal").removeClass("hidden");

			$('html, body').animate({
                    scrollTop: $(target).offset().top
            }, 2000);
		});

		$('.btn-contratar').click(function(event){
			event.preventDefault();
			link = $(this).attr('href');
			titulo = $(this).data('titulo');
			descripcion = $(this).data('descripcion');
			comision = $(this).data('comision');
			//contrato = $(this).data('contrato');
			total = $(this).data('total');
			plan2 = $(this).data('plan2');
			plan3 = $(this).data('plan3');
			ofertaId = $(this).data('id');
			kw = $(this).data('kw');
			aproximado = $(this).data('aproximado');
			ahorro = $(this).data('ahorro');
			flyer = $(this).data('flyer');
			imagen = $(this).data('imagen');
			pdf = $(this).data('pdf');
			tabla = $(this).data('tabla');

			if(flyer == 'na')
			{
				flyer = imagen;
			}

			if(pdf == 'na')
			{
				$('#btn-pdf').hide();
			}else{
				$('#btn-pdf').show();
			}
			if(tabla == 'na')
			{
				$('#btn-comisiones').hide();
			}else{
				$('#btn-comisiones').show();
			}

			$('#contratar').attr('href' , link);
			$('#oferta_id').val(ofertaId);
			$('#titulo').text(titulo);
			$('#descripcion').text(descripcion);
			$('#comision').text(comision);
			//$('#contrato').html(contrato);
			$('#comision_input').val(comision);
			$('#Premium-price').text(plan2);
			$('#Platinum-price').text(plan3);
			$('#precio').text(aproximado);
			$('#precio_kw').text(kw);
			$('#precio_total').text(aproximado);

			$('#ahorras').text(ahorro);
			$('#potencia').text(total);
			$('#consumo').text(kw);

			$('#btn-pdf').attr('href' , pdf);
			$('#btn-comisiones').attr('href' , tabla);
			$('#flyer_ofertas').attr('src' , flyer);

			$('#resultados').hide();
			$('#luz-oferta').show();

		});


		$('#terminos-contrato').click(function(){
          if ($(this).is(":checked")) {
          		$(".form-check-label").addClass("text-blue");
          		$(".firma-wrapper").removeClass("hidden");
                $(".confirmar-contrato").removeAttr("disabled");
                $("#signature").empty();
                $("#signature").jSignature('init');
            } else {
            	$(".form-check-label").removeClass("text-blue");
            	$(".firma-wrapper").addClass("hidden");
                $(".confirmar-contrato").attr("disabled", "disabled");
                $("#signature").jSignature('clear');
            }
        });

        $('.cups-datos').change(function() {
        if ($(this).val() != '') {

              res = valida_cups($(this).val());

              if (!res.success) {
              alert(res.msg);
              }
          }
        });

        $('.categorias').change(function(){
        	$('#ordenarOfertas').submit();
        });


		// Validar Cups

		function valida_cups(CUPS){

		  RegExPattern =/^[a-zA-Z]{2}[0-9]{16}[a-zA-Z]{2}([0-9][A-Za-z])?$/;

		  if (CUPS.length>22) {
		  return {success: false, code: 1, msg:'Demasiado largo' }; //Demasiado largo
		  }

		  if (CUPS.length<20) {
		  return {success: false, code: 2, msg:'Demasiado corto' }; //Demasiado corto
		  }

		  if (!CUPS.match(RegExPattern)) {
		  return {success: false, code: 3, msg:'Estructura no válida' }; //Estructura no válida
		  }

		  CUPS_16 = parseInt(CUPS.substr(2,16));
		  control = CUPS.substr(18,2).toUpperCase();
		  letters = Array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');

		  R0 = CUPS_16 % 529;
		  cont_C = Math.floor(R0/23);
		  cont_R = R0 % 23;

		  dc1 = letters[cont_C];
		  dc2 = letters[cont_R];
		  status = (control === dc1+dc2);

		      if(!status){
		        return {
		        success: false, code: 4, msg:'Dígitos de control no válidos, se esperaba ' + dc1 + dc2 
		        }; //Los dígitos de control no son válidos
		      }else{
		        return {
		        success: true
		        };
		      }
		  
		  }

		  
	});
</script>
@endsection
