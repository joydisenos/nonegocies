@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css">
<link rel="stylesheet" href="/css/ofertas.css">
@endsection
@section('content')
<style>
    .error{
        border: 1px solid red;
    }
    :read-only {border: unset !important;}
</style>
<div id="start"></div>
<header class="page">
  <div class="container">
    <h2 class="center wow blue  fadeIn text-center animated">Nuestras Ofertas para {{ Auth::user()->tipoUsuario()->plural }}
    </h2>
    <p class="text-center">Haz Click en el producto que estas buscando</p>
  </div>
</header>
<section class="step1">
    <div class="container">

        <div class="service-grid">

            <!-- estos servicios luz, gas, tel , seguros van para todos -->

            <div class="service-item featured">
                <a href="#contratar-luz" class="step" rel="">
                    <div class="card-oferta">
                        <div class="card-body-featured-oferta card__side card__side--front">
                            <img class="icons-ofertas" src="{{ asset('/img/luz.svg') }}" alt="target">
                            <h3 class="blue center">LUZ</h3>
                        </div>
                        <div class="card-body-featured-oferta card__side card__side--back">
                            <p>Compara tu factura de electricidad con nuestro comparador.</p>
                            <a href="#contratar-luz" class="btn btn-white step" rel="">Contratar</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="service-item featured">
                <a href="#contratar-gas" class="step" rel="">
                    <div class="card-oferta">
                        <div class="card-body-featured-oferta card__side card__side--front">
                            <img class="icons-ofertas" src="{{ asset('/img/gas.svg') }}" alt="target">
                            <h3 class="blue center">GAS</h3>
                        </div>
                        <div class="card-body-featured-oferta card__side card__side--back">
                            <p>Compara tu factura de gas con nuestro comparador.</p>
                            <a href="#contratar-gas" class="btn btn-white step" rel="">Contratar</a>
                        </div>    
                    </div>
                </a>
            </div>
            
            @if(App\Categoria::tieneOfertas('telefonia'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'telefonia' ) }}">
                    <div class="card-oferta">
                        <div class="card-body-featured-oferta card__side card__side--front">
                            <img class="icons-ofertas" src="{{ asset('/img/telefonia.svg') }}" alt="target">
                            <h3 class="blue center">TELEFONIA</h3>
                        </div>
                        <div class="card-body-featured-oferta card__side card__side--back">
                            <p>Elije la mejor tarifa que te convenga para pagar menos.</p>
                            <a href="{{ route('ofertas.categoria' , 'telefonia' ) }}" class="btn btn-white">ver ofertas</a>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if(App\Categoria::tieneOfertas('seguros'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'seguros' ) }}">
                    <div class="card-oferta">
                        <div class="card-body-featured-oferta card__side card__side--front">
                            <img class="icons-ofertas" src="{{ asset('/img/seguros.svg') }}" alt="target">
                            <h3 class="blue center">SEGUROS</h3>
                        </div>
                        <div class="card-body-featured-oferta card__side card__side--back">
                            <p>Asegúrate tú mismo, entra y elige ahora mismo tu seguro.</p>
                            <a href="{{ route('ofertas.categoria' , 'seguros' ) }}" class="btn btn-white">ver ofertas</a>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('porteros'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'porteros' ) }}">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/porteros.svg') }}" alt="target">
                        <h3 class="blue center">PORTEROS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Nuevas tecnologías para tu hogar</p>
                        <a href="{{ route('ofertas.categoria' , 'porteros' ) }}" class="btn btn-white">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('antenas'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'antenas' ) }}">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/antenas.svg') }}" alt="target">
                        <h3 class="blue center">ANTENAS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Instalación y configuracion de antenas para tu hogar</p>
                        <a href="{{ route('ofertas.categoria' , 'antenas' ) }}" class="btn btn-white">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('diseno-web'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'diseno-web' ) }}">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/webs.svg') }}" alt="target">
                        <h3 class="blue center">WEBS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Diseño y desarrollo de plataformas y aplicaciones</p>
                        <a href="{{ route('ofertas.categoria' , 'diseno-web' ) }}" class="btn btn-white">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
        	
        	@guest
        	@else
            @if(Auth::user()-> tipo == 1) <!-- Usuarios Particulares -->

            @if(App\Categoria::tieneOfertas('alarmas'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'alarmas' ) }}" rel="Alarmas">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/alarmas.svg') }}" alt="target">
                        <h3 class="blue center">ALARMAS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Protégete fácil y rápido seleccionando nuestras alarmas.</p>
                        <a href="{{ route('ofertas.categoria' , 'alarmas' ) }}" class="btn btn-white" rel="Alarmas">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('tarjetas'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'tarjetas' ) }}" rel="Tarjetas de Credito">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/tarjetas.svg') }}" alt="target">
                        <h3 class="blue center">TARJETAS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Encuentra la manera de gestionar tu dinero facil y seguro.</p>
                        <a href="{{ route('ofertas.categoria' , 'tarjetas' ) }}" class="btn btn-white" rel="Tarjetas de Credito">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif

            @if(App\Categoria::tieneOfertas('prestamos'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'prestamos' ) }}" rel="Prestamos">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/prestamos.svg') }}" alt="target">
                        <h3 class="blue center">MICRO PRESTAMOS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Te ayudamos a alcansar facilmente lo que estas buscando.</p>
                        <a href="{{ route('ofertas.categoria' , 'prestamos' ) }}" class="btn btn-white" rel="Prestamos">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('renta'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'renta' ) }}" rel="Renta">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/renta.svg') }}" alt="target">
                        <h3 class="blue center">RENTA</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Deja que nosotros hacemos las cuentas por ti cada año.</p>
                        <a href="{{ route('ofertas.categoria' , 'renta' ) }}" class="btn btn-white" rel="Renta">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif

            	@endif
            	@if(Auth::user()-> tipo == 2) <!-- Usuarios Empresas -->
            
            @if(App\Categoria::tieneOfertas('formacion'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'formacion' ) }}" rel="Formacion">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/curso.svg') }}" alt="target">
                        <h3 class="blue center">FORMACIÓN</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Formación para ti y tambien para tus trabajadores.</p>
                        <a href="{{ route('ofertas.categoria' , 'formacion' ) }}" class="btn btn-white" rel="Formacion">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('extintores'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'extintores' ) }}" rel="Extintores">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/extintores.svg') }}" alt="target">
                        <h3 class="blue center">EXTINTORES</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Gestiona eficientemente la protección de tu empresa.</p>
                        <a href="{{ route('ofertas.categoria' , 'extintores' ) }}" class="btn btn-white" rel="Extintores">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('alarmas'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'alarmas' ) }}" rel="Alarmas">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/alarmas.svg') }}" alt="target">
                        <h3 class="blue center">ALARMAS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Protégete fácil y rápido seleccionando nuestras alarmas.</p>
                        <a href="{{ route('ofertas.categoria' , 'alarmas' ) }}" class="btn btn-white" rel="Alarmas">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('solar'))
             <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'solar' ) }}" rel="Solar">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/solar.svg') }}" alt="target">
                        <h3 class="blue center">SOLAR</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>El futuro de la energía ya esta aqui, a que esperas? contáctanos hoy</p>
                        <a href="{{ route('ofertas.categoria' , 'solar' ) }}" class="btn btn-white" rel="Solar">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('tarjetas'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'tarjetas' ) }}" rel="Tarjetas de Credito">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/tarjetas.svg') }}" alt="target">
                        <h3 class="blue center">TARJETAS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Encuentra la manera de gestionar tu dinero facil y seguro.</p>
                        <a href="{{ route('ofertas.categoria' , 'tarjetas' ) }}" class="btn btn-white" rel="Tarjetas de Credito">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('financiacion'))
             <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'financiacion' ) }}" rel="Financiación">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/financiacion.svg') }}" alt="target">
                        <h3 class="blue center">FINANCIACION</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Nos encargamos de encontrar el mejor plan a tu medida.</p>
                        <a href="{{ route('ofertas.categoria' , 'financiacion' ) }}" class="btn btn-white" rel="Financiación">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif

            @if(App\Categoria::tieneOfertas('contadores'))
            <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'contadores' ) }}" rel="Contador">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/contador.svg') }}" alt="target">
                        <h3 class="blue center">CONTADOR</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Controla en tiempo real todos los consumos de tus suministros.</p>
                        <a href="{{ route('ofertas.categoria' , 'contadores' ) }}" class="btn btn-white" rel="Contador">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif
            
            @if(App\Categoria::tieneOfertas('prot-datos'))
             <div class="service-item featured">
                <a href="{{ route('ofertas.categoria' , 'prot-datos' ) }}" rel="Protección de datos">
                <div class="card-oferta">
                    <div class="card-body-featured-oferta card__side card__side--front">
                        <img class="icons-ofertas" src="{{ asset('/img/lopda.svg') }}" alt="target">
                        <h3 class="blue center">PROTECCIÓN DE DATOS</h3>
                    </div>
                    <div class="card-body-featured-oferta card__side card__side--back">
                        <p>Protege los datos de tus clientes con la ultima normativa.</p>
                        <a href="{{ route('ofertas.categoria' , 'prot-datos' ) }}" class="btn btn-white" rel="Protección de datos">ver ofertas</a>
                    </div>
                </div>
                </a>
            </div>
            @endif

            	@endif

            	@if(Auth::user()-> tipo == 3) <!-- Usuarios Comunidad -->

                @if(App\Categoria::tieneOfertas('extintores'))
            		<div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'extintores' ) }}" rel="Extintores">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/extintores.svg') }}" alt="target">
                                <h3 class="blue center">EXTINTORES</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Gestiona eficientemente la protección de tu comunidad.</p>
                                <a href="{{ route('ofertas.categoria' , 'extintores' ) }}" class="btn btn-white" rel="Extintores">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                @endif

                @if(App\Categoria::tieneOfertas('ascensores'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'ascensores' ) }}" rel="Ascensores">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/ascensores.svg') }}" alt="target">
                                <h3 class="blue center">ASCENSORES</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Reparación y mantenimiento de la unidad para tu comunidad</p>
                                <a href="{{ route('ofertas.categoria' , 'ascensores' ) }}" class="btn btn-white" rel="Ascensores">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(App\Categoria::tieneOfertas('contadores'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'contadores' ) }}" rel="Contador">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/contador.svg') }}" alt="target">
                                <h3 class="blue center">CONTADOR</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Controla en tiempo real todos los consumos de tus suministros.</p>
                                <a href="{{ route('ofertas.categoria' , 'contadores' ) }}" class="btn btn-white" rel="Contador">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(App\Categoria::tieneOfertas('fincas'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'fincas' ) }}" rel="Adm Fincas">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/admin.svg') }}" alt="target">
                                <h3 class="blue center">ADM. FINCAS</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Administración de pequeñas y grandes fincas.</p>
                                <a href="{{ route('ofertas.categoria' , 'fincas' ) }}" class="btn btn-white" rel="Adm Fincas">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

            	@endif

            	@if(Auth::user()-> tipo == 4) <!-- Usuarios Administradores -->

                @if(App\Categoria::tieneOfertas('extintores'))
            		<div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'extintores' ) }}" rel="Extintores">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/extintores.svg') }}" alt="target">
                                <h3 class="blue center">EXTINTORES</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Gestiona eficientemente la protección para tu finca.</p>
                                <a href="{{ route('ofertas.categoria' , 'extintores' ) }}" class="btn btn-white" rel="Extintores">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    
                    @if(App\Categoria::tieneOfertas('ascensores'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'ascensores' ) }}" rel="Ascensores">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/ascensores.svg') }}" alt="target">
                                <h3 class="blue center">ASCENSORES</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Reparación y mantenimiento de la unidad para tu finca</p>
                                <a href="{{ route('ofertas.categoria' , 'ascensores' ) }}" class="btn btn-white" rel="Ascensores">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    
                    @if(App\Categoria::tieneOfertas('solar'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'solar' ) }}" rel="Solar">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/solar.svg') }}" alt="target">
                                <h3 class="blue center">SOLAR</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>El futuro de la energía ya esta aqui, a que esperas? contáctanos hoy</p>
                                <a href="{{ route('ofertas.categoria' , 'solar' ) }}" class="btn btn-white" rel="Solar">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(App\Categoria::tieneOfertas('cargadores'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'cargadores' ) }}" rel="Cargadores de Autos">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/cargador.svg') }}" alt="target">
                                <h3 class="blue center">CARGADORES</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Le damos energia a los nuevos vehículos en tu finca</p>
                                <a href="{{ route('ofertas.categoria' , 'cargadores' ) }}" class="btn btn-white" rel="Cargadores de Autos">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif   
                    
                    @if(App\Categoria::tieneOfertas('alarmas'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'alarmas' ) }}" rel="Alarmas">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/alarmas.svg') }}" alt="target">
                                <h3 class="blue center">ALARMAS</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Protégete fácil y rápido seleccionando nuestras alarmas.</p>
                                <a href="{{ route('ofertas.categoria' , 'alarmas' ) }}" class="btn btn-white" rel="Alarmas">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif

                    @if(App\Categoria::tieneOfertas('prot-datos'))
                    <div class="service-item featured">
                        <a href="{{ route('ofertas.categoria' , 'prot-datos' ) }}" rel="Protección de Datos">
                        <div class="card-oferta">
                            <div class="card-body-featured-oferta card__side card__side--front">
                                <img class="icons-ofertas" src="{{ asset('/img/lopda.svg') }}" alt="target">
                                <h3 class="blue center">PROTECCIÓN DE DATOS</h3>
                            </div>
                            <div class="card-body-featured-oferta card__side card__side--back">
                                <p>Protege los datos de tus clientes con la ultima normativa.</p>
                                <a href="{{ route('ofertas.categoria' , 'prot-datos' ) }}" class="btn btn-white" rel="Protección de Datos">ver ofertas</a>
                            </div>
                        </div>
                        </a>
                    </div> 
                    @endif                

            	@endif

            @endguest

        </div>
    </div>
