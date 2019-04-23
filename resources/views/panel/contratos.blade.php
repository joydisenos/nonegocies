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
                            Contratos de {{ title_case(Auth::user()->name) }}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">                       
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Oferta</th>
                                        <th>Fecha</th>
                                        <th>Contrato</th>
                                        <th>Estatus</th>
                                    </thead>
                                    <tbody>
                                        @foreach($contratos as $contrato)
                                        <tr>
                                            <td>
                                                {{ $contrato->oferta->descripcion }}
                                            </td>
                                            <td>
                                                {{ $contrato->created_at->format('d/m/y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('ver.contrato', [$contrato->id]) }}">Ver Contrato</a>
                                            </td>
                                            <td>
                                                @if($contrato->estatus == 1)
                                                Por procesar
                                                @elseif($contrato->estatus == 2)
                                                Aprobado
                                                @elseif($contrato->estatus == 0)
                                                Negado
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection