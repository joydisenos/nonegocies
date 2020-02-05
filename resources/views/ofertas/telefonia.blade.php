@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/ofertas.css')}}">
@endsection
@section('content')
<header class="page">
	<div class="container">
   		<h2 class="center wow blue animated fadeIn text-center">Telefonía</h2>
    	<p class="center">Consulta las tarifas fijo, móviles e Internet  exclusivas<br />porque te mereces la mejor atención!</p>
    </div>
</header>
<section class="telefonia">
<div class="container mt-4">
	<div class="row mb-4">
		<div class="col-9 text-right">
		</div>
		<div class="col-3">
			<select class="categorias form-control">
								<option value="0">Seleccione una categoría ▼</option>
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
		<div class="col-md-4 filtrar cat-{{ $oferta->opcion->categoria_telefonia }} grid-oferta">

			@component('components.card')
			@slot('oferta' , $oferta)	
			@slot('contenido')
				
					<div class="text-center">
							<button href="#form-contactar" class="btn btn-white step" rel="Telefonía: {{ title_case($oferta->nombre) }}"
								data-empresa="{{ $oferta->empresa->nombre }}"
								data-precio="{{ number_format($oferta->opcion->precio_telefonia , 2) }}"
								data-titulo="{{ title_case($oferta->nombre) }}"
								data-desc="{{ $oferta->descripcion }}"
								>Contratar</button>
					</div>
			@endslot
			@endcomponent
			
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
					<input type="hidden" id="empresa" name="empresa">
					<input type="hidden" id="precio" name="precio">
					<input type="hidden" id="titulo" name="titulo">
					<input type="hidden" id="desc" name="desc">
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

            // datos de la oferta telefónica
            empresa = $(this).data('empresa'); 
            precio 	= $(this).data('precio');
            titulo 	= $(this).data('titulo');
            desc 	= $(this).data('desc');

            $('#empresa').val(empresa);
            $('#precio').val(precio);
            $('#titulo').val(titulo);
            $('#desc').val(desc);
        });

        $('#contactar-reg').on('submit', function (e) {
            
            e.preventDefault();
            var nombre = $("input[name=nombre]").val();
            var apellido = $("input[name=apellido]").val();
            var email = $("input[name=email]").val();
            var llamar = $("input[name=llamar]").val();
            var servicio = $("#servicio-id").val();


            // datos de la oferta telefónica
            empresa = $('#empresa').val(); 
            precio 	= $('#precio').val();
            titulo 	= $('#titulo').val();
            desc 	= $('#desc').val();
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