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
	section.telefonia{padding-bottom: 40px;}
	.title{padding:40px 0;}
</style>
@endsection
@section('content')
<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Telefonía</h1>
    <p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
  </div>
</header>
<div class="title">
	<h2 class="center">Nuestras ofertas en Telefonía</h2>
	<p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Placeat quia omnis voluptatem, natus, quibusdam facilis deserunt maiores illo minima sunt.</p>
</div>
<section class="telefonia">
<div class="container mt-4">
	@foreach($ofertas->chunk(3) as $row)
	<div class="row mb-4">
	@foreach($row as $oferta)
		<div class="col-md-4">
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
					<h2 class="price">{{ $oferta->opcion->precio_telefonia }} €</h2>
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
<script>
    $(document).ready(function(){

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