</section>

<section class="contactar ocultar comparador" id="contratar-luz">
    <div class="container">
        <div class="service-item"></div>
       
            <h2 class="wow blue ">Calculadora de Ahorros</h1>
                <p>Sólo necesitas tener a mano tu última factura y completar los siguientes datos<br>para conocer el ahorro que te podemos ofrecer si prefieres que te llamemos, haz <a href="#" class="callme">click aqui</a></p>
            <br>
            
            <form class="wow " action="{{ route('consultar.get') }}" method="get">
            @csrf
            
            <input type="hidden" name="servicio" value="{{ $categorias->where('slug' ,'luz')->first()->id }}">
            
            <select name="persona" id="persona" class="special form-control ocultar">
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

            <div class="row">
                <div class="col-md-2 col-xs-hidden"></div>      
                <div class="col-xs-12 col-md-4">
                    <fieldset>
                        <h4 class="red">Total de la factura</h4>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input class="form-control bigprice" type="number" name="monto" min="0" step="any" placeholder="00.00" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            <p class="warning-txt">Debes introducir el importe total que has pagado, incluyendo impuestos.</p>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4 class="red">Fecha de factura</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Desde:</span>
                                </div>
                                <input class="form-control datepicker" autocomplete="off" name="desde" data-date-format="dd/mm/yyyy" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Hasta: <span> </span></span>
                                </div>
                                <input class="form-control datepicker" autocomplete="off" data-date-format="dd/mm/yyyy" name="hasta" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4 class="red">Tarifa contratada</h4>
                            <select name="tarifa" id="tarifa-luz" class="form-control unformat" required>
                                <option value="0" disabled selected>Seleccione una Opción</option>
                                <option value="1" class="tarifas luz-opt">2.0A</option>
                                <option value="2" class="tarifas luz-opt">2.0DHA</option>
                                <option value="3" class="tarifas luz-opt">2.1A</option>
                                <option value="4" class="tarifas luz-opt">2.1DHA</option>
                                <option value="5" class="tarifas luz-opt">3.0A</option>
                                <option value="6" class="tarifas luz-opt">3.1A</option>
                            </select>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#myModalLuzTarifa" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-md-4">
                    <fieldset>
                        <h4 class="red">Potencia Contratada</h4>
                        <div class="input-group space-bottom">
                            <div class="input-group-prepend">
                                <span class="input-group-text">P1</span>
                            </div>
                            <input class="form-control luz-p" type="number" id="pp1-luz" name="pp1" min="0" step="any" required>
                            <div class="input-group-append">
                                <span class="input-group-text">kW</span>
                            </div>
                        </div>
                        
                        <div class="input-group space-bottom">
                            <div class="input-group-prepend">
                                <span class="input-group-text">P2</span>
                            </div>
                            <input class="form-control luz-p" type="number" id="pp2-luz" name="pp2" min="0" step="any" >
                            <div class="input-group-append">
                                <span class="input-group-text">kW</span>
                            </div>
                        </div>
                        
                        <div class="input-group space-bottom">
                            <div class="input-group-prepend">
                                <span class="input-group-text">P3</span>
                            </div>
                            <input class="form-control luz-p" type="number" id="pp3-luz" name="pp3" min="0" step="any" >
                            <div class="input-group-append">
                                <span class="input-group-text">kW</span>
                            </div>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#myModalLuzPotencia" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                    </fieldset>
                    <fieldset>
                        <h4 class="red">Energía Consumida</h4>
                        <div class="input-group space-bottom">
                            <div class="input-group-prepend">
                                <span class="input-group-text">P1</span>
                            </div>
                            <input class="form-control" type="number" name="ep1" id="ep1-luz" min="0" step="any" required>
                            <div class="input-group-append">
                                <span class="input-group-text">kW/h</span>
                            </div>
                        </div>
                       
                        <div class="input-group space-bottom">
                            <div class="input-group-prepend">
                                <span class="input-group-text">P2</span>
                            </div>
                            <input class="form-control" type="number" name="ep2" id="ep2-luz" min="0" step="any">
                            <div class="input-group-append">
                                <span class="input-group-text">kW/h</span>
                            </div>
                        </div>
                   
                        <div class="input-group space-bottom">
                            <div class="input-group-prepend">
                                <span class="input-group-text">P3</span>
                            </div>
                            <input class="form-control" type="number" name="ep3" id="ep3-luz" min="0" step="any">
                            <div class="input-group-append">
                                <span class="input-group-text">kW/h</span>
                            </div>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#myModalLuzEnergia" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                    </fieldset>
                </div>
                <div class="col-md-2 col-sx-hidden"></div> 
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"><input id="submitBtn" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger submit-contactar" type="submit" value="Consultar"></div>
                <div class="col-md-3"><button class="showmetheform btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Prefiero que me llamen</button></div>
                <div class="col-md-3"></div>
            </div>
        </form>
      
        <div class="service-item"></div>
        </div>
    </div>
</section>
<section class="contactar ocultar comparador" id="contratar-gas">
    <div class="container">
        <div class="service-item"></div>
            <h2 class="wow blue ">Calculadora de Ahorros</h1>
                <p>Sólo necesitas tener a mano tu última factura y completar los siguientes datos<br>para conocer el ahorro que te podemos ofrecer si prefieres que te llamemos, haz <a href="#" class="callme">click aqui</a></p>
            <br>
            
            <form class="wow " action="{{ route('consultar.gas.get') }}" method="get">
                @csrf

                <input type="hidden" name="servicio" value="{{ $categorias->where('slug' ,'gas')->first()->id }}">
                   
                <select name="persona" id="persona" class="special form-control ocultar">
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

                <div class="row">
                <div class="col-md-2 col-xs-hidden"></div>      
                    <div class="col-xs-12 col-md-4">
                    <fieldset>
                        <h4 class="red">Total de la factura</h4>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input class="form-control bigprice" type="number" name="monto" min="0" step="any" placeholder="00.00" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                            <p class="warning-txt">Debes introducir el importe total que has pagado, incluyendo impuestos.</p>
                        </div>
                        <br>
                        <div class="form-group">
                            <h4 class="red">Fecha de factura</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Desde:</span>
                                </div>
                                <input class="form-control datepicker" autocomplete="off" name="desde" data-date-format="dd/mm/yyyy" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Hasta: <span> </span></span>
                                </div>
                                <input class="form-control datepicker" autocomplete="off" data-date-format="dd/mm/yyyy" name="hasta" required>
                            </div>
                            <a href="#" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-md-4">
                    <fieldset>
                        <div class="form-group">
                            <h4 class="red">Tarifa contratada</h4>
                            <select name="tarifa" id="tarifa-gas" class="form-control unformat">
                                <option value="0">Seleccione una Opción</option>
                                <option value="7" class="tarifas gas-opt">3.1</option>
                                <option value="8" class="tarifas gas-opt">3.2</option>
                                <option value="9" class="tarifas gas-opt">3.3</option>
                                <option value="10" class="tarifas gas-opt">3.4</option>
                            </select>
                            <a href="#" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                        </div>
                        <br>
                        <h4 class="red">KW Consumidos</h4>
                        <div class="input-group space-bottom">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text">KW Consumidos</span>
                            </div> -->
                            <input class="form-control" type="number" step="0.01" name="precio_tarifa"step="any" required>
                            <div class="input-group-append">
                                <span class="input-group-text">kW</span>
                            </div>
                            <a href="#" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                        </div>
                        <br>
                        <h4 class="red">Término Fijo</h4>
                        <div class="input-group space-bottom">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text">Término Fijo</span>
                            </div> -->
                            <input class="form-control" type="number" name="precio_fijo" min="0" step="any" required>
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#myModalLuz" class="loadModalHelp"><i>i</i> ¿Dónde esta esto en mi factura?</a>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-2 col-sx-hidden"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3"><input id="submitBtn" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger submit-contactar" type="submit" value="Consultar"></div>
                    <div class="col-md-3"><button class="showmetheform btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Prefiero que me llamen</button></div>
                    <div class="col-md-3"></div>
                </div>                
            </form>
        <div class="service-item"></div>
    </div>
