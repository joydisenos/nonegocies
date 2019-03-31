@extends('layouts.master')
@section('content')
<style>
    img.icons {
    padding-top: 7px;
    margin-left: -1px;
    margin: 0 auto;
    display: block;
    height: 140px;
}
.card-body-featured {
    padding: 30px 0;
    background: #F44336;
    color: white;
    border-radius: 6px;
}

h2.center.wow.blue.forced-top.fadeIn.text-center.animated {
    padding-bottom: 80px;
}

.ocultar{
        display: none;
}

</style>
<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Nuestras Ofertas</h1>
    <p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
  </div>
</header>
<section class="step1">
  <div class="container">
    <h2 class="center wow blue forced-top animated fadeIn text-center">Qué Busco?</h2>
    <div class="row">
      <div class="col-lg-3 wow featured animated fadeInUp">
        <div class="card">
                <a href="#contratar-luz" class="text-light step">
                        <div class="card-body-featured">
                        <!--  <img class="icons" src="{{ asset('/img/01.svg') }}" alt="flag"> -->
                        <h3 class="blue center">LUZ</h3>
                        </div>
                </a>
        </div>
      </div>
      <div class="col-lg-3 wow featured animated fadeInUp">
        <div class="card">
                <a href="#contratar-gas" class="text-light step">
                        <div class="card-body-featured">
                <!--  <img class="icons" src="{{ asset('/img/02.svg') }}" alt="target"> -->
                        <h3 class="blue center">GAS</h3>
                        </div>
                </a>
        </div>
    </div>
      <div class="col-lg-3 wow featured animated fadeInUp">
        <div class="card">
                <a href="{{ route('ofertas.telefonia') }}" class="text-light">
                        <div class="card-body-featured">
                        <!-- <img class="icons" src="{{ asset('/img/03.svg') }}" alt="magic"> -->
                        <h3 class="blue center">TELEFONÍA</h3>
                        </div>
                </a>
        </div>
      </div>
      <div class="col-lg-3 wow featured animated fadeInUp">
        <div class="card">
                <a href="{{ route('ofertas.seguros') }}" class="text-light">
                        <div class="card-body-featured">
                        <!-- <img class="icons" src="{{ asset('/img/03.svg') }}" alt="magic"> -->
                        <h3 class="blue center">SEGUROS</h3>
                        </div>
                </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contactar ocultar" id="contratar-luz">
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
                                <input type="hidden" name="servicio" value="{{ $categorias->where('slug' ,'luz')->first()->id }}">
                                   <!-- <div class="col">
                                            <label>Seleccione el servicio</label>
            
                                            <select name="servicio" id="servicio" class="special form-control">
                                                <option>Seleccione un Servicio</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">
                                                        {{ title_case($categoria->nombre) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                    </div> -->
                                    <div class="col">
                                    <label for="persona">Soy</label>
                                    <select name="persona" id="persona" class="special form-control">
                                                <option value="">Seleccione una Opción</option>
                                                <option value="1"
                                                @guest
                                                @else
                                                {{ (Auth::user()->tipo == 1) ? 'selected' : ''}}
                                                @endguest
                                                >Particular</option>
                                                <option value="2"
                                                @guest
                                                @else
                                                {{ (Auth::user()->tipo == 2) ? 'selected' : ''}}
                                                @endguest
                                                >Empresa</option>
                                                <option value="3"
                                                @guest
                                                @else
                                                {{ (Auth::user()->tipo == 3) ? 'selected' : ''}}
                                                @endguest
                                                >Comunidad</option>
                                                <option value="4"
                                                @guest
                                                @else
                                                {{ (Auth::user()->tipo == 4) ? 'selected' : ''}}
                                                @endguest
                                                >Administrador</option>
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
@section('scripts')
<script>
        $(document).ready(function(){
                $('.step').click(function(e){
                        e.preventDefault();
                        $('.ocultar').hide();
                        target = $(this).attr('href');
                        $(target).show();
                        $('html, body').animate({
                                scrollTop: $(target).offset().top
                        }, 2000);
                });
        });
</script>
@endsection

