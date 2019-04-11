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
    padding: 30px;
    background: #F44336;
    color: white;
    border-radius: 6px;
}

.special{color: #133273 !important;}

.card-body-featured p{color:white;}

.ocultar{
        display: none;
}

/*cards and flip*/

h3.blue.center {
    font-size: 16px;
}

.card:hover .card__side--front {
  transform: rotateY(-180deg);
}
.card:hover .card__side--back {
  transform: rotate(0);
}

.card__side--back {
  color: #FFF;
  background: #133273;
  transform: rotateY(180deg);
  padding: 30px 30px 22px 30px;
}

.card {
    border: 0;
        margin-bottom: 190px;
}

.card__side {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  backface-visibility: hidden;
  transition: all .6s ease;
  box-shadow: 1em 1em 2em rgba(0, 0, 0, 0.2);
}

img.icons-ofertas {
    height: 70px;
    margin: 0 auto;
    display: block;
    margin-bottom: 30px;
}

section.step1 {
    min-height: 600px;
    clear: both;
}

a.btn.btn-white {
    background: transparent !important;
    color: white;
    border: 2px solid white;
    display: block;
    text-align: center;
    padding: 15px 0;
}


a.btn.btn-white:hover {
    background: #fff !important;
    color: red !important;
}

.text-featured-ofertas{
    margin-top: 0px;
    padding-bottom: 50px;
    text-align: center;
}



/*grid*/


/* css grid*/

.service-grid {
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: auto;
    grid-gap: 10px;
}

@media only screen and (min-width: 500px) {
    .service-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media only screen and (min-width: 850px) {
    .service-grid {
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }
}

/* contact form */

section#form-contactar {
    background: #393975 url(/img/bg-hero-page.svg) repeat;
}

.col-md-6.center {
    display: block;
    margin: 0 auto;
}

form#contactar-reg{
    background: white;
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
        <p class="center text-featured-ofertas">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br> Deserunt dolores ea maiores fuga dolore totam corrupti ducimus</p>
        <div class="service-grid">

            <!-- estos servicios luz, gas, tel , seguros van para todos -->

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/luz.svg') }}" alt="target">
                        <h3 class="blue center">LUZ</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#contratar-luz" class="btn btn-white step" rel="">ver comparador</a>
                    </div>
                </div>
            </div>
            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/gas.svg') }}" alt="target">
                        <h3 class="blue center">GAS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#contratar-gas" class="btn btn-white step" rel="">ver comparador</a>
                    </div>
                    
                </div>
            </div>
            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/telefonia.svg') }}" alt="target">
                        <h3 class="blue center">TELEFONIA</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="{{ route('ofertas.telefonia') }}" class="btn btn-white">ver ofertas</a>
                    </div>
                </div>
            </div>
            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/seguros.svg') }}" alt="target">
                        <h3 class="blue center">SEGUROS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="{{ route('ofertas.seguros') }}" class="btn btn-white">ver ofertas</a>
                    </div>
                </div>
            </div>
        	
        	@guest
        	@else
            	@if(Auth::user()-> tipo == 1) <!-- Usuarios Particulares -->

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/alarmas.svg') }}" alt="target">
                        <h3 class="blue center">ALARMAS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Alarmas">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/tarjetas.svg') }}" alt="target">
                        <h3 class="blue center">TARJETAS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Tarjetas de Credito">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/prestamos.svg') }}" alt="target">
                        <h3 class="blue center">MICRO PRESTAMOS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Prestamos">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/renta.svg') }}" alt="target">
                        <h3 class="blue center">RENTA</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Te ayudamos en tu declaracion de la renta anual.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Renta">Contactar</a>
                    </div>
                </div>
            </div>

            	@endif
            	@if(Auth::user()-> tipo == 2) <!-- Usuarios Empresas -->

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/curso.svg') }}" alt="target">
                        <h3 class="blue center">FORMACIÓN</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Te ayudamos en tu declaracion de la renta anual.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Formacion">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/extintores.svg') }}" alt="target">
                        <h3 class="blue center">EXTINTORES</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Te ayudamos en tu declaracion de la renta anual.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Extintores">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/lopda.svg') }}" alt="target">
                        <h3 class="blue center">PROTECCIÓN DE DATOS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Te ayudamos en tu declaracion de la renta anual.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Protección de datos">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/alarmas.svg') }}" alt="target">
                        <h3 class="blue center">ALARMAS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Alarmas">Contactar</a>
                    </div>
                </div>
            </div>

             <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/solar.svg') }}" alt="target">
                        <h3 class="blue center">SOLAR</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Solar">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/tarjetas.svg') }}" alt="target">
                        <h3 class="blue center">TARJETAS</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Tarjetas de Credito">Contactar</a>
                    </div>
                </div>
            </div>
            
             <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/financiacion.svg') }}" alt="target">
                        <h3 class="blue center">FINANCIACION</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Financiación">Contactar</a>
                    </div>
                </div>
            </div>

            <div class="service-item wow featured animated fadeInUp">
                <div class="card">
                    <div class="card-body-featured card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/contador.svg') }}" alt="target">
                        <h3 class="blue center">CONTADOR</h3>
                    </div>
                    <div class="card-body-featured card__side card__side--back">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#form-contactar" class="btn btn-white step" rel="Contador">Contactar</a>
                    </div>
                </div>
            </div>

            	@endif

            	@if(Auth::user()-> tipo == 3) <!-- Usuarios Comunidad -->
            		<div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/extintores.svg') }}" alt="target">
                                <h3 class="blue center">EXTINTORES</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Te ayudamos en tu declaracion de la renta anual.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Extintores">Contactar</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/ascensores.svg') }}" alt="target">
                                <h3 class="blue center">ASCENSORES</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Te ayudamos en tu declaracion de la renta anual.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Ascensores">Contactar</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/contador.svg') }}" alt="target">
                                <h3 class="blue center">CONTADOR</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Contador">Contactar</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/admin.svg') }}" alt="target">
                                <h3 class="blue center">ADM. FINCAS</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Adm Fincas">Contactar</a>
                            </div>
                        </div>
                    </div>
            	@endif

            	@if(Auth::user()-> tipo == 4) <!-- Usuarios Administradores -->
            		<div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/extintores.svg') }}" alt="target">
                                <h3 class="blue center">EXTINTORES</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Te ayudamos en tu declaracion de la renta anual.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Extintores">Contactar</a>
                            </div>
                        </div>
                    </div>
                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/lopda.svg') }}" alt="target">
                                <h3 class="blue center">PROTECCIÓN DE DATOS</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Te ayudamos en tu declaracion de la renta anual.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Protección de Datos">Contactar</a>
                            </div>
                        </div>
                    </div>

                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/ascensores.svg') }}" alt="target">
                                <h3 class="blue center">ASCENSORES</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Te ayudamos en tu declaracion de la renta anual.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Ascensores">Contactar</a>
                            </div>
                        </div>
                    </div>

                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/solar.svg') }}" alt="target">
                                <h3 class="blue center">SOLAR</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Solar">Contactar</a>
                            </div>
                        </div>
                    </div>

                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/cargador.svg') }}" alt="target">
                                <h3 class="blue center">CARGADORES</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Cargadores de Autos">Contactar</a>
                            </div>
                        </div>
                    </div>   

                    <div class="service-item wow featured animated fadeInUp">
                        <div class="card">
                            <div class="card-body-featured card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/alarmas.svg') }}" alt="target">
                                <h3 class="blue center">ALARMAS</h3>
                            </div>
                            <div class="card-body-featured card__side card__side--back">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#form-contactar" class="btn btn-white step" rel="Alarmas">Contactar</a>
                            </div>
                        </div>
                    </div>                 

            	@endif

            @endguest

        </div>
    </div>
</section>

<section class="ocultar" id="form-contactar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 center">
            <h2 class="wow white animated fadeInUp">Te llamamos!</h1>
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
</section>

<section class="contactar ocultar" id="contratar-luz">
    <div class="container">
    <div class="row">
        <div class="service-item"></div>
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
                                        <label for="monto">Total Factura</label>
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
        <div class="service-item"></div>
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

        // legal stuff before send
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