</section>

<!-- form -->

<section class="ocultar no-background" id="form-contactar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 center">
            <h2 class="wow  we-call-u">Te llamamos!</h1>
                <p class="animated fadeIn">Te llamamos para una mejor atención y para ofrecerte la mejor oferta del momento</p>
            <br>
            <div class="check_mark hide">
                <div class="sa-icon sa-success animate">
                    <span class="sa-line sa-tip animateSuccessTip"></span>
                    <span class="sa-line sa-long animateSuccessLong"></span>
                    <div class="sa-placeholder"></div>
                    <div class="sa-fix"></div>
                </div>
            </div>
            <form class="wow " id="contactar-reg" action="{{ route('contactar') }}" method="post">
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

<!-- modal facturas help luz -->

<div class="modal fade" id="myModalLuzTarifa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Seleccione su empresa de Luz</h4>

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#endesa" aria-controls="endesa" role="tab" data-toggle="tab">Endesa</a>
                        </li>
                        <li role="presentation">
                            <a href="#naturgy" aria-controls="naturgy" role="tab" data-toggle="tab">Naturgy</a>
                        </li>
                        <li role="presentation">
                            <a href="#iberdrola" aria-controls="iberdrola" role="tab" data-toggle="tab">Iberdrola</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="endesa">
                            <img src="/img/endesa-tarifa.jpg" alt="endesa">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="naturgy">
                            <img src="/img/naturgy-tarifa.jpg" alt="naturgy">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="iberdrola">
                            <img src="/img/iberdrola-tarifa.jpg" alt="iberdrola">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalLuzPotencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Seleccione su empresa de Luz</h4>

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#endesa-potencia" aria-controls="endesa" role="tab" data-toggle="tab">Endesa</a>
                        </li>
                        <li role="presentation">
                            <a href="#naturgy-potencia" aria-controls="naturgy" role="tab" data-toggle="tab">Naturgy</a>
                        </li>
                         <li role="presentation">
                            <a href="#iberdrola-potencia" aria-controls="iberdrola" role="tab" data-toggle="tab">Iberdrola</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="endesa-potencia">
                            <img src="/img/endesa-potencia.jpg" alt="endesa">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="naturgy-potencia">
                            <img src="/img/naturgy-potencia.jpg" alt="naturgy">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="iberdrola-potencia">
                            <img src="/img/iberdrola-potencia.jpg" alt="iberdrola">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalLuzEnergia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Seleccione su empresa de Luz</h4>

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#endesa-energia" aria-controls="endesa" role="tab" data-toggle="tab">Endesa</a>
                        </li>
                        <li role="presentation">
                            <a href="#naturgy-energia" aria-controls="naturgy" role="tab" data-toggle="tab">Naturgy</a>
                        </li>
                         <li role="presentation">
                            <a href="#iberdrola-energia" aria-controls="iberdrola" role="tab" data-toggle="tab">Iberdrola</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="endesa-energia">
                            <img src="/img/endesa-energia.jpg" alt="endesa">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="naturgy-energia">
                            <img src="/img/naturgy-energia.jpg" alt="naturgy">
                        </div>
                        <div role="tabpanel" class="tab-pane" id="iberdrola-energia">
                            <img src="/img/iberdrola-energia.jpg" alt="iberdrola">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end modal facturas help luz -->

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js"></script>
<script>
    
    window.onload = function() {
        document.body.className += " loaded";
    }

    $(document).ready(function(){

    	$('.luz-p').keyup(function(){
    		tarifa = $('#tarifa-luz').val();
    		input = $(this);

    		if(tarifa == 1)
    		{
    				if(input.val() > 10){
                        input.addClass('error');

                    } else {
                        input.removeClass('error');
                    }

    		}else if(tarifa == 2)
    		{
    				if(input.val() > 10){
                        input.addClass('error');

                    } else {
                        input.removeClass('error');
                    }
    		}else if(tarifa == 3)
    		{
    				if(input.val() < 10){
	                	input.addClass('error');
	                } else if(input.val() > 15){
	                	input.addClass('error');
	                } else {
                        input.removeClass('error');
                    }

    		}else if(tarifa == 5)
    		{
    				if(input.val() < 15){
	                	input.addClass('error');

	                } else {
                        input.removeClass('error');
                    }
    		}
	            
                
               
    	});

        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            todayHighlight: true
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

        $('#tarifa-luz').change(function(){
            // 1 0 3
            if($(this).val() == 1 || $(this).val() == 3)
            {
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').val(0);
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').prop('readonly', true);
            }else{
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').val('');
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').attr("required", "true");
                $('#pp2-luz , #pp3-luz , #ep2-luz , #ep3-luz').prop('readonly', false);


            }
        });

        $('.showmetheform').click(function(event){
            event.preventDefault();
            $("#form-contactar").show();
            $('html, body').animate({
                scrollTop: $(document).height() 
            }, 2000);
        });

        // enable submit btn on agree terms
        $("#the-terms").click(function() {
            if ($(this).is(":checked")) {
                $(".submit-contactar").removeAttr("disabled");
            } else {
                $(".submit-contactar").attr("disabled", "disabled");
            }
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
                    $('#contratar-luz').hide();
                    $('#contratar-gas').hide();
                    $('.check_mark').removeClass('hide');
                    $(".sa-success").addClass("hide");
                    setTimeout(function() {
                        $(".sa-success").removeClass("hide");
                    }, 10);
                    $("h3.gray").html(data.guardado);
                }
            });
        });
    
    });
</script>
@endsection