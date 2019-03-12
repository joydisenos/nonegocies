@extends('layouts.master')
@section('content')
<style>

/*reset*/
	
section{
	    box-sizing: border-box;
	    overflow: hidden;
	    position: relative
}


/* how it works */

.service-number {
    color: #d61e1e !important;
}

.icon-box {
    background-image: linear-gradient(to right, #133871 0%, #5d6f9a 100%);
}

.steps-section{
	position:relative;
	padding-top:30px;
	padding-bottom:60px;
}

.steps-section .outer-container{
	position:relative;
	margin-top: 50px;
	margin-bottom:180px;
	z-index: 999999999999999;
}

.steps-section .outer-container:before{
	position:absolute;
	content:'';
	left:0px;
	top:70px;
	width:100%;
	height:91px;
	background:url({{ asset('/img/pattern-1.png') }}) center top no-repeat;
}

.steps-section .outer-container .services-block-two:nth-child(2),
.steps-section .outer-container .services-block-two:nth-child(4){
	margin-top:70px;
}

.services-block-two{
	position:relative;
	margin-bottom:40px;
}

.services-block-two .inner-box{
	position:relative;
	text-align:center;
}

.services-block-two .inner-box .icon-outer{
	position:relative;
	display:inline-block;
}

.services-block-two .inner-box .icon-outer .icon-box{
	position:relative;
	width:135px;
	height:135px;
	color:#ffffff;
	text-align:center;
	border-radius:50%;
	line-height:132px;
	font-size:62px;
	background-color:#d3dde8;
	box-shadow: inset 0 0 10px rgba(0,0,0,0.20);
}

.services-block-two .inner-box .icon-outer .icon-box .icon{
	position:relative;
}

.services-block-two .inner-box .icon-outer .icon-box:before{
	position:absolute;
	content:'';
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	display:block;
	opacity:0;
	border-radius:50%;
	transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-webkit-transition:all 0.3s ease;
	-ms-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;
	box-shadow:inset 0 0 15px rgba(0,0,0,0.20);
	background-image: -ms-linear-gradient(left, #FF8441 0%, #f53d96 100%) !important;
	background-image: -moz-linear-gradient(left, #FF8441 0%, #f53d96 100%) !important;
	background-image: -o-linear-gradient(left, #FF8441 0%, #f53d96 100%) !important;
	background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #FF8441), color-stop(100, #f53d96)) !important;
	background-image: -webkit-linear-gradient(left, #FF8441 0%, #f53d96 100%) !important;
	background-image: linear-gradient(to right, #FF8441 0%, #f53d96 100%) !important;
}

.services-block-two .inner-box:hover .icon-outer .icon-box:before{
	opacity:1;
}

.services-block-two .inner-box .lower-box{
	position:relative;
	margin-top:30px;
}

.services-block-two .inner-box .lower-box h5{
	position:relative;
	font-weight:700;
	line-height:1.3em;
	margin-bottom:14px;
	text-transform: uppercase;
}

.services-block-two .inner-box .lower-box h5 a{
	position:relative;
	color:#FF034C;
	transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-webkit-transition:all 0.3s ease;
	-ms-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;

}

.services-block-two .inner-box .lower-box h5 a:hover{
	color:#fe8045;
}

.services-block-two .inner-box .lower-box .text{
	position:relative;
	color:#555555;
	font-size:14px;
	line-height:2em;
	margin-bottom:14px;
	padding:0px 20px;
}

.services-block-two .inner-box .lower-box .contact{
	position:relative;
	font-size:13px;
	font-weight:600;
	text-transform:uppercase;
	font-family: 'Poppins', sans-serif;
    color: #f23e9d;
	letter-spacing:1px;
    background: linear-gradient(to top, #fb8460 0%, #f13aa1 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.inner-box .icon-outer .service-number {
    position: absolute;
    left: -45px;
    top: -20px;
    line-height: 1em;
    color: #e3ecf6;
    font-size: 100px;
    font-weight: 700;
    text-align: center;
    background-color: #e3ecf6;
    color: transparent;
    text-shadow: 2px 2px 3px rgba(255,255,255,0.5);
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
}

.inner-box:hover .icon-outer .service-number {
    color: #eb2f5b;
}

.sec-title.centered {
    text-align: center;
    padding: 70px 0 30px 0; 
}

/* targets */

#howitworks:after{
	position: absolute;
    content: "";
    width: 100%;
    height: 1000px;
    background: url({{ asset('/svg/red_curve.svg') }}) no-repeat center bottom;
    bottom: 0;
    left: 0;
    background-size: 100%;
}



#temporal2:before{
	position: absolute;
    content: "";
    width: 100%;
    height: 1000px;
    background: url({{ asset('/svg/red_curve_bottom.svg') }}) no-repeat center top;
    top: 0;
    left: 0;
    background-size: 100%;
}

.col-lg-4.wow.featured.fadeInUp.animated {
    z-index: 999;
}


.target{
	background: #e73747!important;
	padding:0;

}

.white{
	color:white !important;
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
	padding-top: 20px;
}

/* testimonial */


.testimonial-section{
	position:relative;
	overflow: visible;
}

.testimonial-section .image-layer{
	position:absolute;
	content:'';
	left:0px;
	top:160px;
	width:651px;
	height:593px;
}

.testimonial-section .outer-container{
	position:relative;
	min-height:250px;
}

.testimonial-section .image-column{
	position:absolute;
	left:0px;
	top:0px;
	width:40%;
	height:100%;
	z-index:1;
	background-repeat:no-repeat;
	background-position:right top;
	background-size:cover;	
}

.testimonial-section .image-column .image-box{
	position:relative;
}

.testimonial-section .image-column .image-box img{
	position:relative;
	display:block;
	width:100%;
}

.testimonial-section .content-column{
	position:relative;
	float:right;
	width:60%;
}

.testimonial-section .content-column:before{
	position:absolute;
	content:'';
	right:0px;
	top:-340px;
	width:1114px;
	height:1121px;
	display:inline-block;
	background:url({{ asset('/img/image-2.png') }}) no-repeat;
}

.testimonial-section .content-column .inner-column{
	position:relative;
	overflow:hidden;
	padding:65px 15px 50px 70px;
}

.testimonial-section .content-column .inner-column .testimonial-carousel{
	max-width:550px;
	width:100%;
}

.testimonial-section .content-column .inner-column .owl-stage-outer{
	overflow:visible;
}

.testimonial-section .owl-dots{
	position: relative;
	display: none;
}

.testimonial-section .owl-nav{
	position:relative;
	margin-top: 50px;
}

.testimonial-section .owl-nav .owl-prev,
.testimonial-section .owl-nav .owl-next{
	position: relative;
    width: 60px;
    height: 60px;
    bottom: 50%;
    color: #ffffff;
    background: none;
    z-index: 10;
	display: inline-block;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    line-height: 60px;
	margin-right:20px;
	overflow:hidden;
    border-radius: 50px;
    background-color: rgba(255,255,255,0.30);
    transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
	box-shadow:0px 10px 20px rgba(0,0,0,0.35);
}

.testimonial-section .owl-nav .owl-prev span,
.testimonial-section .owl-nav .owl-next span{
	position:relative;
	z-index:1;
}

.testimonial-section .owl-nav .owl-prev:before,
.testimonial-section .owl-nav .owl-next:before{
	position:absolute;
	content:'';
	left:0px;
	top:0px;
	width:0px;
	height:100%;
	transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
	background-image: -ms-linear-gradient(left, #FF8442 0%, #f4369e 100%);
	background-image: -moz-linear-gradient(left, #FF8442 0%, #f4369e 100%);
	background-image: -o-linear-gradient(left, #FF8442 0%, #f4369e 100%);
	background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #FF8442), color-stop(100, #f4369e));
	background-image: -webkit-linear-gradient(left, #FF8442 0%, #f4369e 100%);
	background-image: linear-gradient(to right, #FF8442 0%, #f4369e 100%);
}

.testimonial-section .owl-nav .owl-prev:hover::before,
.testimonial-section .owl-nav .owl-next:hover::before{
	width:100%;
}

.testimonial-block{
	position:relative;
}

.testimonial-block .inner-box{
	position:relative;
	padding:50px 70px 80px;
	border-radius:8px;
	background-color:#ffffff;
	box-shadow:0px 10px 25px rgba(0,0,0,0.35);
}

.testimonial-block .inner-box .upper-box{
	position:relative;
}

.testimonial-block .inner-box .upper-box .upper-inner{
	position:relative;
	padding-top:15px;
	min-height:85px;
	padding-left:110px;
}

.testimonial-block .inner-box .upper-box .upper-inner .image{
	position:absolute;
	left:0px;
	top:0px;
	width:85px;
	height:85px;
	padding:5px;
	overflow:hidden;
	border-radius:50%;
	background-color:#ffffff;
	box-shadow:2px 4px 6px 2px rgba(249,98,105,0.10);
}

.testimonial-block .inner-box .upper-box .upper-inner h5{
	position:relative;
	font-weight:700;
	color:#222222;
	line-height:1.3em;
}

.testimonial-block .inner-box .upper-box .upper-inner .designation{
	position:relative;
	margin-top:2px;
	color:#999999;
	font-size:16px;
}

.testimonial-block .inner-box .text{
	position:relative;
	color:#555555;
	font-size:16px;
	line-height:1.9em;
	margin-top:30px;
}

.testimonial-block .inner-box .quote{
	position:absolute;
	right:60px;
	bottom:40px;
	font-size:46px;
	line-height:1em;
	color:#e7e7e7;
}

.owl-carousel .owl-item img{
	border-radius:100%;
}

.testimonial-section .sec-title {top: -100px;position: absolute;}

.testimonial-section .sec-title h2{color: #ef1114}

/*test*/

.sec-title h2 {
	font-family: 'Cera';
    letter-spacing: -2px;
    color: #133273;
    font-weight: bold;
    position: relative;
    line-height: 1.2em;
    padding-bottom: 20px;
    font-size: 50px;
}
</style>
<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
			<h1 class="title-hero fadeInDown animated">Te pagamos por ahorrar en tus facturas</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
			<a href="#howitworks" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger">Como funciona?</a> <a href="#login" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Comenzar</a>
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
			<svg style="fill:white;" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="217" viewBox="0 0 1920 217">
  <g fill-rule="evenodd" transform="matrix(-1 0 0 1 1920 0)">
    <path d="M0,57.46875 C203.364583,135.217754 494.835938,156.564108 874.414062,121.507813 C1192.61198,-13.9827666 1541.14063,-35.3291208 1920,57.46875 L1920,207 L0,207 L0,57.46875 Z" opacity=".3"></path>
    <path d="M0,79 C292.46875,165.453125 612.46875,165.453125 960,79 C1307.53125,-7.453125 1627.53125,-7.453125 1920,79 L1920,207 L0,207 L0,79 Z" opacity=".6"></path>
    <path d="M0,89 C288.713542,146.786458 608.713542,146.786458 960,89 C1311.28646,31.2135417 1631.28646,31.2135417 1920,89 L1920,217 L0,217 L0,89 Z"></path>
  </g>
</svg>
		</div>
	</div>
</header>
<section id="howitworks" class="steps-section">
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
									<span class="icon flaticon-start"></span>
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Registrate</a></h5>
								<div class="text">Comienza creando tu cuenta es rapido y gratis!</div>
								<!-- <a class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger" href="#">Crear cuenta</a> -->
							</div>
						</div>
					</div>
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">2</div>
								<div class="icon-box">
									<span class="icon flaticon-target"></span>
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Busca tu oferta</a></h5>
								<div class="text">Busca la oferta que mejor se adapte a tus necesidades</div>
								<!-- <a class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger" href="#">Ofertas</a> -->
							</div>
						</div>
					</div>
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">3</div>
								<div class="icon-box">
									<span class="icon flaticon-hand-shake-1"></span>
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Contrata tu oferta</a></h5>
								<div class="text">Confirma la oferta, tus datos y tu comisión</div>
								<!-- <a class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger" href="#">Mis contratos</a> -->
							</div>
						</div>
					</div>
					
					<!-- Services Block Two -->
					<div class="services-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 900ms; animation-name: fadeInUp;">
							<div class="icon-outer">
								<div class="service-number">4</div>
								<div class="icon-box">
									<span class="icon flaticon-money-bag"></span>
								</div>
							</div>
							<div class="lower-box">
								<h5><a href="#">Gana dinero</a></h5>
								<div class="text">en 30 dias ingresamos dinero en tu cuenta</div>
								<!-- <a class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger" href="#">Ver pagos</a> -->
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
<section class="target" id="target">
	<div class="container">
		<h2 class="white text-center">Titulo para los targets</h2>
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
<section style="height: 900px;padding-top: 300px;text-align: center;" id="temporal2">
	<div class="container">
		<h2 class="wow blue  fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">A que esperas para comenzar a ganar dinero y ahorrar en tus suministros?</h2>
		<br>
		<a href="#howitworks" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger">Como funciona?</a> <a href="#login" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Comenzar</a>
	</div>
	
	
</section>
<section class="testimonial-section">
	<div class="container">
		<!-- Sec Title -->
		<div class="sec-title">
			<h2>Que opinan los usuarios<br> sobre nuestro servicio</h2>
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
										<img src="{{ asset('img/avatar.jpg') }}" alt="">
									</div>
									<h5>Frederic Anderson</h5>
									<div class="designation">President</div>
								</div>
								<div class="text">Cookies are set through this site to recognise your repeat visits and preferences, serve more relevant ads, facilitate social sharing, and to  violanalyse traffic. </div>
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
										<img src="{{ asset('img/avatar.jpg') }}" alt="">
									</div>
									<h5>Andreu laclau</h5>
									<div class="designation">President</div>
								</div>
								<div class="text">Cookies are set through this site to recognise your repeat visits and preferences, serve more relevant ads, facilitate social sharing, and to  violanalyse traffic. </div>
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
										<img src="{{ asset('img/avatar.jpg') }}" alt="">
									</div>
									<h5>Frederic Anderson</h5>
									<div class="designation">President</div>
								</div>
								<div class="text">Cookies are set through this site to recognise your repeat visits and preferences, serve more relevant ads, facilitate social sharing, and to  violanalyse traffic. </div>
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
										<img src="{{ asset('img/avatar.jpg') }}" alt="">
									</div>
									<h5>Frederic Anderson</h5>
									<div class="designation">President</div>
								</div>
								<div class="text">Cookies are set through this site to recognise your repeat visits and preferences, serve more relevant ads, facilitate social sharing, and to  violanalyse traffic. </div>
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
</section>
<!-- end prices -->



@endsection
@section('scripts')
<script src="{{ asset('js/owl.js') }}"></script>
<script>
$(document).ready(function() {

	// tabs

	$(".tab-slider--body").hide();
  	$(".tab-slider--body:first").show();

	$(".tab-slider--nav li").click(function() {
  		
  		$(".tab-slider--body").hide();
  		var activeTab = $(this).attr("rel");
  		$("#"+activeTab).fadeIn();
		if($(this).attr("rel") == "tab2"){
			$('.tab-slider--tabs').addClass('slide');
		}else{
			$('.tab-slider--tabs').removeClass('slide');
		}
  		$(".tab-slider--nav li").removeClass("active");
  		$(this).addClass("active");

	});
	

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

	// legal stuff before send
    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn").removeAttr("disabled");
        } else {
            $("#submitBtn").attr("disabled", "disabled");
        }
    });

		
	});

	// testimonial
	if ($('.testimonial-carousel').length) {
		$('.testimonial-carousel').owlCarousel({
			loop:true,
			margin:90,
			nav:true,
			smartSpeed: 500,
			autoplay: 500,
			navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-next-1"></span>' ],
			responsive:{
				0:{
					items:1,
					margin:30
				},
				600:{
					items:1,
					margin:30
				},
				800:{
					items:1,
					margin:30
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
	}

</script>

@endsection
