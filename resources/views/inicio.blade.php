@extends('layouts.master')
@section('header')
<style>
#mainNav .nav-link:not(logout){color: #133273 !important;}
#mainNav .nav-link:hover{color: #FF034C !important;}
</style>
@endsection
@section('content')

<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
			<h1 class="title-hero fadeInDown animated">Te pagamos por ahorrar en tus facturas</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
			<a href="#howitworks" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger">Como funciona?</a> 			
			@guest
			<a href="#login" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero iniciar">Comenzar</a>
			@else
			<a href="{{ route('indexofertas') }}" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Comenzar</a>
			@endguest
		</div>
		<div class="social-wrapper">
			<h5>Síguenos</h5>
			<ul class="social-links">
				<li class="facebook">
					<a href="https://www.facebook.com/nonegocies" rel="external" target="_blank">
						<svg viewBox="0 0 46 34">
							<path d="M25.6 33h-7.1V19H15v-6.2h3.5V9.1c0-5.1 2-8.1 7.7-8.1H31v6.2h-3c-2.2 0-2.4.9-2.4 2.5v3.1H31l-.6 6.2h-4.7v14z"/>
						</svg>
					</a>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/nonegocies" rel="external" target="_blank">
						<svg viewBox="0 0 400 400">
							<path d="M153.62,301.59c94.34,0,145.94-78.16,145.94-145.94,0-2.22,0-4.43-.15-6.63A104.36,104.36,0,0,0,325,122.47a102.38,102.38,0,0,1-29.46,8.07,51.47,51.47,0,0,0,22.55-28.37,102.79,102.79,0,0,1-32.57,12.45,51.34,51.34,0,0,0-87.41,46.78A145.62,145.62,0,0,1,92.4,107.81a51.33,51.33,0,0,0,15.88,68.47A50.91,50.91,0,0,1,85,169.86c0,.21,0,.43,0,.65a51.31,51.31,0,0,0,41.15,50.28,51.21,51.21,0,0,1-23.16.88,51.35,51.35,0,0,0,47.92,35.62,102.92,102.92,0,0,1-63.7,22A104.41,104.41,0,0,1,75,278.55a145.21,145.21,0,0,0,78.62,23"/>
						</svg>
					</a>
            </li>
				<li class="instagram">
					<a href="https://instagram.com/nonegocies" rel="external" target="_blank">
						<svg viewBox="0 0 16 16">
							<path d="M16 4.7a5.87 5.87 0 0 0-.37-1.94 3.92 3.92 0 0 0-.92-1.42 3.91 3.91 0 0 0-1.42-.92A5.88 5.88 0 0 0 11.3 0H4.7a5.88 5.88 0 0 0-1.94.37A4.09 4.09 0 0 0 .42 2.76 5.87 5.87 0 0 0 0 4.7v6.6a5.87 5.87 0 0 0 .37 1.94 4.09 4.09 0 0 0 2.34 2.34A5.87 5.87 0 0 0 4.7 16h6.6a5.87 5.87 0 0 0 1.94-.37 4.09 4.09 0 0 0 2.34-2.34A5.87 5.87 0 0 0 16 11.3V8 4.7zm-1.44 6.53a4.43 4.43 0 0 1-.28 1.49 2.65 2.65 0 0 1-1.52 1.52 4.45 4.45 0 0 1-1.49.28H4.81a4.46 4.46 0 0 1-1.49-.28 2.65 2.65 0 0 1-1.52-1.52 4.43 4.43 0 0 1-.28-1.49V8 4.77a4.43 4.43 0 0 1 .28-1.49 2.65 2.65 0 0 1 1.48-1.52 4.43 4.43 0 0 1 1.49-.28h6.46a4.43 4.43 0 0 1 1.49.28 2.65 2.65 0 0 1 1.52 1.52 4.43 4.43 0 0 1 .28 1.49V8s.03 2.39-.01 3.23zM8 3.89A4.11 4.11 0 1 0 12.11 8 4.11 4.11 0 0 0 8 3.89zm0 6.77A2.67 2.67 0 1 1 10.67 8 2.67 2.67 0 0 1 8 10.67zm4.27-7.9a1 1 0 1 0 1 1 1 1 0 0 0-1-.99z"/>
						</svg>
					</a>
				</li>
			</ul>
		</div>
		<div class="sheader-shape">
			<svg style="fill:#cfd0f3;" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="217" viewBox="0 0 1920 217">
  <g fill-rule="evenodd" transform="matrix(-1 0 0 1 1920 0)">
    <path d="M0,57.46875 C203.364583,135.217754 494.835938,156.564108 874.414062,121.507813 C1192.61198,-13.9827666 1541.14063,-35.3291208 1920,57.46875 L1920,207 L0,207 L0,57.46875 Z" opacity=".3"></path>
    <path d="M0,79 C292.46875,165.453125 612.46875,165.453125 960,79 C1307.53125,-7.453125 1627.53125,-7.453125 1920,79 L1920,207 L0,207 L0,79 Z" opacity=".6"></path>
    <path d="M0,89 C288.713542,146.786458 608.713542,146.786458 960,89 C1311.28646,31.2135417 1631.28646,31.2135417 1920,89 L1920,217 L0,217 L0,89 Z"></path>
  </g>
</svg>
		</div>
	</div>
</header>
<section id="howitworks" class="steps-section contract">
		<div class="container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Como funciona<br>nuestra plataforma</h2>
			</div>
			
			<div class="outer-container">
				<div class="row clearfix">
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">1</div>
								<div class="icon-box">
									<img src="/img/step1.svg" alt="step1">
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Registrate</a></h5>
								<div class="gray big-txt">Comienza creando tu cuenta es rapido y gratis!</div>
							</div>
						</div>
					</div>
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">2</div>
								<div class="icon-box">
									<img src="/img/step2.svg" alt="step2">
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Busca tu oferta</a></h5>
								<div class="gray big-txt">Busca la oferta que mejor se adapte a tus necesidades</div>
							</div>
						</div>
					</div>
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">3</div>
								<div class="icon-box">
									<img src="/img/step3.svg" alt="step3">
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Contrata tu oferta</a></h5>
								<div class="gray big-txt">Confirma la oferta, tus datos y tu comisión</div>
							</div>
						</div>
					</div>
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 900ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">4</div>
								<div class="icon-box">
									<img src="/img/step4.svg" alt="step4">
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Gana dinero</a></h5>
								<div class="gray big-txt">En 30 días ingresamos dinero en tu cuenta</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<section class="target" id="target">
		<div class="container">
			<h2 class="text-center">Pensamos en todos! por eso existimos!</h2>
			<div class="row">
				<div class="col-lg-3">
					<a href="/nosotros#targets" class="target-icon">
					<div class="circle">
						<img src="{{ asset('/img/nosotros/particulares.svg') }}" alt="house" />
					</div>
					<h3>Particulares</h3>
					</a>
				</div>
				<div class="col-lg-3">
					<a href="/nosotros#targets" class="target-icon">
					<div class="circle">
						<img src="{{ asset('/img/nosotros/empresas.svg') }}" alt="house" />
					</div>
					<h3>Empresas</h3>
					</a>
				</div>
				<div class="col-lg-3">
					<a href="/nosotros#targets" class="target-icon">
					<div class="circle">
						<img src="{{ asset('/img/nosotros/comunidades.svg') }}" alt="house" />
					</div>
					<h3>Comunidades</h3>
					</a>
				</div>
				<div class="col-lg-3">
					<a href="/nosotros#targets" class="target-icon">
					<div class="circle">
						<img src="{{ asset('/img/nosotros/administradores.svg') }}" alt="house" />
					</div>
					<h3>Administradores</h3>
					</a>
				</div>
			</div>
		</div>
	</section>
<section class="center" id="temporal2">
	<div class="container">
		<h2 class="wow blue  fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">A que esperas para comenzar a ganar dinero y ahorrar en tus suministros?</h2>
		<br>
		<a href="#howitworks" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger">Como funciona?</a> 
		
		@guest
		<a href="#login" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero iniciar">Comenzar</a>
		@else
		<a href="{{ route('indexofertas') }}" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Comenzar</a>
		@endguest
	</div>
	
	
</section>
<section class="testimonial-section">
	<div class="container">
		<!-- Sec Title -->
		<div class="sec-title">
			<h2>Que opinan<br />nuestros usuarios?</h2>
		</div>
	</div>
	<div class="outer-container clearfix">
	<div class="content-column">
		<div class="inner-column">
			<div class="testimonial-carousel owl-carousel owl-theme owl-drag">
				<div class="owl-item" style="width: 550px; margin-right: 90px;">
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="upper-box">
								<div class="upper-inner">
									<div class="image">
										<img src="{{ asset('img/avatar3.jpg') }}" alt="">
									</div>
									<h5>Juan Roman</h5>
									<div class="designation">Particular</div>
								</div>
								<div class="text">Me registre y elegí una tarifa de luz, aparentemente más barata, realice todos los pasos y verdaderamente pago menos.</div>
							</div>
							<div class="quote flaticon-quotations"></div>
						</div>
					</div>
				</div>
				<div class="owl-item" style="width: 550px; margin-right: 90px;">
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="upper-box">
								<div class="upper-inner">
									<div class="image">
										<img src="{{ asset('img/avatar2.png') }}" alt="">
									</div>
									<h5>Andrea Montes</h5>
									<div class="designation">Empresa</div>
								</div>
								<div class="text">Cambiamos los suministros de nuestra comunidad, hicimos el estudio de reducción de costes y ahorramos 525€</div>
							</div>
							<div class="quote flaticon-quotations"></div>
						</div>
					</div>
				</div>
				<div class="owl-item" style="width: 550px; margin-right: 90px;">
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="upper-box">
								<div class="upper-inner">
									<div class="image">
										<img src="{{ asset('img/avatar1.png') }}" alt="">
									</div>
									<h5>Romina Zapata</h5>
									<div class="designation">Particular</div>
								</div>
								<div class="text">Pille una tarifa de móvil más barato que en la tienda y encima me pagaron, cambiare más cosas , lo recomiendo.</div>
							</div>
							<div class="quote flaticon-quotations"></div>
						</div>
					</div>
				</div>
				<div class="owl-item" style="width: 550px; margin-right: 90px;">
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="upper-box">
								<div class="upper-inner">
									<div class="image">
										<img src="{{ asset('img/avatar4.jpg') }}" alt="">
									</div>
									<h5>Lucas Roldan</h5>
									<div class="designation">Administrador de Fincas</div>
								</div>
								<div class="text">Pense que todo era un timo, recibi mi pago a los 20 dias de la contratación. lo recomiendo!</div>
							</div>
							<div class="quote flaticon-quotations"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<div class="reviews-bg"></div>
@endsection
@section('scripts')
<script src="{{ asset('js/owl.js') }}"></script>
<script>

	$(document).ready(function() {

		//?
		$.ajaxSetup({
	    	headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    	}
		});

		// testimonial
		if ($('.testimonial-carousel').length) {
			$('.testimonial-carousel').owlCarousel({
				loop:true,
				margin:90,
				nav:true,
				smartSpeed: 500,
				autoplay: 500,
				navText: [ '<span class="flaticon-left-arrow"><</span>', '<span class="flaticon-next-1">></span>' ],
				responsive:{

					0:{
						items:1,
						margin:30,
						nav: false,
						 singleItem:true,
						 dots:true,
						
					},
					500:{
						items:1,
						margin:30,
						nav: false,
						 singleItem:true,
						 dots:true,
					},
					800:{
						items:1,
						margin:30,
						nav: false,
						 singleItem:true
					},
					1024:{
						items:1,
						margin:30
					},
					1200:{
						items:1
					}
				}
			});  		
		};
	});
 	
</script>

@endsection
