@extends('layouts.master')
@section('header')
<style>
	#signature{
		border: solid medium #ececec;
		box-shadow: 0px 0px 20px rgba(0,0,0,0.4);
		margin: 20px;
	}
</style>
@endsection
@section('content')
<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">No Negocies</h1>
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
<section>
	<div class="container">
		<h2 class="center">Muchas Gracias!</h2>

		@if($finalizar == 1)

		<h4>Genere su firma electrónica:</h4>

		<br>

		<div id="signature"></div>

		@elseif($finalizar == 2)

		<h4>Le enviaremos un mensajero para que firme su contrato, en breve nos pondremos en contacto</h4>


		@elseif($finalizar == 3)

		<h4>Para completar su solicitud, Debe enviar los siguientes recaudos vía Email</h4>

		<ul>
			<li>Recaudo 1</li>
			<li>Recaudo 2</li>
			<li>Recaudo 3</li>
			<li>Recaudo 4</li>
		</ul>

		@elseif($finalizar == 4)

		<h4>Nos pondremos en contacto en breve vía telefónica para concretar la contratación</h4>

		

		@endif

		
		<br>
		<hr>
		<br>
		
</section>
@endsection
@section('scripts')
<script src="{{ asset('js/jSignature.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#signature").jSignature()
    })
</script>
@endsection