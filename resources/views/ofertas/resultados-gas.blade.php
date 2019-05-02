@extends('layouts.master')
@section('header')
<style>

img.check {
    width: 20px;
    margin-right: 10px;
}

ul.fa-ul.gray {
    padding-left: 15px;
}

.gray li {
    padding: 5px 0;
}


.row {
    padding-top: 50px;
}


.card-body {
    border: 2px solid #e8e8e8;
    background-color: #fff;
    padding: 30px 25px;
    border-radius: 32px;
    margin-bottom: 50px;
    position: relative;
    transition: .5s ease-in-out;
    z-index: 2;
}

.card.mb-5.mb-lg-0 {
    border: 0;
}

.card {
    border: 0;
}

span.currency {
    font-size: 30px;
}

span.period {
    font-size: 20px;
    color: black;
}

h5.card-title {
    color: black !important;
    margin: 30px 0;
    font-size: 30px;
}

h6.card-price {
    color: #e73747 !important;
    font-size: 90px;
    padding-bottom: 20px;
}

.card-body:hover {
    border-color: #e8ca49;
    transform: translateY(-5px);
}

.card-body:hover a.btn.btn-block.btn-primary.text-uppercase{
  color: white !important;
  background: #e73747 !important;
}

.card-body:hover h5.card-title:before{
  background: #FF034C;
}

a.btn.btn-block.btn-primary.text-uppercase {
    border-radius: 32px!important;
    border: none!important;
    width: 200px!important;
    background: #e8cb4a!important;
    color: #000!important;
    font-size: 14px!important;
    line-height: 14px!important;
    padding: 16px 0!important;
    text-align: center!important;
    text-transform: uppercase!important;
    letter-spacing: 1.8px;
    font-weight: 600;
    margin: 0 auto;
    transition: .5s ease-in-out;
}

a.btn.btn-block.btn-primary.text-uppercase:hover {
    background: #FF034C !important;
    color: white !important;
}

img.plan-img {
    height: 80px;
    margin: 0 auto;
    display: block;
}


h5.card-title:before{
  height: 2px;
    width: 130px;
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    background: #dedbdc;
    top: 189;
    margin: 0 auto;
    transition: .5s esae-in-out;
}

.card-body-featured{
  background: #ffffff;
    padding: 45px;
    -webkit-box-shadow: 7px 5px 30px rgba(72, 73, 121, 0.15);
    -moz-box-shadow: 7px 5px 30px rgba(72, 73, 121, 0.15);
    box-shadow: 7px 5px 30px rgba(72, 73, 121, 0.15);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
}

.col-lg-4.wow.featured.fadeInUp.animated {
    z-index: 999;
}

section{
      box-sizing: border-box;
      overflow: hidden;
      position: relative
}

/*faqs*/

details {
  width: 75%;
  min-height: 5px;
  max-width: 700px;
  padding: 45px 70px 45px 45px;
  margin: 0 auto;
  position: relative;
  font-size: 22px;
  border: 1px solid rgba(0,0,0,.1);
  border-radius: 15px;
  box-sizing: border-box;
  transition: all .3s;
}

details + details {
  margin-top: 20px;
}

details[open] {
    min-height: 50px;
    background-color: #ffffff;
    box-shadow: 2px 2px 20px rgba(0,0,0,.2);
}

details p {
  color: #96999d;
  font-weight: 300;
}

summary {
  font-weight: 500;
  cursor: pointer;
}


summary:focus {
  outline: none;
}

summary::-webkit-details-marker {
  display: none
}

summary::after {
  padding: 20px;
  position: absolute;
  top: 50%;
  right: 0;
  color: rebeccapurple;
  font-size: 15px;
  font-style: normal;
  font-variant-caps: normal;
  font-variant-ligatures: normal;
  font-weight: 900;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  content: "V";
  transform: translateY(-50%);
  transition: .3s ease;
}

details[open] summary::after {
  content: "X";
  font-size: 30px;
  top: 0;
  transform: translateY(0);
  transition: .3s ease;
}

