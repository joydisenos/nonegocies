@extends('layouts.master')
@section('content')
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

<section class="contactar" id="contactar">
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
                            <td><a href="{{ route('contratar.oferta' , [$oferta->id , $comision] ) }}">Contratar</a></td>
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

@endsection

