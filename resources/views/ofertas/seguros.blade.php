@extends('layouts.master')
@section('content')
<style>
.logos {width: 100%;max-width: 1240px;margin: 0 auto;display: grid;
grid-template-columns: 1fr;grid-template-rows: auto;grid-gap: 10px;}
@media only screen and (min-width: 500px) {.logos {grid-template-columns: 1fr 1fr 1fr 1fr;}}
@media only screen and (min-width: 850px) {
.logos {grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;}}
.grid {width: 100%;max-width: 1240px;margin: 0 auto;display: grid;grid-template-columns: 1fr;grid-template-rows: auto;grid-gap: 10px;}
@media only screen and (min-width: 500px) {.grid {grid-template-columns: 1fr 1fr;}}
@media only screen and (min-width: 850px) {.grid {grid-template-columns: 1fr 1fr 1fr 1fr;}}
.element img {max-width: 110px;}
.card {background: #ff034c;color: white;text-align: center;}
.card img {width: 70px;display: block;text-align: center;margin: 0 auto;padding: 15px 0;}
.card:hover{background: #133273;}
.card:hover h3{color:white;}
.card button{background: transparent;color: white;padding: 12px;width: 70%;display: block;margin: 0 auto;margin-bottom: 20px;margin-top: 20px;border: 2px solid white;}
.card:hover button{background: white;color:#133273;}
.ocultar{display: none}
section#form-contactar {background: #393975 url(/img/bg-hero-page.svg) repeat;}
.col-md-6.center {display: block;margin: 0 auto;}
form#contactar-reg{background: white;}
</style>
<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Nuestras Ofertas</h1>
    <p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
  </div>
</header>
<section>
	<div class="container">
		<h2 class="center">Encuentra tu Seguro</h2>
		<p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Neque eveniet itaque consequatur quaerat non.</p>
		<br>
		<hr>
		<br>
		<div class="grid">
			<a href="#" class="card">
				<img src="/img/seguros/svg/auto.svg" alt="">
				<h3>Seguros de coche</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Coche">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/moto.svg" alt="">
				<h3>Seguros de Moto</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Moto">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/hogar.svg" alt="">
				<h3>Seguros de Hogar</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Hogar">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/travel.svg" alt="">
				<h3>Seguros de Viaje</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Viaje">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/hospital.svg" alt="">
				<h3>Seguros de Salud</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Salud">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/dental.svg" alt="">
				<h3>Seguros Dentales</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros Dentales">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/care.svg" alt="">
				<h3>Seguros de Vida</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Vida">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/decesos.svg" alt="">
				<h3>Seguros de Decesos</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Decesos">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/mascotas.svg" alt="">
				<h3>Seguros de Mascotas</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Mascotas">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/furgonetas.svg" alt="">
				<h3>Seguros de Furgonetas</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Furgonetas">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/calendario.svg" alt="">
				<h3>Seguros por día</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Por dias">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/house.svg" alt="">
				<h3>Seguro inpagos alquiler</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Alguiler">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/empresas.svg" alt="">
				<h3>Seguros de Empresas</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Empresas">Comparar</button>
			</a>
			<a href="#" class="card">
				<img src="/img/seguros/svg/ski.svg" alt="">
				<h3>Seguros de Esquí</h3>
				<button href="#form-contactar" class="btn btn-white step" rel="Seguros de Esqui">Comparar</button>
			</a>
		</div>
</section>
<section>
		<h2 class="lightblue center">Trabajamos con más de 60<br>compañías aseguradoras</h1>
		<br>
		<ul class="logos">
			<li class="element">
				<img alt="Active Seguros" src="/img/seguros/active_directo.jpg">
			</li>
			<li class="element">
				<img alt="ACUNSA" src="/img/seguros/ACUNSA_PYS.jpg">
			</li>
			<li class="element">
				<img alt="Adeslas" src="/img/seguros/Adeslas_Sinpys-01-01.jpg">
			</li>
			<li class="element">
				<img alt="Aegon" src="/img/seguros/logo-aegon-seguros.png">
			</li>
			<li class="element">
				<img alt="Aenus" src="/img/seguros/logo_aenus.png">
			</li>
			<li class="element">
				<img alt="AFEMEFA" src="/img/seguros/logo-afemefa.png">
			</li>
			<li class="element">
				<img alt="Albadis" src="/img/seguros/logo-albadis-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Allianz" src="/img/seguros/logo-allianz-global-assistance.png">
			</li>
			<li class="element">
				<img alt="Antares" src="/img/seguros/logo-antares.png">
			</li>
			<li class="element">
				<img alt="Aprecio" src="/img/seguros/logo-aprecio.png">
			</li>
			<li class="element">
				<img alt="Arag" src="/img/seguros/logo-arag.png">
			</li>
			<li class="element">
				<img alt="Asefa seguros" src="/img/seguros/asefa_68x48_conpys-01-01_1.png">
			</li>
			<li class="element">
				<img alt="Asefa seguros" src="/img/seguros/logo-asefa-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="ASEGRUP" src="/img/seguros/Asegrup_nuevologo.png">
			</li>
			<li class="element">
				<img alt="Asisa" src="/img/seguros/logo-asisa.png">
			</li>
			<li class="element">
				<img alt="AXA" src="/img/seguros/logo-axa.png">
			</li>
			<li class="element">
				<img alt="AXA Assistance" src="/img/seguros/logo-axa-assistance.png">
			</li>
			<li class="element">
				<img alt="Ayax" src="/img/seguros/logo-ayax.png">
			</li>
			<li class="element">
				<img alt="Balumba" src="/img/seguros/logo-balumba.png">
			</li>
			<li class="element">
				<img alt="CaLife" src="/img/seguros/logo-calife-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Catalana Occidente" src="/img/seguros/logo-catalana-occidente.png">
			</li>
			<li class="element">
				<img alt="Cigna" src="/img/seguros/logo-cigna.png">
			</li>
			<li class="element">
				<img alt="Citymotos" src="/img/seguros/logo-citymotos.png">
			</li>
			<li class="element">
				<img alt="Clínicum Salut" src="/img/seguros/logo-clinicum.png">
			</li>
			<li class="element">
				<img alt="Direct Seguros" src="/img/seguros/logo-direct.png">
			</li>
			<li class="element">
				<img alt="Divina Pastora" src="/img/seguros/logo-divina-pastora-seguros1.png">
			</li>
			<li class="element">
				<img alt="DKV" src="/img/seguros/logo-dkv-seguros.png">
			</li>
			<li class="element">
				<img alt="ERV" src="/img/seguros/logo-erv.png">
			</li>
			<li class="element">
				<img alt="Europ Assistance" src="/img/seguros/logo-europ-assistance.png">
			</li>
			<li class="element">
				<img alt="Expertia" src="/img/seguros/logo-expertia.png">
			</li>
			<li class="element">
				<img alt="Fénix Directo" src="/img/seguros/logo-fenix-directo.png">
			</li>
			<li class="element">
				<img alt="FIATC SEGUROS" src="/img/seguros/logo-fiatc.png">
			</li>
			<li class="element">
				<img alt="Fit2Trip" src="/img/seguros/logo-fit2trip.png">
			</li>
			<li class="element">
				<img alt="Generali" src="/img/seguros/logo-generali.png">
			</li>
			<li class="element">
				<img alt="Génesis" src="/img/seguros/logo-genesis.png">
			</li>
			<li class="element">
				<img alt="Helvetia" src="/img/seguros/logo-helvetia-1.png">
			</li>
			<li class="element">
				<img alt="HOLINS" src="/img/seguros/holins-68x48.png">
			</li>
			<li class="element">
				<img alt="Intermundial" src="/img/seguros/logo_inter-mundial.png">
			</li>
			<li class="element">
				<img alt="iSalud" src="/img/seguros/logo_isalud.png">
			</li>
			<li class="element">
				<img alt="Kalibo" src="/img/seguros/logo-kalibo.png">
			</li>
			<li class="element">
				<img alt="Liberty Seguros" src="/img/seguros/logo-liberty.png">
			</li>
			<li class="element">
				<img alt="Life Sure" src="/img/seguros/logo-lifesure.png">
			</li>
			<li class="element">
				<img alt="Línea Directa" src="/img/seguros/logo-linea-directa-aseguradora.png">
			</li>
			<li class="element">
				<img alt="MAPFRE" src="/img/seguros/logo-mapfre.png">
			</li>
			<li class="element">
				<img alt="MDC (PyS)" src="/img/seguros/MDCconpys.jpg">
			</li>
			<li class="element">
				<img alt="Metlife" src="/img/seguros/logo-metlife.png">
			</li>
			<li class="element">
				<img alt="Montepío de Conductores" src="/img/seguros/montepioconpys.jpg">
			</li>
			<li class="element">
				<img alt="Motopoliza.com" src="/img/seguros/logo-motopoliza.png">
			</li>
			<li class="element">
				<img alt="Murimar" src="/img/seguros/logo-murimar-seguros-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Mutua de propietarios" src="/img/seguros/mutua-propietarios-199x107.png">
			</li>
			<li class="element">
				<img alt="Mutua Madrileña" src="/img/seguros/logo-mutua-madrilena-blanco.png">
			</li>
			<li class="element">
				<img alt="Mutua MMT Seguros" src="/img/seguros/logo-mutua-mmt-seguros.png">
			</li>
			<li class="element">
				<img alt="Néctar" src="/img/seguros/logo-nectar.png">
			</li>
			<li class="element">
				<img alt="Nuez" src="/img/seguros/logo-nuez.png">
			</li>
			<li class="element">
				<img alt="Onyx Seguros" src="/img/seguros/logo-onyx-seguros.png">
			</li>
			<li class="element">
				<img alt="Patria Hispana" src="/img/seguros/logo-patria-hispana-1.png">
			</li>
			<li class="element">
				<img alt="Pelayo" src="/img/seguros/logo-pelayo.png">
			</li>
			<li class="element">
				<img alt="Penélope Seguros" src="/img/seguros/logo-penelope-seguros.png">
			</li>
			<li class="element">
				<img alt="Plus Ultra Seguros" src="/img/seguros/logo-plus-ultra1.png">
			</li>
			<li class="element">
				<img alt="Prebal" src="/img/seguros/logo-prebal-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Previsora" src="/img/seguros/logo-previsora-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Previsora General" src="/img/seguros/logo-previsora-general.png">
			</li>
			<li class="element">
				<img alt="Puntoseguro" src="/img/seguros/logo_punto-seguro.png">
			</li>
			<li class="element">
				<img alt="Qualitas Auto" src="/img/seguros/logo-qualitas.png">
			</li>
			<li class="element">
				<img alt="Quiero salud" src="/img/seguros/QuieroSalud.gif">
			</li>
			<li class="element">
				<img alt="RACC" src="/img/seguros/logo-racc.png">
			</li>
			<li class="element">
				<img alt="RACE" src="/img/seguros/logo-race.png">
			</li>
			<li class="element">
				<img alt="REALE Seguros" src="/img/seguros/logo-reale.png">
			</li>
			<li class="element">
				<img alt="Regal" src="/img/seguros/logo-regal.png">
			</li>
			<li class="element">
				<img alt="SALUS" src="/img/seguros/logo-salus.png">
			</li>
			<li class="element">
				<img alt="Sanitas" src="/img/seguros/logo-sanitas.png">
			</li>
			<li class="element">
				<img alt="Santa Lucía" src="/img/seguros/logo-santalucia-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Segurmoto" src="/img/seguros/logo-segurmoto.png">
			</li>
			<li class="element">
				<img alt="Seguromoto MMT" src="/img/seguros/logo-seguromotommt.png">
			</li>
			<li class="element">
				<img alt="Seguropordias" src="/img/seguros/logo-seguropordias.png">
			</li>
			<li class="element">
				<img alt="Seguros Bilbao" src="/img/seguros/seguros_bilbao-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Segurvert" src="/img/seguros/logo-segurvet.png">
			</li>
			<li class="element">
				<img alt="Siente Salud" src="/img/seguros/logo-siente-salud.png">
			</li>
			<li class="element">
				<img alt="Start" src="/img/seguros/logo-start-seguros-proyectos-y-seguros.png">
			</li>
			<li class="element">
				<img alt="Surne" src="/img/seguros/logo-surne.png">
			</li>
			<li class="element">
				<img alt="Terránea" src="/img/seguros/logo-terranea.png">
			</li>
			<li class="element">
				<img alt="Verti" src="/img/seguros/logo-verti.png">
			</li>
			<li class="element">
				<img alt="Xenasegur" src="/img/seguros/logo-xenasegur.png">
			</li>
			<li class="element">
				<img alt="Zurich" src="/img/seguros/logo-zurich.png">
			</li>
		</ul>
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
					<input class="special" type="hidden" name="apellido" value="{{ Auth::user()->apellido }}">
					<input class="special" type="hidden" name="email" value="{{ Auth::user()->email }}">
					<input class="special" type="hidden" name="servicio" value="" id="servicio-id">
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