@extends('layouts.master')
@section('content')
<style>p{font-size: 13px !important;color: dimgray !important;line-height: 1.5 !important}</style>
<header class="page">
  <div class="container">
    <h2 class="center wow blue fadeIn text-center  animated">Términos y Condiciones</h1>
    <p class="text-center">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
  </div>
</header>
<section>
	<div class="container">
			{!! $legal !!}
	</div>
</section>
@endsection