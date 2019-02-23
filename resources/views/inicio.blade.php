@extends('layouts.master')
@section('content')

<style>
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

.about:after{
	position: absolute;
    content: "";
    width: 100%;
    height: 1000px;
    background: url({{ asset('/svg/red_curve.svg') }}) no-repeat center bottom;
    bottom: 0;
    left: 0;
    background-size: 100%;
}



.pricing:before{
	position: absolute;
    content: "";
    width: 100%;
    height: 1000px;
    background: url({{ asset('/svg/red_curve_bottom.svg') }}) no-repeat center top;
    top: 0;
    left: 0;
    background-size: 100%;
}

.target{
	background: #e73747!important;
	padding-bottom:0;
}

.white{
	color:white !important;
}

.target h2{
	font-size: 38px;
}

.target p{
	font-size: 16px;
}

.pricing .container {
    padding-top: 120px;
}

.circle {
    background: white;
    color: blue;
    border-radius: 100%;
    height: 180px;
    width: 180px;
    text-align: center;
    display: block;
    margin: 0 auto;
    margin-bottom: 10px;
}

.target .col-lg-3 {
    text-align: center;
    color: white;
}

.target .row {
    padding-top: 40px;
}

.circle img {
    width: 110px;
    padding-top: 30px;
}

.target h3{
	text-transform: uppercase;
}

</style>

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
						<svg viewBox="0 0 46 34">
							<path d="M25.6 33h-7.1V19H15v-6.2h3.5V9.1c0-5.1 2-8.1 7.7-8.1H31v6.2h-3c-2.2 0-2.4.9-2.4 2.5v3.1H31l-.6 6.2h-4.7v14z"/>
						</svg>
					</a>
				</li>
				<li class="twitter">
					<a href="" rel="external" target="_blank">
						<svg viewBox="0 0 400 400">
							<path d="M153.62,301.59c94.34,0,145.94-78.16,145.94-145.94,0-2.22,0-4.43-.15-6.63A104.36,104.36,0,0,0,325,122.47a102.38,102.38,0,0,1-29.46,8.07,51.47,51.47,0,0,0,22.55-28.37,102.79,102.79,0,0,1-32.57,12.45,51.34,51.34,0,0,0-87.41,46.78A145.62,145.62,0,0,1,92.4,107.81a51.33,51.33,0,0,0,15.88,68.47A50.91,50.91,0,0,1,85,169.86c0,.21,0,.43,0,.65a51.31,51.31,0,0,0,41.15,50.28,51.21,51.21,0,0,1-23.16.88,51.35,51.35,0,0,0,47.92,35.62,102.92,102.92,0,0,1-63.7,22A104.41,104.41,0,0,1,75,278.55a145.21,145.21,0,0,0,78.62,23"/>
						</svg>
					</a>
            </li>
				<li class="instagram">
					<a href="" rel="external" target="_blank">
						<svg viewBox="0 0 16 16">
							<path d="M16 4.7a5.87 5.87 0 0 0-.37-1.94 3.92 3.92 0 0 0-.92-1.42 3.91 3.91 0 0 0-1.42-.92A5.88 5.88 0 0 0 11.3 0H4.7a5.88 5.88 0 0 0-1.94.37A4.09 4.09 0 0 0 .42 2.76 5.87 5.87 0 0 0 0 4.7v6.6a5.87 5.87 0 0 0 .37 1.94 4.09 4.09 0 0 0 2.34 2.34A5.87 5.87 0 0 0 4.7 16h6.6a5.87 5.87 0 0 0 1.94-.37 4.09 4.09 0 0 0 2.34-2.34A5.87 5.87 0 0 0 16 11.3V8 4.7zm-1.44 6.53a4.43 4.43 0 0 1-.28 1.49 2.65 2.65 0 0 1-1.52 1.52 4.45 4.45 0 0 1-1.49.28H4.81a4.46 4.46 0 0 1-1.49-.28 2.65 2.65 0 0 1-1.52-1.52 4.43 4.43 0 0 1-.28-1.49V8 4.77a4.43 4.43 0 0 1 .28-1.49 2.65 2.65 0 0 1 1.48-1.52 4.43 4.43 0 0 1 1.49-.28h6.46a4.43 4.43 0 0 1 1.49.28 2.65 2.65 0 0 1 1.52 1.52 4.43 4.43 0 0 1 .28 1.49V8s.03 2.39-.01 3.23zM8 3.89A4.11 4.11 0 1 0 12.11 8 4.11 4.11 0 0 0 8 3.89zm0 6.77A2.67 2.67 0 1 1 10.67 8 2.67 2.67 0 0 1 8 10.67zm4.27-7.9a1 1 0 1 0 1 1 1 1 0 0 0-1-.99z"/>
						</svg>
					</a>
				</li>
			</ul>
		</div>
		<div class="sheader-shape">
			<img src="{{  asset('img/wave.png')}}" alt="Shape">
		</div>
	</div>
