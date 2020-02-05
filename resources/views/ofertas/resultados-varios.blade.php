@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/ofertas.css')}}">
@endsection
@section('content')

<header class="page">
	<div class="container">
   		<h2 class="center wow blue animated fadeIn text-center">Ofertas de {{ title_case($categoria->nombre) }}</h2>
    	<p class="center">Te damos la comisión de venta por cada contratación de {{ title_case($categoria->nombre) }}</p>
    </div>
</header>

@if($categoria->slug == 'seguros')
	<section class="subcategorias-seguros">
		<div class="container seguros-grid">
			<a href="#" class="card-lit step" data-categoria="1">
				<img src="/img/seguros/svg/auto.svg" alt="">
				<h3>Seguros de coche</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="1">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="2">
				<img src="/img/seguros/svg/moto.svg" alt="">
				<h3>Seguros de Moto</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="2">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="3">
				<img src="/img/seguros/svg/bike.svg" alt="">
				<h3>Seguros de Bici</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="3">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="4">
				<img src="/img/seguros/svg/hogar.svg" alt="">
				<h3>Seguros de Hogar</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="4">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="5">
				<img src="/img/seguros/svg/travel.svg" alt="">
				<h3>Seguros de Viaje</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="5">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="6">
				<img src="/img/seguros/svg/hospital.svg" alt="">
				<h3>Seguros de Salud</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="6">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="7">
				<img src="/img/seguros/svg/dental.svg" alt="">
				<h3>Seguros Dentales</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="7">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="8">
				<img src="/img/seguros/svg/care.svg" alt="">
				<h3>Seguros de Vida</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="8">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="9">
				<img src="/img/seguros/svg/decesos.svg" alt="">
				<h3>Seguros de Decesos</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="9">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="10">
				<img src="/img/seguros/svg/mascotas.svg" alt="">
				<h3>Seguros de Mascotas</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="10">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="11">
				<img src="/img/seguros/svg/furgonetas.svg" alt="">
				<h3>Seguros de Furgonetas</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="11">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="12">
				<img src="/img/seguros/svg/calendario.svg" alt="">
				<h3>Seguros por día</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="12">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="13">
				<img src="/img/seguros/svg/house.svg" alt="">
				<h3>Seguro inpagos alquiler</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="13">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="14">
				<img src="/img/seguros/svg/empresas.svg" alt="">
				<h3>Seguros de Empresas</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="14">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="15">
				<img src="/img/seguros/svg/ski.svg" alt="">
				<h3>Seguros de Deportes</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="15">Comparar</button>
			</a>
		</div>
	</section>
@endif

@if($categoria->slug == 'telefonia')
<style>
	ul.telefonia-items {padding: 0;}
	ul.telefonia-items li {display: inline-grid;}
	ul.telefonia-items li img {width: 50px;}
