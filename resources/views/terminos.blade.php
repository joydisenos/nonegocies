@extends('layouts.master')
@section('content')
<style>
	p{
		font-size: 13px !important;
	    color: dimgray !important;
	    line-height: 1.5 !important
	}
</style>
<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Términos y Condiciones</h1>
	<p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
	</div>
</header>
<section class="gray">
	<div class="container">
			{!! $legal !!}
	</div>
</section>
@endsection