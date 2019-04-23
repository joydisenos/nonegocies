@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="/css/user.css">
@endsection
@section('content')
<header class="page">
	<div class="container">
	   <h1 class="animated fadeInLeft">Mis Contratos</h1>
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
                            
                            <h4 class="card-header-title">
                            Contrato
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            {!! $contrato->contrato !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection