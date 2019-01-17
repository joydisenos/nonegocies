@extends('layouts.master')
@section('content')
<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
			<h1 class="title-hero fadeInDown animated">Te pagamos por ahorrar en tus facturas</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
			<a href="#contactar" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger">Unete a nuestro movimiento</a>
		</div>
		<div class="social-wrapper">
			<h5>Síguenos</h5>
			<ul class="social-links">
				<li class="facebook">
					<a href="" rel="external" target="_blank">
					<img src="{{ asset('img/fb.svg') }}" alt="">
					</a>
				</li>
				<li class="twitter">
					<a href="" rel="external" target="_blank">
					<img src="{{ asset('img/tw.svg') }}" alt="">
					</a>
            </li>
				<li class="instagram">
					<a href="" rel="external" target="_blank">
					<img src="{{ asset('img/ig.svg') }}" alt="">
					</a>
				</li>
			</ul>
		</div>
		<div class="sheader-shape">
			<img src="{{  asset('img/wave.png')}}" alt="Shape">
		</div>
	</div>
</header>

<section class="contactar" id="contactar">
	<div class="floating-ball-model-3">
		<span class="floating-ball-1"></span>
		<span class="floating-ball-2"></span>
		<span class="floating-ball-3"></span>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 center">
			<h2 class="wow blue animated fadeInUp">Fala muy poco para el lanzamiento de nuestra plataforma</h1>
      <p id="time"></p>
			<h3 class="wow gray animated fadeInUp">dejanos tus datos por si quieres comenzar antes o te avisemos cuando estemos listos</h3>
			<br>
			<div class="check_mark hide">
			  	<div class="sa-icon sa-success animate">
			    	<span class="sa-line sa-tip animateSuccessTip"></span>
				    <span class="sa-line sa-long animateSuccessLong"></span>
				    <div class="sa-placeholder"></div>
				    <div class="sa-fix"></div>
			  	</div>
			</div>
			<form class="wow animated fadeInUp">
				<input class="special" type="text" name="name" placeholder="Nombre Completo *" required>
				<input class="special" type="email" name="email" placeholder="Email *" required>
				<input class="special" type="text" name="phone" placeholder="Teléfono">
				<div class="callme">
				<input type="checkbox" name="callme" id="callme"> Prefiero que me llamen
				</div>
				<div class="accept">
				<input type="checkbox" name="accept" id="the-terms"> Acepto las <a href="{{ route('privacidad') }}" title="Ver Políticas de Privacidad">políticas de privacidad.</a>
				</div>
				<input id="submitBtn" class="btn btn-outline-light btn-lg submit-contactar" type="submit" value="Enviar" disabled="disabled">
			</form>
		</div>
		<div class="col-md-3"></div>
		</div>
	</div>
</section>

<script>
$(document).ready(function() {
	$(function () {

		$('form').on('submit', function (e) {
			
      	
      	e.preventDefault();
      	$('form').fadeOut();
		$.ajax({
			type: 'post',
			url: '/contactar',
			data: $('form').serialize(),
			
	        success: function () {
	        			
						$('.check_mark').removeClass('hide');
						$(".sa-success").addClass("hide");
						setTimeout(function() {
						    $(".sa-success").removeClass("hide");
						}, 10);
						$("h3.gray").html("Muchas Gracias por contactarnos, pronto nos pondremos en contacto.");
					}
				});
			});
		});

		var the_terms = $("#the-terms");

	    the_terms.click(function() {
	        if ($(this).is(":checked")) {
	            $("#submitBtn").removeAttr("disabled");
	        } else {
	            $("#submitBtn").attr("disabled", "disabled");
	        }
	    });
	}); 
</script>

@endsection