</header>
<section class="about" id="about">
	<div class="container">
		<h2 class="center wow blue forced-top animated fadeIn text-center">Sobre Nosotros</h2>
		<div class="row">
			<div class="col-lg-4 wow featured animated fadeInUp">
				<div class="card">
					<div class="card-body-featured">
						<img class="icons" src="{{ asset('/img/01.svg') }}" alt="flag">
				<h2 class="blue center">Movimiento</h2>
				<p class="gray big-txt">Los comerciales ganan dinero con nuestras facturas, eso se ha terminado, nace No Negocies, donde tú eres tu propio comercial.</p>
					</div>
				</div>
				
			</div>
			<div class="col-lg-4 wow featured animated fadeInUp">
				<div class="card">
					<div class="card-body-featured">
						<img class="icons" src="{{ asset('/img/02.svg') }}" alt="target">
				<h2 class="blue center">Objetivo</h2>
				<p class="gray big-txt">Tenemos por objetivo ofrecerte un mundo de posibilidades para ahorrar en tus facturas y que ganes dinero con ello.</p>
					</div>
				</div>
				
			</div>
			<div class="col-lg-4 wow featured animated fadeInUp">
				<div class="card">
					<div class="card-body-featured">
						<img class="icons" src="{{ asset('/img/03.svg') }}" alt="magic">
				<h2 class="blue center">Concepto</h2>
				<p class="gray big-txt">Te ayudamos a encontrar las mejores opciones y al finalizar una contratación se te abonará la comisión específica en tu cuenta.</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<section class="target" id="target">
	<div class="container">
		<h2 class="white center text-center">Titulo para los targets</h2>
		<p class="white center text-center">Lorem ipsum dolor sit amet nsdou tinasdfm tritani omittam qui mei oblique taimates.</p>
		<div class="row">
			<div class="col-lg-3">
				<div class="circle">
					<img src="{{ asset('/svg/house.svg') }}" alt="house" />
				</div>
				<h3>Particulares</h3>
				<hr>
				<p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet neque facilis doloremque temporibus quaerat culpa architecto voluptatem esse similique cupiditate.</p>
			</div>
			<div class="col-lg-3">
				<div class="circle">
					<img src="{{ asset('/svg/house.svg') }}" alt="house" />
				</div>
				<h3>Empresas</h3>
				<hr>
				<p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus eaque, eligendi sed, vero error aliquam praesentium provident eius nostrum! Ducimus.</p>
			</div>
			<div class="col-lg-3">
				<div class="circle">
					<img src="{{ asset('/svg/house.svg') }}" alt="house" />
				</div>
				<h3>Comunidades</h3>
				<hr>
				<p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo minima, cupiditate sit at voluptatibus hic alias porro vero est dolore.</p>
			</div>
			<div class="col-lg-3">
				<div class="circle">
					<img src="{{ asset('/svg/house.svg') }}" alt="house" />
				</div>
				<h3>Administradores</h3>
				<hr>
				<p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui error modi nihil dicta velit maxime consequuntur ab, deleniti cumque.</p>
			</div>
		</div>
	</div>
</section>


<!-- <section class="contactar" id="contactar">
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
			<form class="wow animated fadeInUp" id="contactar-reg" action="{{ route('contactar') }}" method="post">
				@csrf
				<input class="special" type="text" name="nombre" id="nombre" placeholder="Nombre*" required>
				<input class="special" type="text" name="apellido" placeholder="Apellido *" required>
				<input class="special" type="email" name="email" placeholder="Email *" required>
				<input class="special" type="text" name="telefono" placeholder="Teléfono">
				<div class="callme">
				<input type="checkbox" name="llamar" id="llamada"> Prefiero que me llamen
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
</section> -->

<!-- prices -->

<section class="pricing py-5">
  <div class="container">
  	<div style="height: 40px"></div>
  	<h2 class="center text-center">Titulo para los targets</h2>
		<p class="center text-center">Lorem ipsum dolor sit amet nsdou tinasdfm tritani omittam qui mei oblique taimates.</p>
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
          	<img src="{{ asset('svg/free.svg') }}" alt="free" class="plan-img" />
            <h5 class="card-title text-muted text-uppercase text-center">Gratis</h5>
            <ul class="fa-ul gray">
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
            </ul>
            <h6 class="card-price text-center">0<span class="currency">€</span><span class="period"></span></h6>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Contratar</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
          	<img src="{{ asset('svg/premium.svg') }}" alt="free" class="plan-img" />
            <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
            <ul class="fa-ul gray">
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
            </ul>
             <h6 class="card-price text-center">29<span class="currency">€</span><span class="period"> x mes</span></h6>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Contratar</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
          	<img src="{{ asset('svg/platinum.svg') }}" alt="free" class="plan-img" />
            <h5 class="card-title text-muted text-uppercase text-center">Platinum</h5>
            <ul class="fa-ul gray">
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
             <li>incluye ..</li>
            </ul>
             <h6 class="card-price text-center">49<span class="currency">€</span><span class="period"> x mes</span></h6>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Contratar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section style="background: #eaeaea;height: 400px;">
	
</section>

<!-- end prices -->

<script>
$(document).ready(function() {


		 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});

   

		$('#contactar-reg').on('submit', function (e) {
			
      	var nombre = $("input[name=nombre]").val();
      	var apellido = $("input[name=apellido]").val();
        var email = $("input[name=email]").val();
        var llamar = $("input[name=llamar]").val();

      	e.preventDefault();
      	$('form').fadeOut();
		$.ajax({
			type: 'post',
			url: '{{ route("contactar") }}',
			data: $(this).serialize(),
			
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

