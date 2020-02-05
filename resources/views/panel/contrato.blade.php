@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="/css/user.css">
@endsection
@section('content')
<header class="page">
    <div class="container">
        <h2 class="center blue fadeIn text-center animated">Detalles de Contratación</h2>
        <p class="text-center">Recuerda contactarnos ante cualquier duda<br />sobre tus contratos o servicios</p>
    </div>
</header>
<section class="contract">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.nav-panel')
            </div>
            <div class="col-md-9">
                <div class="card panel">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                
                                @if($contrato->oferta->empresa->pdf)
                                <embed src="{{ asset('storage/'.$contrato->oferta->empresa->pdf) }}" type="application/pdf" width="100%" height="600px" />
                                @else
                                <h4>No disponible</h4>
                                @endif


                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col text-center">
                                {!! $contrato->firma !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection