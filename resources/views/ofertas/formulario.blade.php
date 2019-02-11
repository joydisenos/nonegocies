@extends('layouts.master')
@section('content')
<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
			<h1 class="title-hero fadeInDown animated">Calcula el ahorro de tu próximo servicio en línea</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
		</div>
		
		<div class="sheader-shape">
			<img src="{{  asset('img/wave.png')}}" alt="Shape">
		</div>
	</div>
</header>

<section class="contactar" id="contactar">
	<div class="floating-ball-model-3">
		<span class="floating-ball-1"></span>
		<span class="floating-ball-2"></span>
		<span class="floating-ball-3"></span>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 center">
			<h2 class="wow blue animated fadeInUp">Calculadora de Ahorros</h1>
			<br>
			
			<form class="wow animated fadeInUp" action="{{ route('consultar') }}" method="post">
                                @csrf
            
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
                                    <div class="col">
                                    <label for="persona">Soy</label>
                                    <select name="persona" id="persona" class="special form-control">
                                                <option value="">Seleccione una Opción</option>
                                                <option value="1">Particular</option>
                                                <option value="2">Empresa</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                <div class="col">
                                <label for="tarifa">Tarifa</label>
                                <select name="tarifa" id="tarifa" class="form-control">
                                        <option value="0">tarifa</option>

                                                <option value="1" class="tarifas luz-opt">2.0A</option>
                                                <option value="2" class="tarifas luz-opt">2.0ADH</option>
                                                <option value="3" class="tarifas luz-opt">2.1A</option>
                                                <option value="4" class="tarifas luz-opt">2.1ADH</option>
                                                <option value="5" class="tarifas luz-opt">3.0A</option>
                                                <option value="6" class="tarifas luz-opt">3.1A</option>

                                                <option value="7" class="tarifas gas-opt">3.1</option>
                                                <option value="8" class="tarifas gas-opt">3.2</option>
                                                <option value="9" class="tarifas gas-opt">3.3</option>
                                                <option value="10" class="tarifas gas-opt">3.4</option>
                                        </select>
                                </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                            <label>Potencia</label>
                                    </div>
                               </div>

                                <div class="row mb-4">
                                
                                        <div class="col">
                                                <input class="special form-control" type="number" name="pp1" min="0" step="any" placeholder="P1" required>
                                        </div>
                                        <div class="col">
                                                <input class="special form-control" type="number" name="pp2" min="0" step="any" placeholder="P2" required>
                                        </div>
                                        <div class="col">
                                                <input class="special form-control" type="number" name="pp3" min="0" step="any" placeholder="P3" required>
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                            <label>Energía</label>
                                    </div>
                               </div>

                                <div class="row mb-4">
                                
                                        <div class="col">
                                                <input class="special form-control" type="number" name="ep1" min="0" step="any" placeholder="P1" required>
                                        </div>
                                        <div class="col">
                                                <input class="special form-control" type="number" name="ep2" min="0" step="any" placeholder="P2" required>
                                        </div>
                                        <div class="col">
                                                <input class="special form-control" type="number" name="ep3" min="0" step="any" placeholder="P3" required>
                                        </div>
                                </div>

                                <div class="row mb-4">

                                        <div class="col">
                                        <label for="monto">Monto</label>
                                                <input class="special form-control" type="number" name="monto" min="0" step="any" placeholder="Monto Facturado" required>
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
		<div class="col-md-3"></div>
		</div>
	</div>
</section>

@endsection