</style>
	<section class="subcategorias-seguros">
		<div class="container seguros-grid">
			<a href="#" class="card-lit step" data-categoria="1">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
				</ul>
				<h3>Internet sin fijo</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="1">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="2">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
					<li><img src="/img/telefonia/fijo.svg" alt="phone"></li>
				</ul>
				<h3>Internet + fijo</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="2">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="3">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/plan.svg" alt="contrato"></li>
				</ul>
				<h3>Tarifa Movil Contrato</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="3">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="4">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
					<li><img src="/img/telefonia/fijo.svg" alt="fijo"></li>
					<li><img src="/img/telefonia/tv.svg" alt="tv"></li>
				</ul>
				<h3>Internet + Fijo + TV</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="4">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="5">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
					<li><img src="/img/telefonia/fijo.svg" alt="fijo"></li>
					<li><img src="/img/telefonia/plan.svg" alt="contrato"></li>
				</ul>
				<h3>Internet + Fijo + Tarifa Movil</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="5">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="6">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
					<li><img src="/img/telefonia/fijo.svg" alt="fijo"></li>
					<li><img src="/img/telefonia/plan.svg" alt="contrato"></li>
					<li><img src="/img/telefonia/tv.svg" alt="tv"></li>
				</ul>
				<h3>Internet + Fijo + Movil + TV</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="6">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="7">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/prepago.svg" alt="internet"></li>
				</ul>
				<h3>Tarifa Movil Prepago</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="7">ver ofertas</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="9">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
					<li><img src="/img/telefonia/fuchi.svg" alt="fuchi"></li>
				</ul>
				<h3>Internet + Fútbol</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="9">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="10">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/internet.svg" alt="internet"></li>
					<li><img src="/img/telefonia/plan.svg" alt="tarifa movil"></li>
				</ul>
				<h3>Internet + Tarifa Móvil</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="10">Comparar</button>
			</a>
			<a href="#" class="card-lit step" data-categoria="11">
				<ul class="telefonia-items">
					<li><img src="/img/telefonia/tv.svg" alt="tv"></li>
				</ul>
				<h3>Solo TV</h3>
				<button href="#form-contactar" class="btn btn-white step" data-categoria="11">Comparar</button>
			</a>
		</div>
	</section>
@endif


	<section class="resultados {{ $categoria->slug == 'seguros' || $categoria->slug == 'telefonia' ? 'oculto' : '' }}" id="resultados">

	<div class="container">

		@if($categoria->slug == 'telefonia')
	    <div class="row mb-4">
		<div class="col-md-9 text-right"></div>
			<div class="col-md-3">
				<select class="empresas form-control">
									<option value="0">Seleccione una Empresa ▼</option>
									@foreach($categoria->empresas() as $empresa)
									<option value="{{ str_slug($empresa->nombre) }}">{{ $empresa->nombre }}</option>
									@endforeach
				</select>
			</div>
		</div>
	    @endif
		
		@if($categoria->slug == 'seguros' || $categoria->slug == 'telefonia')
		<!-- Botón de volver a categorías en seguros -->
	    <div class="row">
	    	<div class="col">
	    		<a href="#" class="btn btn-primary p-1" id="categoria-atras">&larr; Volver a las categorías</a>
	    	</div>
	    </div>
	    @endif

		<!-- Si no hay ofertas en Seguros -->

	    <div class="row" style="display: none" id="sin-ofertas">
	    	<div class="col">
		        <h3>No encontramos ofertas :(</h3>
	    	</div>
	    </div>
		
		

	<div class="row">
		
		<div class="col center">

			<!-- Resustado en Cards -->
			<div class="results">
		    @if($ofertas->count() == 0)
		        <h3>No encontramos ofertas :(</h3>
				<br>
						<button onClick="history.go(-1);return true;" class="btn btn-sm btn-block btn-primary mb-3" id="btn-atras">&larr; Volver a las ofertas</button>

		    @endif

	    

	
	<div class="row mb-4">
	@foreach($ofertas as $oferta)
		<div class="col-md-4 grid-oferta mb-4 {{ $categoria->slug == 'seguros' ? 'filtrar seguro-' . $oferta->subcategoria : '' }} {{ $categoria->slug == 'telefonia' ? 'filtrar cat-' . $oferta->opcion->categoria_telefonia . ' seguro-' . $oferta->opcion->categoria_telefonia : '' }} empresa-{{ str_slug($oferta->empresa->nombre) }}">
			

			@component('components.card')
			@slot('oferta' , $oferta)	
			@slot('contenido')
				
					@if($categoria->slug != 'telefonia')
					<h2 class="price">{{ number_format( $oferta->precio , 2 ) }} €</h2>
					@endif
				
					@guest
					<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt">-->
					<span>{{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
					<?php $comision = $oferta->comision * ($oferta->plan1 / 100); ?></span>
					<hr>
					@else
						
							@if(Auth::user()->plan_id == null)
							<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt"> -->
							<span>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
							<?php $comision = $oferta->comision * ($oferta->plan1 / 100);  ?></span>
							<hr>
							@elseif(Auth::user()->plan_id == 2)
							<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt"> -->
							<span>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan2 / 100)) , 2 , ',' , '.') }} €
							<?php $comision = $oferta->comision * ($oferta->plan2 / 100);  ?></span>
							<hr>
							@elseif(Auth::user()->plan_id == 3)
							<!-- <img src="/img/telefonia/fijo.svg" class="icon-txt"> -->
							<span>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan3 / 100)) , 2 , ',' , '.') }} €
							<?php $comision = $oferta->comision * ($oferta->plan3 / 100);  ?></span>
							<hr>
							@endif
						
					@endguest
				
					<div class="text-center">
							<button href="#form-contactar" class="btn btn-white btn-contratar" 

								data-id="{{ $oferta->id }}"
								data-titulo="{{ title_case($oferta->nombre) }}"
								data-descripcion="{{ $oferta->descripcion }}"
								data-empresa="{{ $oferta->empresa->nombre }}"
								data-comision="{{ $comision }}"
								data-total="{{ $oferta->opcion != null && $oferta->opcion->precio_telefonia != null ? number_format($oferta->opcion->precio_telefonia , 2) : number_format( ($oferta->precio) , 2 , ',' , '.') }}"
								data-contrato="{{ $oferta->contrato($oferta->empresa->contrato) }}"
								data-flyer="{{ $oferta->flyer_oferta == null? 'na' : asset('storage/ofertas/' . $oferta->id . '/' . $oferta->flyer_oferta) }}"
								
								data-imagen="{{ $oferta->imagen_oferta == null ? asset('img/hero.jpg') : asset('storage/ofertas/' . $oferta->id . '/' . $oferta->imagen_oferta) }}"
								
								data-pdf="{{ $oferta->pdf_oferta == null? 'na' : asset('storage/ofertas/' . $oferta->id . '/' . $oferta->pdf_oferta) }}"
								data-tabla="{{ $oferta->tabla_comisiones == null? 'na' : asset('storage/ofertas/' . $oferta->id . '/' . $oferta->tabla_comisiones) }}"
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
				<!-- condicional si existe el pdf adjunto: -->
				<a href="#" data-fancybox='gallery' class="btn btn-primary p-1" id="btn-pdf" target="_blank">Ver PDF</a>
				<!-- end condicional -->

				<!-- condicional si existe el tabla de comisiones adjunto: -->
				<a href="#" data-fancybox='gallery' class="btn btn-primary p-1" id="btn-comisiones" target="_blank">Ver Tabla</a>
				<!-- end condicional -->
			</div>
			<div class="col-md-6 card card-body">
				<h2 id="titulo"></h2>
				<p id="descripcion"></p>
				<br>
				<div class="resumen">
					<span class="precio-title">Precio:</span>
					<span class="price float-right"><span id="precio"></span>€</span>
					<hr>
					<span class="precio-title">Con tu plan de usuario 
						@if( Auth::user()->plan_id == NULL )
                			Gratuito
			            @elseif( Auth::user()->plan_id == 1 )
			                Premium
			            @elseif( Auth::user()->plan_id == 3 )
			                Platinum
			            @endif ganas:
			        </span>
			        <span class="price float-right"><span id="comision"></span>€</span>
					<br>

					@if( Auth::user()->plan_id != 3 ) <!-- si es plan gratis o premium -->
		
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
				</div>
				<br>
				<div class="actions">
					<a href="#" class="btn btn-primary p-1 comeback" onclick="goBack()">&larr; Volver a las ofertas</a>
					<a href="#form-contactar" id="showmetheform" class="btn btn-primary p-1 contratar">Contratar esta oferta</a>
				</div>
			</div>
		</div>
	</div>
	<div class="oculto" id="form-contactar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 center">
						<h2 class="wow animated fadeInUp">Te llamamos!</h2>
						<p class="white animated fadeIn">te llamamos para contratar esta oferta<br>y para darte una mejor atención.</p>
						<br>
						<div class="check_mark hide">
							<div class="sa-icon sa-success animate">
								<span class="sa-line sa-tip animateSuccessTip"></span>
								<span class="sa-line sa-long animateSuccessLong"></span>
								<div class="sa-placeholder"></div>
								<div class="sa-fix"></div>
							</div>
						</div>
						<form class="wow animated fadeInUp" id="contactar-reg" action="{{ route('contactar') }}" method="post" enctype="multipart/form-data">
							@csrf
							<input class="special" type="hidden" name="nombre" id="nombre" value="{{ Auth::user()->name }}">
							<input type="hidden" id="oferta_id" name="oferta_id">
							<input type="hidden" id="empresa" name="empresa">
							<input type="hidden" id="precio_form" name="precio">
							<input type="hidden" id="titulo_form" name="titulo">
							<input type="hidden" id="desc" name="desc">
							<input class="special" type="hidden" name="apellido" value="{{ Auth::user()->apellido }}">
							<input class="special" type="hidden" name="email" value="{{ Auth::user()->email }}">
							<input class="special" type="hidden" name="servicio" value="{{ $categoria->nombre }}" id="servicio-id">
							@if($categoria->slug == 'telefonia')
							<input class="special" type="text" name="actual" id="empresa_actual" placeholder="Compañia actual de telefonía?">
							@endif
							<input type="hidden" name="notas" value="">
							
							<div class="custom-file" style="border-radius: 30px ; overflow: hidden" >
							    <input type="file" class="custom-file-input" name="factura" id="validatedCustomFile">
							    <label class="custom-file-label" for="validatedCustomFile">Eligir factura</label>
							    
							  </div>
							<input class="special" type="text" name="telefono" placeholder="Teléfono" value="{{ Auth::user()->telefono }}" required>
							<div class="accept">
								<input type="checkbox" name="accept" id="the-terms" required> Acepto las <a href="{{ route('privacidad') }}" title="Ver Políticas de Privacidad">políticas de privacidad.</a>
							</div>
							<input id="submitBtn" class="btn btn-outline-light btn-lg submit-contactar" type="submit" value="Enviar" disabled="disabled">
						</form>
					</div>
				</div>
			</div>	
		</div>
</section>




			

			
@endsection

@section('scripts')
<script src="{{ asset('js/jSignature.min.js') }}"></script>
<script>
	$(document).ready(function(){

		// back button
		function goBack() {
			event.preventDefault();
			$('#luz-oferta').hide();
			$('#resultados').show();
		}

		// click to show contact form
		$('#showmetheform').click(function(e){
            e.preventDefault();
            $('.ocultar').hide();

            target = $(this).attr('href');
            servicio = $(this).attr('rel');

            //$("#servicio-id").val(servicio); 
            $(target).show();
            $('html, body').animate({
                    scrollTop: $(target).offset().top
            }, 2000);

            
		});

		// enable submit btn on agree terms
		var the_terms = $("#the-terms");

        the_terms.click(function() {
            if ($(this).is(":checked")) {
                $("#submitBtn").removeAttr("disabled");
            } else {
                $("#submitBtn").attr("disabled", "disabled");
            }
        });

		$('.categorias').change(function(){

    		if($(this).val() == 0)
    		{
    			$('.filtrar').show();
    		}else{

    		cat = 'cat-' + $(this).val();

    		$('.filtrar').hide();
    		$('.' + cat).show();

    		}

    	});

    	$('.empresas').change(function(){

    		if($(this).val() == 0)
    		{
    			$('.filtrar').show();
    		}else{

    		empresa = $(this).val();

    		$('.filtrar').hide();
    		$('.empresa-' + empresa).show();

    		}

    	});

		$('.step').click(function(e){

			e.preventDefault();

			$('.subcategorias-seguros').hide();
			$('.grid-oferta').hide();

			sub = $(this).data('categoria');
			$('.seguro-' + sub).show();
			$('.resultados').show();
			ofertasNum = $('.seguro-' + sub +':visible').length;
			
			if(ofertasNum == 0)
			{
				$('#sin-ofertas').show();
			}else{
				$('#sin-ofertas').hide();
			}
		});


		$('.card-lit').each(function(){
			catSeleccionada = $(this).data('categoria');
			cantidadOfertas = $('.seguro-' + catSeleccionada ).length;
			if ( cantidadOfertas == 0 )
				{
					$(this).hide();
				}
		});

		$('#categoria-atras').click(function(e){
			e.preventDefault();

			$('.resultados').hide();
			$('.grid-oferta').show();
			$('.subcategorias-seguros').show();

		});


		

        $('#contactar-reg').on('submit', function (e) {
            
            e.preventDefault();
            var nombre = $("input[name=nombre]").val();
            var apellido = $("input[name=apellido]").val();
            var email = $("input[name=email]").val();
            var llamar = $("input[name=llamar]").val();
            var servicio = $("#servicio-id").val();


            // datos de la oferta telefónica
            empresa = $('#empresa').val(); 
            precio 	= $('#precio_form').val();
            titulo 	= $('#titulo_form').val();
            desc 	= $('#desc').val();
            actual 	= $("#empresa_actual").val();



            var text = "Tiene " + actual + " actualmente, y esta interesado en la oferta de " + empresa + " de " + titulo + " que incluye " + desc;

            $("input[name=notas]").val(text);

            formData = new FormData(document.getElementById('contactar-reg'));

            console.log(formData);
            $('form').fadeOut();
            $.ajax({
                type: 'post',
                url: '{{ route("contactar") }}',
                dataType: "html",
			    data: formData,
			    cache: false,
			    contentType: false,
			    processData: false,
            
                success: function (data) {
                        
                    $('.check_mark').removeClass('hide');
                    $(".sa-success").addClass("hide");
                    setTimeout(function() {
                        $(".sa-success").removeClass("hide");
                    }, 10);
                    $("h3.gray").html(data.guardado);
                }
            });
        });

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

		$('.btn-contratar').click(function(event){
			event.preventDefault();
			link = $(this).attr('href');
			titulo = $(this).data('titulo');
			descripcion = $(this).data('descripcion');
			comision = $(this).data('comision').toFixed(2);
			empresa = $(this).data('empresa');
			//contrato = $(this).data('contrato');
			plan2 = $(this).data('plan2');
			plan3 = $(this).data('plan3');
			total = $(this).data('total');
			ofertaId = $(this).data('id');
			flyer = $(this).data('flyer');
			tabla = $(this).data('tabla');
			imagen = $(this).data('imagen');
			pdf = $(this).data('pdf');

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
			$('#empresa').val(empresa);
			$('#oferta_id').val(ofertaId);
			$('#titulo').text(titulo);
			$('#titulo_form').val(titulo);
			$('#descripcion').text(descripcion);
			$('#desc').val(descripcion);
			$('#comision').text(comision);
			//$('#contrato').html(contrato);
			$('#comision_input').val(comision);
			$('#Premium-price').text(plan2);
			$('#Platinum-price').text(plan3);
			$('#precio').text(total);
			$('#precio_form').val(total);
			$('#btn-pdf').attr('href' , pdf);
			$('#flyer_ofertas').attr('src' , flyer);
			$('#btn-comisiones').attr('href' , tabla);

			$('#notas-contratar').val('Estoy interesado en la oferta: ' + titulo);
			

			$('#resultados').hide();
			$('#luz-oferta').show();
		});


		$('#terminos-contrato').click(function(){
          if ($(this).is(":checked")) {
          		$(".firma-wrapper").removeClass("hidden");
                $(".confirmar-contrato").removeAttr("disabled");
                $("#signature").empty();
                $("#signature").jSignature('init');
            } else {
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
