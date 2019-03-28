@extends('layouts.master')
@section('content')
<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
        <h1 class="title-hero fadeInDown animated">Mejores Ofertas disponibles</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
		</div>
		
		<div class="sheader-shape">
			<img src="{{  asset('img/wave.png')}}" alt="Shape">
		</div>
	</div>
</header>
@endsection