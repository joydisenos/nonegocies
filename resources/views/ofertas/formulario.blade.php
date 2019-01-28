@extends('layouts.master')
@section('content')
<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Calculadora</h1>
	<p class="animated fadeInDown">Encuentra las mejores ofertas de sus servicios.</p>
	</div>
</header>
<section class="gray">
	<div class="container">
			<form class="wow animated fadeInUp" action="{{ route('consultar') }}" method="post">
                    @csrf
                    <h2>Calculadora de Ahorros</h2>

                    <div class="row mb-4">
                        <div class="col">
                                <label>Seleccione el servicio</label>

                                <select name="servicio" id="servicio" class="special form-control">
                                    <option>Seleccione un Servicio</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{ title_case($categoria->nombre) }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                            <div class="col">
                                    <label>Indíquenos el monto de su servicio actual</label>
                                    <input class="special form-control" type="number" name="monto" min="0" step="0.1" placeholder="Monto Facturado" required>
                            </div>
                    </div>

                   <div class="row">
                        <div class="col">
                                <label>Período de Tiempo</label>
                        </div>
                   </div>
                    
                    <div class="row">
                        <div class="col">
                                <label for="">Desde</label>
                                <input class="special form-control" type="date" name="desde" placeholder="Desde" required>
                        </div>
                        <div class="col">
                                <label for="">Hasta</label>
                                <input class="special form-control" type="date" name="hasta" placeholder="Hasta" required>
                        </div>
                    </div>
                    
                    <input id="submitBtn" class="btn btn-outline-light btn-lg submit-contactar" type="submit" value="Consultar">
                </form>
	</div>
</section>
@endsection