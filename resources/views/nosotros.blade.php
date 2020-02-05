@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/nosotros.css') }}">
@endsection
@section('content')

<header class="page">
  <div class="container">
    <h2 class="center wow blue animated fadeIn text-center">Sobre Nosotros</h2>
    <p class="center">Somos una nueva plataforma que rompe con lo establecido<br>y te permite ganar dinero mientras ahorras.</p>
  </div>
</header>

<section class="about" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <img class="icons" src="{{ asset('/img/idea.svg') }}" alt="flag">
        <h3 class="blue center">Movimiento</h3>
        <p class="gray big-txt">Los comerciales ganan dinero con nuestras facturas, eso se ha terminado, nace No Negocies, donde tú eres tu propio comercial.</p>
          </div>
        </div>
        
      </div>
      <div class="col-lg-4 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <img class="icons" src="{{ asset('/img/target.svg') }}" alt="target">
        <h3 class="blue center">Objetivo</h3>
        <p class="gray big-txt">Tenemos por objetivo ofrecerte un mundo de posibilidades para ahorrar en tus facturas y que ganes dinero con ello.</p>
          </div>
        </div>
        
      </div>
      <div class="col-lg-4 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <img class="icons" src="{{ asset('/img/movement.svg') }}" alt="magic">
        <h3 class="blue center">Concepto</h3>
        <p class="gray big-txt">Te ayudamos a encontrar las mejores opciones y al contratar una oferta se te abonará la comisión específica en tu cuenta.</p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

<section id="targets" style="height: 100vh">
    <div class="container">
        <h2 class="wow white forced-top animated fadeIn">Para quienes?</h2>
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#particulares" data-toggle="tab">
                                            Particulares
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#empresas" data-toggle="tab">
                                            Empresas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#comunidades" data-toggle="tab">
                                            Comunidades
                                        </a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#administradores" data-toggle="tab">
                                            Administradores
                                        </a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><div class="card-body ">
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="particulares">
                            <p>En nuestra plataforma encontrara todos los servicios que dispone en su domicilio y para su día a día<br><br>Productos como:<br><br>
                                Luz, gas, telefonía, seguros... elija su oferta, comienze a ahorrar y lo mejor de todo, cobre por ello!</p>
                        </div>
                        <div class="tab-pane" id="empresas">
                            <p>Tenemos todos los productos que necesitas para tu empresa.
                                Luz,telefonía, seguros, formación bonificada gratuita, alarmas...<br><br>
                                 Elije la compania y el presupuesto que mas se ajuste a tus necesidades, contrátalo tu mismo y cobra por ello
                            </p>
                        </div>
                        <div class="tab-pane" id="comunidades">
                            <p>Tenemos la solución a tus problemas, asi como los servicios que necesitais en vuestro dia a dia.<br>
                                Luz, seguros, mantenimientos, ascensores, sercicio de administración de fincas.<br>Le ofrecemos la posibilidad de una valoracion gratuita de reduccion de costes de su comunidad, realizada por un gestor personal.
                                <br><br>
                                Por supuesto le derivaremos una comisión por todos los servicios que disfrutan en su comunidad.
                            </p>
                        </div>
                        <div class="tab-pane" id="administradores">
                            <p>Disponemos de una solución integral para centralizar todos los productos y servicios que disponen en cada comunidad, tales como: luz, seguros, ascensores, telecomunicaciones, energia solar, cargadores para vehiculos eléctricos, etc.<br><br>Elije el mejor proveedor, tenlo todo centralizado, gana clientes y cobra por ello.<br><br>Para hacerte la vida más facil, en este apartado dispones de un gestor personal que realizará todas las gestiones por ti.</p>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
</section>

@endsection