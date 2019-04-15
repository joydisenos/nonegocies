@extends('layouts.master')
@section('content')
<style>
 

/*about*/

.col-lg-4.wow.featured.fadeInUp.animated {
    z-index: 999;
}

.card-body-featured {
    padding: 30px;
    text-align: center;
}

.big-txt {
    font-size: 15px;
    line-height: 1.5;
    text-align: left !important;
}

.card-body-featured h3{
    font-size: 30px;
    font-weight: bold;
    color: #133871;
    padding: 10px 0;
}

.col-md-6.text-side {
    background: #f1f1f1;
    padding: 30px;
    border-radius: 6px;
    -webkit-box-shadow: 0 4px 46px rgba(0,0,0,.1);
    -ms-box-shadow: 0 4px 46px rgba(0,0,0,.1);
    box-shadow: 0 4px 46px rgba(0,0,0,.1);
}

img.icons{
    padding-top: 7px;
    margin-left: -1px;
    margin:0 auto;
    display:block;
    height: 140px;
}

div.card .card-header-primary {
    background: linear-gradient(to right, #FF8441 0%, #f53d96 100%);
    box-shadow: 0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgba(255, 87, 34, 0.44);
}

div.card {
    border: 0;
    margin-bottom: 30px;
    margin-top: 30px;
    border-radius: 6px;
    color: rgba(0,0,0,.87);
    background: #fff;
    width: 100%;
}

div.card.card-plain {
    background: transparent;
    box-shadow: none;
}
div.card .card-header {
    border-radius: 3px;
    padding: 1rem 15px;
    margin-left: 15px;
    margin-right: 15px;
    margin-top: -30px;
    border: 0;
}

.nav-tabs .nav-link.active:after{
        background: #133273 !important;
}

.card-plain .card-header:not(.card-avatar) {
    margin-left: 0;
    margin-right: 0;
}

.div.card .card-body{
    padding: 15px 30px;
}

div.card .card-header-danger {
    background: linear-gradient(60deg,#ef5350,#d32f2f);
    box-shadow: 0 5px 20px 0 rgba(0,0,0,.2), 0 13px 24px -11px rgba(244,67,54,.6);
}


.card-nav-tabs .card-header {
    margin-top: -30px!important;
}

.card .card-header .nav-tabs {
    padding: 0;
}

.nav-tabs {
    border: 0;
    border-radius: 3px;
    padding: 0 15px;
}

.nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

.nav-tabs .nav-item {
    margin-bottom: -1px;
}

.nav-tabs .nav-item .nav-link.active {
    background-color: hsla(0,0%,100%,.2);
    transition: background-color .3s .2s;
}

.nav-tabs .nav-item .nav-link{
    border: 0!important;
    color: #fff!important;
    font-weight: 500;
}

.nav-tabs .nav-item .nav-link {
    color: #fff;
    border: 0;
    margin: 0;
    border-radius: 3px;
    line-height: 24px;
    text-transform: uppercase;
    padding: 10px;
    background-color: transparent;
    transition: background-color .3s 0s;
}

.nav-link{
    display: block;
}

.nav-tabs .nav-item .material-icons {
    margin: -1px 5px 0 0;
    vertical-align: middle;
}

.nav .nav-item {
    position: relative;
}

.tab-pane p {
    text-align: left;
    color: #929FAD !important
}

section#targets {
    background-image: -webkit-linear-gradient(top left, rgba(76, 216, 255, 0.7), rgba(30, 108, 217, 0.82)), url(/img/invoice.png);
    background-image: -o-linear-gradient(top left, rgba(76, 216, 255, 0.7), rgba(30, 108, 217, 0.82)), url(/img/invoice.png);
    background-image: linear-gradient(to bottom right, rgba(76, 216, 255, 0.7), rgba(30, 108, 217, 0.82)), url(/img/invoice.png);
    background-size: cover;
    background-position: center bottom;
    position: relative;
}

h1.wow.blue.forced-top.fadeIn.animated {
    padding: 0 0 50px 0;
}

</style>

<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Sobre Nosotros</h1>
    <p class="animated fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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

<section class="about" id="about">
  <div class="container">
    <h2 class="center wow blue forced-top animated fadeIn text-center">Sobre Nosotros</h2>
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

<section id="targets">
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
                            <p>tenga la posibilidad de que todos los servicios que dispone tanto en su domicilio como para su dia , a dia,los encontrara en este apartado.
                                Productos como
                                LUZ,GAS,TELEFONIA,SEGUROS..ELIJA SU OFERTA COMIENZE A AHORRAR Y LO MEJOR DE TODO COBRE POR ELLO!!1
                            </p>
                        </div>
                        <div class="tab-pane" id="empresas">
                            <p>Tenemos todos los productos que necesitas para tu empresa.
                                LUZ,TELEFONIA,SEGUROS,CO FORMACION BONIFICADA GRATUITA, ALARMAS..
                                Elija el presupuesto más económico del mercado contrátalo tú mismo y cobra por ello.
                            </p>
                        </div>
                        <div class="tab-pane" id="comunidades">
                            <p>Tenemos tanto la solución a tus problemas como todos los servicios que necesitan en vuestro dia a dia.
                                LUZ,SEGUROS,MANTENIMIENTOS,ASCENSORES,servicio de adm.de fincas…
                                Ofrecemos un estudio gratuito de reducción de costes de  tu comunidad.
                                Y lo mejor de todo es que tendrán los mejores precios del mercado y les derivaremos una comisión por todos los servicios, que actualmente  disfrutáis.
                            </p>
                        </div>
                        <div class="tab-pane" id="administradores">
                            <p>Disponemos de una solución integral para centralizar todos los PYS que disponen en cada comunidad,tales como: LUZ,SEGUROS,ASCENSORES,TELECOMUNICACIONES,ENERGIA SOLAR,CARGADORES VEHICULOS ELECTRICOS ETC..
                                ELIJE EL MEJOR proveedor.
                                CENTRALIZADO,GANA CLIENTES Y COBRA POR ELLO.
                            </p>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
</section>

@endsection