details[open] summary:hover::after {
  animation: pulse 1s ease;
}

@keyframes pulse {
  25% {
    transform: scale(1.1);
  }
  50% {
    transform: scale(1);
  }
  75% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}
details{
  background: #f1f1f1
}
.faq{
  background: #393975 url({{ asset('/img/bg-hero-page.svg') }}) repeat;
}
.faq h2{
  color: white !important;padding-bottom: 60px
}
.contrato-texto{
	max-width: 900px;
    max-width: 70%;
    margin:0 auto;
    max-height: 300px;
    overflow-y: scroll;
}

</style>

@endsection
@section('content')
<style>
	.oculto{
		display:none;
	}
</style>

<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Ofertas de {{ title_case($categoria->nombre) }} disponibles</h1>
    <p class="animated fadeInDown">Te damos la comisión de venta por cada contratación de servicio en nuestra web</p>
  </div>
  <div class="wave">
    <svg style="fill:white;" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="217" viewBox="0 0 1920 217">
  <g fill-rule="evenodd" transform="matrix(-1 0 0 1 1920 0)">
    <path d="M0,57.46875 C203.364583,135.217754 494.835938,156.564108 874.414062,121.507813 C1192.61198,-13.9827666 1541.14063,-35.3291208 1920,57.46875 L1920,207 L0,207 L0,57.46875 Z" opacity=".3"></path>
    <path d="M0,79 C292.46875,165.453125 612.46875,165.453125 960,79 C1307.53125,-7.453125 1627.53125,-7.453125 1920,79 L1920,207 L0,207 L0,79 Z" opacity=".6"></path>
    <path d="M0,89 C288.713542,146.786458 608.713542,146.786458 960,89 C1311.28646,31.2135417 1631.28646,31.2135417 1920,89 L1920,217 L0,217 L0,89 Z"></path>
  </g>
</svg>
  </div>
</header>

<section class="resultados" id="resultados">
	<div class="floating-ball-model-3">
		<span class="floating-ball-1"></span>
		<span class="floating-ball-2"></span>
		<span class="floating-ball-3"></span>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 center">
			<div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <th>Empresa</th>
                        <!--<th>Oferta</th>-->
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Ganas desde</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($ofertas as $oferta)
                        <tr>
                            <td><img src="{{ ($oferta->empresa->logo) ? asset('storage/'. $oferta->empresa->logo) : asset('img/nonegocies.png')}}" style="max-width:100px;" class="img-fluid" alt="Logo {{$oferta->empresa->nombre}}"></td>
                            <!--<td>{{ title_case($oferta->nombre) }} </td>-->
                            <td>{{ $oferta->descripcion }}</td>
                            <td> {{ number_format( ($oferta->precio_fijo) , 2 , ',' , '.') }} € </td>
							@guest
							<td>{{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
							<?php $comision = $oferta->comision * ($oferta->plan1 / 100); ?>
							</td>
							@else
								@if(Auth::user()->plan_id == null)
								<td>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan1 / 100);  ?>
								</td>
								@elseif(Auth::user()->plan_id == 2)
								<td>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan2 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan2 / 100);  ?>
								</td>
								@elseif(Auth::user()->plan_id == 3)
								<td>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan3 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan3 / 100);  ?>
								</td>
								@endif
							@endguest
							<td><a class="btn-contratar" 

								data-id="{{ $oferta->ofertaid }}"
								data-titulo="{{ title_case($oferta->titulo) }}"
								data-descripcion="{{ $oferta->descripcion }}"
								data-comision="{{ $comision }}"
								data-total="{{ number_format( ($oferta->precio_fijo) , 2 , ',' , '.') }}"
								data-contrato="{{ $oferta->contrato($oferta->empresa->contrato) }}"

								href="#">Contratar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
		<div class="col-md-1"></div>
		</div>
	</div>
</section>

<section class="oculto" id="luz-oferta">
<div class="floating-ball-model-3">
		<span class="floating-ball-1"></span>
		<span class="floating-ball-2"></span>
		<span class="floating-ball-3"></span>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 center">
			<div class="text-left">
					<a href="#" class="btn btn-primary p-1 mb-3" id="btn-atras">&larr; Atras</a>
			</div>
			<h4 id="titulo">Título de la oferta</h4>

			<p id="descripcion"></p>

			<hr>

			<div class="row"> 
				<div class="col">
					<div class="text-right mt-2 mb-2">
						<h5>Precio aproximado: <span id="precio"></span>€</h5>

						<h5>Ganas desde: <span id="comision"></span>€</h5>
					</div>
				</div>
			</div>

			<hr>

			
	
			@guest
			@else
			<form action="{{ route('contratar.oferta') }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="oferta_id" value="" id="oferta_id">
				<input type="hidden" name="comision" value="" id="comision_input">
				
				
				<div class="card mt-3 mb-3">
					<div class="card-header p-4">
						<div class="row align-items-center">
						<div class="col">
							<!-- Title -->
							<h4 class="card-header-title">
							Datos Requeridos para contratar
							</h4>
						</div>
						
						</div>
					</div>
					
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								
								<tbody>
								<tr>
									<td width="40%">DNI Escaneado</td>
									<td>
										<input type="file" name="dni-scan" value="" class="form-control" required>
									</td>
								</tr>
								<tr>
									<td width="40%">Factura Escaneada</td>
									<td>
										<input type="file" name="factura-scan" value="" class="form-control" required>
									</td>
								</tr>
								@if(Auth::user()->cup_luz == null)
								<tr>
									<td width="40%">CUP</td>
									<td>
										<input type="text" name="cup" value="" class="form-control cups-datos" required>
									</td>
								</tr>
								@endif

								@if(Auth::user()->tarjetas->first() == null)
								<tr>
									<td width="40%">
										Tarjeta
									</td>
									<td>
										<input type="text" class="form-control" value="" name="tarjeta" required>
									</td>
								</tr>
							
								<tr>
									<td>
									Código de Seguridad (CVV)
									</td>
									<td>
									<input type="number" min="0" class="form-control" value="" name="cvv" required>
									</td>
								</tr>
							
								<tr>
									<td>
									Vence
									</td>
									<td>
									<input type="text" class="form-control" value="" name="vence" required>
									</td>
								</tr>
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				

				<div id="contrato" class="contrato-texto"></div>
				<div class="form-check mt-3 mb-3" style="max-width: 900px; max-width: 70%; margin:0 auto;">
			      <input type="checkbox" class="form-check-input" id="terminos-contrato">
			      <label class="form-check-label" for="terminos-contrato">He leído y acepto los términos y condiciones</label>
			    </div>

				<button type="submit" class="btn btn-primary mt-4 confirmar-contrato" id="contratar" disabled>Contratar</button>
		</form>
			@endguest

			

		</div>
		<div class="col-md-1"></div>
		</div>
	</div>

	
</section>

@endsection

@section('scripts')
<script>
	$(document).ready(function(){

		$('#btn-atras').click(function(event){
			event.preventDefault();
			$('#luz-oferta').hide();
			$('#resultados').show();
		});

		$('.btn-contratar').click(function(event){
			event.preventDefault();
			link = $(this).attr('href');
			titulo = $(this).data('titulo');
			descripcion = $(this).data('descripcion');
			comision = $(this).data('comision');
			contrato = $(this).data('contrato');

			total = $(this).data('total');
			ofertaId = $(this).data('id');

			$('#contratar').attr('href' , link);
			$('#oferta_id').val(ofertaId);
			$('#titulo').text(titulo);
			$('#descripcion').text(descripcion);
			$('#comision').text(comision);
			$('#contrato').html(contrato);
			$('#comision_input').val(comision);

			$('#precio').text(total);

			$('#resultados').hide();
			$('#luz-oferta').show();

		});


		$('#terminos-contrato').click(function(){
          if ($(this).is(":checked")) {
                $(".confirmar-contrato").removeAttr("disabled");
            } else {
                $(".confirmar-contrato").attr("disabled", "disabled");
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
