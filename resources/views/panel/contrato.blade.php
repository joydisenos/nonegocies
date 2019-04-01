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
                <div class="card">
                        <div class="card-header p-4">
                        
                        <div class="row align-items-center">
                            <div class="col">
                        
                            <!-- Title -->
                            <h4 class="card-header-title">
                                Contrato
                            </h4>

                            </div>

                        </div> <!-- / .row -->

                        </div>
                        <div class="card-body">
                        
                        <div class="row align-items-center">
                            <div class="col">
                                {!! $contrato->contrato !!}
                            </div>
                        </div> <!-- / .row -->

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection
