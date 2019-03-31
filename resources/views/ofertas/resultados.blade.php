@extends('layouts.master')
@section('content')
<style>
	.oculto{
		display:none;
	}
</style>
<header class="masthead" id="hero">
	<div class="overlay"></div>
	<div class="container d-flex h-100 align-items-center">
		<div class="hero-text">
        <h1 class="title-hero fadeInDown animated">Mejores Ofertas de {{ title_case($categoria->nombre) }} disponibles</h1>
			<h2 class="subtitle-hero fadeInRight animated">Te damos la comisión de venta por cada contratación de servicio en nuestra web</h2>
		</div>
		
		<div class="sheader-shape">
			<img src="{{  asset('img/wave.png')}}" alt="Shape">
		</div>
	</div>
</header>

<section class="resultados" id="resultados">
	<div class="floating-ball-model-3">
		<span class="floating-ball-1"></span>
		<span class="floating-ball-2"></span>
		<span class="floating-ball-3"></span>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 center">
			<div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <th>Empresa</th>
                        <!--<th>Oferta</th>-->
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Ganas desde</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($ofertas as $oferta)
                        <tr>
                            <td><img src="{{ ($oferta->empresa->logo) ? asset('storage/'. $oferta->empresa->logo) : asset('img/nonegocies.png')}}" style="max-width:100px;" class="img-fluid" alt="Logo {{$oferta->empresa->nombre}}"></td>
                            <!--<td>{{ title_case($oferta->nombre) }} </td>-->
                            <td>{{ $oferta->descripcion }}</td>
                            <td> {{ number_format( ($oferta->totalgeneral) , 2 , ',' , '.') }} € </td>
							@guest
							<td>{{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
							<?php $comision = $oferta->comision * ($oferta->plan1 / 100); ?>
							</td>
							@else
								@if(Auth::user()->plan_id == null)
								<td>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan1 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan1 / 100);  ?>
								</td>
								@elseif(Auth::user()->plan_id == 2)
								<td>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan2 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan2 / 100);  ?>
								</td>
								@elseif(Auth::user()->plan_id == 3)
								<td>Ganas desde: {{ number_format( ($oferta->comision * ($oferta->plan3 / 100)) , 2 , ',' , '.') }} €
								<?php $comision = $oferta->comision * ($oferta->plan3 / 100);  ?>
								</td>
								@endif
							@endguest
							<td><a class="btn-contratar" 

								data-id="{{ $oferta->id }}"
								data-titulo="{{ title_case($oferta->titulo) }}"
								data-descripcion="{{ $oferta->descripcion }}"
								data-comision="{{ $comision }}"
								data-pp1="{{ $oferta->opcion->pp1 }}" 
								data-pp2="{{ $oferta->opcion->pp2 }}" 
								data-pp3="{{ $oferta->opcion->pp3 }}"
								data-ep1="{{ $oferta->opcion->ep1 }}" 
								data-ep2="{{ $oferta->opcion->ep2 }}" 
								data-ep3="{{ $oferta->opcion->ep3 }}"
								data-total="{{ number_format( ($oferta->totalgeneral) , 2 , ',' , '.') }}"

								href="{{ route('contratar.oferta' , [$oferta->id , $comision] ) }}">Contratar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
		</div>
		<div class="col-md-1"></div>
		</div>
	</div>
</section>

