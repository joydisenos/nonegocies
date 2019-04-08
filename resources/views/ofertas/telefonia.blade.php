@extends('layouts.master')
@section('header')
<style>
	.card{
		transition: all ease .5s;
	}

	.card:hover{
		box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.4);
		transform: translateY(-5px);
	}
</style>
@endsection
@section('content')
<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
        <h1 class="title-hero fadeInDown animated">Mejores Ofertas en Telefonía</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
		</div>
		
		<div class="sheader-shape">
			<img src="{{  asset('img/wave.png')}}" alt="Shape">
		</div>
	</div>
</header>

<div class="container mt-4">
	@foreach($ofertas->chunk(3) as $row)
	<div class="row mb-4">
	@foreach($row as $oferta)
		<div class="col-md-4">
			<div class="card">
				<div class="card-header text-center">
				{{ title_case($oferta->nombre) }}
				</div>
				<div class="card-body">
					@if($oferta->opcion->subtitulo_telefonia != null)
				<h5 class="card-title">{{ title_case($oferta->opcion->subtitulo_telefonia) }}</h5>
					@endif
				<div class="row">
					@if($oferta->opcion->precio_telefonia != null)
					<div class="col-6">
					<h6>Precio: {{ $oferta->opcion->precio_telefonia }} €</h6>
					</div>
					@endif
					@if($oferta->opcion->movil_telefonia != null)
					<div class="col-6">
					<h6>Móvil: {{ $oferta->opcion->movil_telefonia }} €</h6>
					</div>
					@endif
					@if($oferta->opcion->fijo_telefonia != null)
					<div class="col-6">
					<h6>Fijo: {{ $oferta->opcion->fijo_telefonia }} €</h6>
					</div>
					@endif
					@if($oferta->opcion->internet_telefonia != null)
					<div class="col-6">
					<h6>Internet: {{ $oferta->opcion->internet_telefonia }} €</h6>
					</div>
					@endif
					@if($oferta->opcion->tv_telefonia != null)
					<div class="col-6">
					<h6>TV: {{ $oferta->opcion->tv_telefonia }} €</h6>
					</div>
					@endif
				</div>
				<p class="card-text">{{ $oferta->descripcion }}</p>
					<div class="text-center">
							<a href="#" class="btn btn-primary">Contratar</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
	@endforeach
</div>
@endsection