@extends('layouts.master')
@section('content')
<style>
	

section{
	    box-sizing: border-box;
	    overflow: hidden;
	    position: relative
}
</style>

<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Mis Contratos</h1>
<!--   <p class="animated fadeInDown">Bienvenido {{ title_case(Auth::user()->name) }}, Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p> -->
	</div>
</header>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-3">
            @include('includes.nav-panel')
        </div>
        <div class="col-md-9" style="min-height: 500px">
            Listado de sercicios contratados y contratos de cada suministro.
        </div>
    </div>
</div>


@endsection