<section class="oculto" id="luz-oferta">
<div class="floating-ball-model-3">
		<span class="floating-ball-1"></span>
		<span class="floating-ball-2"></span>
		<span class="floating-ball-3"></span>
	</div>
	<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 center">
			<div class="text-left">
					<a href="#" class="btn btn-primary p-1 mb-3" id="btn-atras">&larr; Atras</a>
			</div>
			<h4 id="titulo">Título de la oferta</h4>

			<p id="descripcion"></p>

			<hr>

			<div class="row"> 
				<div class="col">
					<div class="text-right mt-2 mb-2">
						<h5>Precio aproximado: <span id="precio"></span>€</h5>

						<h5>Ganas desde: <span id="comision"></span>€</h5>
					</div>
				</div>
			</div>

			<hr>

			<h5>Potencia</h5>
			<div class="row">
				<div class="col">
					<strong>P1:</strong> <span id="pp1"> €</span>
				</div>
				<div class="col">
					<strong>P2:</strong> <span id="pp2"> €</span>
				</div>
				<div class="col">
					<strong>P3:</strong> <span id="pp3"> €</span>
				</div>
			</div>

			<hr>

			<h5>Energía</h5>
			<div class="row mb-3">
				<div class="col">
					<strong>P1:</strong> <span id="ep1"> €</span>
				</div>
				<div class="col">
					<strong>P2:</strong> <span id="ep2"> €</span>
				</div>
				<div class="col">
					<strong>P3:</strong> <span id="ep3"> €</span>
				</div>
			</div>

			
	
			@guest
			@else
			<form action="{{ route('contratar.oferta') }}" method="post">
				@csrf
				<input type="hidden" name="oferta_id" value="" id="oferta_id">
				<input type="hidden" name="comision" value="" id="comision_input">
				
				@if(Auth::user()->tarjetas->first() == null || Auth::user()->cup_luz == null)
				<div class="card mt-3 mb-3">
					<div class="card-header p-4">
						<div class="row align-items-center">
						<div class="col">
							<!-- Title -->
							<h4 class="card-header-title">
							Datos Requeridos para contratar
							</h4>
						</div>
						
						</div>
					</div>
					
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								
								<tbody>
								@if(Auth::user()->cup_luz == null)
								<tr>
									<td width="40%">CUP</td>
									<td>
										<input type="text" name="cup" value="" class="form-control" required>
									</td>
								</tr>
								@endif

								@if(Auth::user()->tarjetas->first() == null)
								<tr>
									<td width="40%">
										Tarjeta
									</td>
									<td>
										<input type="text" class="form-control" value="" name="tarjeta" required>
									</td>
								</tr>
							
								<tr>
									<td>
									Código de Seguridad (CVV)
									</td>
									<td>
									<input type="number" min="0" class="form-control" value="" name="cvv" required>
									</td>
								</tr>
							
								<tr>
									<td>
									Vence
									</td>
									<td>
									<input type="text" class="form-control" value="" name="vence" required>
									</td>
								</tr>
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				@endif

				<button type="submit" class="btn btn-primary mt-4" id="contratar">Contratar</button>
		</form>
			@endguest

			

		</div>
		<div class="col-md-1"></div>
		</div>
	</div>

	
</section>

@endsection

@section('scripts')
<script>
	$(document).ready(function(){

		$('#btn-atras').click(function(event){
			event.preventDefault();
			$('#luz-oferta').hide();
			$('#resultados').show();
		});

		$('.btn-contratar').click(function(event){
			event.preventDefault();
			link = $(this).attr('href');
			titulo = $(this).data('titulo');
			descripcion = $(this).data('descripcion');
			comision = $(this).data('comision');
			pp1 = $(this).data('pp1');
			pp2 = $(this).data('pp2');
			pp3 = $(this).data('pp3');
			ep1 = $(this).data('ep1');
			ep2 = $(this).data('ep2');
			ep3 = $(this).data('ep3');
			total = $(this).data('total');
			ofertaId = $(this).data('id');

			$('#contratar').attr('href' , link);
			$('#oferta_id').val(ofertaId);
			$('#titulo').text(titulo);
			$('#descripcion').text(descripcion);
			$('#comision').text(comision);
			$('#comision_input').val(comision);
			$('#pp1').text(pp1);
			$('#pp2').text(pp2);
			$('#pp3').text(pp3);
			$('#ep1').text(ep1);
			$('#ep2').text(ep2);
			$('#ep3').text(ep3);
			$('#precio').text(total);

			$('#resultados').hide();
			$('#luz-oferta').show();

		});
	});
</script>
@endsection
