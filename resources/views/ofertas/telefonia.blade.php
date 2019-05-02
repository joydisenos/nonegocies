@extends('layouts.master')
@section('header')
<style>
	.card{transition: all ease .5s;}
	.card:hover{box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.4);transform: translateY(-5px);}
	.card:hover button{background: #133273;}
	.card-header.text-center {background: #e94048;padding: 10px 0;color: white;}
	.img-company {display: block;text-align: center;margin: 0 auto;border-radius: 100%;max-width:100px;}
	h5.card-title {text-align: center;padding-top: 10px;}
	h2.price {text-align: center;display: block;margin: 0 auto;}
	p.card-text {text-align: center;color: #585858;padding-bottom: 30px;}
	img.icon-txt {max-width: 25px;margin-right: 20px;}
	.ocultar{display: none}
	section#form-contactar {background: #393975 url(/img/bg-hero-page.svg) repeat;}
	.col-md-6.center {display: block;margin: 0 auto;}
	form#contactar-reg{background: white;}
	section.telefonia{padding-bottom: 40px;padding-top:0px;}
	.title{padding:40px 0;}
</style>
@endsection
@section('content')
<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Telefonía</h1>
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
<div class="title">
</div>
<section class="telefonia">
<div class="container mt-4">
	<div class="row mb-4">
		<div class="col-9 text-right">
			<h6 class="p-2">Buscar por Categoría</h6>
		</div>
		<div class="col-3">
			<select class="categorias form-control">
								<option value="0">Seleccione una categoría</option>
								<option value="1">Internet sin Fijo</option>
	                            <option value="2">Internet + Fijo</option>
	                            <option value="3">Tarifa Móvil Contrato</option>
	                            <option value="4">Internet + Fijo + TV</option>
	                            <option value="5">Internet + Fijo + Tarifa Móvil</option>
	                            <option value="6">Internet + Fijo + Tarifa Móvil + TV</option>
	                            <option value="7">Tarifa Móvil Prepago</option>
	                            <option value="8">Tarifa Móvil Prepago</option>
	                            <option value="9">Internet + Fútbol</option>
	                            <option value="10">Internet + Tarifa Móvil</option>
			</select>
		</div>
	</div>
	@foreach($ofertas->chunk(3) as $row)
	<div class="row mb-4">
	@foreach($row as $oferta)
		<div class="col-md-4 filtrar cat-{{ $oferta->opcion->categoria_telefonia }}">
			<div class="card">
				<div class="card-header text-center">
				{{ title_case($oferta->nombre) }}
				</div>
				<div class="card-body">

				<img src="{{ ($oferta->empresa->logo) ? asset('storage/'. $oferta->empresa->logo) : asset('img/nonegocies.png')}}" class="img-company" alt="Logo {{$oferta->empresa->nombre}}">

					@if($oferta->opcion->subtitulo_telefonia != null)
				<h5 class="card-title">{{ title_case($oferta->opcion->subtitulo_telefonia) }}</h5>
					@endif

			
				
					@if($oferta->opcion->precio_telefonia != null)
					<h2 class="price">{{ number_format($oferta->opcion->precio_telefonia , 2) }} €</h2>
					@endif

					<p class="card-text">{{ $oferta->descripcion }}</p>

					@if($oferta->opcion->movil_telefonia != null)
					<img src="/img/telefonia/movil.svg" class="icon-txt"> 
					<span>{{ $oferta->opcion->movil_telefonia }}</span>
					<hr>
					@endif
					
					@if($oferta->opcion->fijo_telefonia != null)
					<img src="/img/telefonia/fijo.svg" class="icon-txt">
					<span>{{ $oferta->opcion->fijo_telefonia }}</span>
					<hr>
					@endif

					@if($oferta->opcion->internet_telefonia != null)
					<img src="/img/telefonia/internet.svg" class="icon-txt">
					<span>{{ $oferta->opcion->internet_telefonia }}</span>
					<hr>
					@endif

					@if($oferta->opcion->tv_telefonia != null)
					<img src="/img/telefonia/tv.svg" class="icon-txt"> 
					<span>{{ $oferta->opcion->tv_telefonia }}</span>
					<hr>
					@endif
				
					<div class="text-center">
							<button href="#form-contactar" class="btn btn-white step" rel="Telefonía: oferta de {{$oferta->empresa->nombre}}">Contratar</button>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
	@endforeach
</div>
</section>
<section class="ocultar" id="form-contactar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 center">
				<h2 class="wow white animated fadeInUp">Te llamamos!</h2>
				<p class="white animated fadeIn">te llamamos para una mejor atención y para ofrecerte la mejor oferta del momento</p>
				<br>
				<div class="check_mark hide">
					<div class="sa-icon sa-success animate">
						<span class="sa-line sa-tip animateSuccessTip"></span>
						<span class="sa-line sa-long animateSuccessLong"></span>
						<div class="sa-placeholder"></div>
						<div class="sa-fix"></div>
					</div>
				</div>
				<form class="wow animated fadeInUp" id="contactar-reg" action="{{ route('contactar') }}" method="post">
					@csrf
					<input class="special" type="hidden" name="nombre" id="nombre" value="{{ Auth::user()->name }}">
					<input type="hidden" name="" value="el usuario tiene x compania telefonica y esta interesado por la oferta ">
					<input class="special" type="hidden" name="apellido" value="{{ Auth::user()->apellido }}">
					<input class="special" type="hidden" name="email" value="{{ Auth::user()->email }}">
					<input class="special" type="hidden" name="servicio" value="" id="servicio-id">
					<input class="special" type="text" name="actual" placeholder="Compañia actual de telefonía?">
					<input type="hidden" name="notas" value="">
					<input class="special" type="text" name="telefono" placeholder="Teléfono" value="{{ Auth::user()->telefono }}" required>
					<div class="accept">
						<input type="checkbox" name="accept" id="the-terms" required> Acepto las <a href="{{ route('privacidad') }}" title="Ver Políticas de Privacidad">políticas de privacidad.</a>
					</div>
					<input id="submitBtn" class="btn btn-outline-light btn-lg submit-contactar" type="submit" value="Enviar" disabled="disabled">
				</form>
			</div>
		</div>
	</div>	
</section>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){

    	$('.categorias').change(function(){

    		if($(this).val() == 0)
    		{
    			$('.filtrar').show();
    		}else{

    		cat = 'cat-' + $(this).val();

    		$('.filtrar').hide();
    		$('.' + cat).show();

    		}

    	});

        $('.step').click(function(e){
            e.preventDefault();
            $('.ocultar').hide();

            target = $(this).attr('href');
            servicio = $(this).attr('rel');

            $("#servicio-id").val(servicio); 
            $(target).show();
            $('html, body').animate({
                    scrollTop: $(target).offset().top
            }, 2000);
        });

        $('#contactar-reg').on('submit', function (e) {
            
            e.preventDefault();
            var nombre = $("input[name=nombre]").val();
            var apellido = $("input[name=apellido]").val();
            var email = $("input[name=email]").val();
            var llamar = $("input[name=llamar]").val();
            var servicio = $("#servicio-id").val();


            // datos de la oferta telefónica
            var empresa = "{{ $oferta->empresa->nombre }}"; 
            var precio 	= "{{ $oferta->opcion->precio_telefonia }}";
            var titulo 	= "{{ $oferta->opcion->subtitulo_telefonia }}";
            var desc 	= "{{ $oferta->descripcion }}";
            var actual 	= $("input[name=actual]").val();

            var text = "Tiene " + actual + " actualmente, y esta interesado en la oferta de " + empresa + " de " + titulo + " que incluye " + desc;

            $("input[name=notas]").val(text);

            $('form').fadeOut();
            $.ajax({
                type: 'post',
                url: '{{ route("contactar") }}',
                data: $(this).serialize(),
            
                success: function (data) {
                        
                    $('.check_mark').removeClass('hide');
                    $(".sa-success").addClass("hide");
                    setTimeout(function() {
                        $(".sa-success").removeClass("hide");
                    }, 10);
                    $("h3.gray").html(data.guardado);
                }
            });
        });

        var the_terms = $("#the-terms");

        the_terms.click(function() {
            if ($(this).is(":checked")) {
                $("#submitBtn").removeAttr("disabled");
            } else {
                $("#submitBtn").attr("disabled", "disabled");
            }
        });
    });
</script>
@endsection