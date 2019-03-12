@extends('layouts.master')
@section('content')
<style>
  /*tabs*/

.tabs {
  left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    position: relative;
    background: white;
}
.tabs input[name="tab-control"] {
  display: none;
}
.tabs .content section h2,
.tabs ul li label {
  font-weight: bold;
  font-size: 18px;
  color: #428BFF;
}
.tabs ul {
  list-style-type: none;
  padding-left: 0;
  display: flex;
  flex-direction: row;
  margin-bottom: 10px;
  justify-content: space-between;
  align-items: flex-end;
  flex-wrap: wrap;
}
.tabs ul li {
  box-sizing: border-box;
  flex: 1;
  width: 25%;
  padding: 0 10px;
  text-align: center;
}
.tabs ul li label {
  transition: all 0.3s ease-in-out;
    color: #929daf;
    padding: 0 10px;
    /* overflow: hidden; */
    /* text-overflow: ellipsis; */
    display: block;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    /* white-space: nowrap; */
    -webkit-touch-callout: none;
    /* -webkit-user-select: none; */
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    float: left;
}
.tabs ul li label br {
  display: none;
}
.tabs ul li label svg {
  fill: #929daf;
  height: 1.2em;
  vertical-align: bottom;
  margin-right: 0.2em;
  transition: all 0.2s ease-in-out;
}
.tabs ul li label:hover, .tabs ul li label:focus, .tabs ul li label:active {
  outline: 0;
  color: #bec5cf;
}
.tabs ul li label:hover svg, .tabs ul li label:focus svg, .tabs ul li label:active svg {
  fill: #bec5cf;
}
.tabs .slider {
  position: relative;
  width: 25%;
  transition: all 0.33s cubic-bezier(0.38, 0.8, 0.32, 1.07);
}
.tabs .slider .indicator {
  position: relative;
  width: 50px;
  max-width: 100%;
  margin: 0 auto;
  height: 4px;
  background: #428BFF;
  border-radius: 1px;
}
.tabs .content {
  margin-top: 30px;
}
.tabs .content section {
  display: none;
  -webkit-animation-name: content;
          animation-name: content;
  -webkit-animation-direction: normal;
          animation-direction: normal;
  -webkit-animation-duration: 0.3s;
          animation-duration: 0.3s;
  -webkit-animation-timing-function: ease-in-out;
          animation-timing-function: ease-in-out;
  -webkit-animation-iteration-count: 1;
          animation-iteration-count: 1;
  line-height: 1.4;
  padding:0;
}
.tabs .content section h2 {
  color: #428BFF;
  display: none;
}
.tabs .content section h2::after {
  content: "";
  position: relative;
  display: block;
  width: 30px;
  height: 3px;
  background: #428BFF;
  margin-top: 5px;
  left: 1px;
}
.tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label {
  cursor: default;
  color: #428BFF;
}
.tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label svg {
  fill: #428BFF;
}
@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(1):checked ~ ul > li:nth-child(1) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}
.tabs input[name="tab-control"]:nth-of-type(1):checked ~ .slider {
  -webkit-transform: translateX(0%);
          transform: translateX(0%);
}
.tabs input[name="tab-control"]:nth-of-type(1):checked ~ .content > section:nth-child(1) {
  display: block;
}
.tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label {
  cursor: default;
  color: #428BFF;
}
.tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label svg {
  fill: #428BFF;
}
@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(2):checked ~ ul > li:nth-child(2) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}
.tabs input[name="tab-control"]:nth-of-type(2):checked ~ .slider {
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}
.tabs input[name="tab-control"]:nth-of-type(2):checked ~ .content > section:nth-child(2) {
  display: block;
}
.tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label {
  cursor: default;
  color: #428BFF;
}
.tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label svg {
  fill: #428BFF;
}
@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(3):checked ~ ul > li:nth-child(3) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}
.tabs input[name="tab-control"]:nth-of-type(3):checked ~ .slider {
  -webkit-transform: translateX(200%);
          transform: translateX(200%);
}
.tabs input[name="tab-control"]:nth-of-type(3):checked ~ .content > section:nth-child(3) {
  display: block;
}
.tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label {
  cursor: default;
  color: #428BFF;
}
.tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label svg {
  fill: #428BFF;
}
@media (max-width: 600px) {
  .tabs input[name="tab-control"]:nth-of-type(4):checked ~ ul > li:nth-child(4) > label {
    background: rgba(0, 0, 0, 0.08);
  }
}
.tabs input[name="tab-control"]:nth-of-type(4):checked ~ .slider {
  -webkit-transform: translateX(300%);
          transform: translateX(300%);
}
.tabs input[name="tab-control"]:nth-of-type(4):checked ~ .content > section:nth-child(4) {
  display: block;
}
@-webkit-keyframes content {
  from {
    opacity: 0;
    -webkit-transform: translateY(5%);
            transform: translateY(5%);
  }
  to {
    opacity: 1;
    -webkit-transform: translateY(0%);
            transform: translateY(0%);
  }
}
@keyframes content {
  from {
    opacity: 0;
    -webkit-transform: translateY(5%);
            transform: translateY(5%);
  }
  to {
    opacity: 1;
    -webkit-transform: translateY(0%);
            transform: translateY(0%);
  }
}
@media (max-width: 1000px) {
  .tabs ul li label {
    white-space: initial;
  }
  .tabs ul li label br {
    display: initial;
  }
  .tabs ul li label svg {
    height: 1.5em;
  }
}
@media (max-width: 600px) {
  .tabs ul li label {
    padding: 5px;
    border-radius: 5px;
  }
  .tabs ul li label span {
    display: none;
  }
  .tabs .slider {
    display: none;
  }
  .tabs .content {
    margin-top: 20px;
  }
  .tabs .content section h2 {
    display: block;
  }
}

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


</style>

<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Planes</h1>
    <p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
  </div>
</header>

<section class="about" id="about">
  <div class="container">
    <h2 class="center wow blue forced-top animated fadeIn text-center">Sobre Nosotros</h2>
    <div class="row">
      <div class="col-lg-4 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <img class="icons" src="{{ asset('/img/01.svg') }}" alt="flag">
        <h3 class="blue center">Movimiento</h3>
        <p class="gray big-txt">Los comerciales ganan dinero con nuestras facturas, eso se ha terminado, nace No Negocies, donde tú eres tu propio comercial.</p>
          </div>
        </div>
        
      </div>
      <div class="col-lg-4 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <img class="icons" src="{{ asset('/img/02.svg') }}" alt="target">
        <h3 class="blue center">Objetivo</h3>
        <p class="gray big-txt">Tenemos por objetivo ofrecerte un mundo de posibilidades para ahorrar en tus facturas y que ganes dinero con ello.</p>
          </div>
        </div>
        
      </div>
      <div class="col-lg-4 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <img class="icons" src="{{ asset('/img/03.svg') }}" alt="magic">
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
    <h1 class="wow blue forced-top animated fadeIn">Para quienes?</h1>
    <div class="row">
      <div class="col-lg-6">
        <div class="tabs">
            <input type="radio" id="tab1" name="tab-control" checked>
            <input type="radio" id="tab2" name="tab-control">
            <input type="radio" id="tab3" name="tab-control">  
            <input type="radio" id="tab4" name="tab-control">
            <ul>
              <li><label for="tab1" role="button"><span>Particulares</span></label></li>
              <li><label for="tab2" role="button"><span>Empresa</span></label></li>
              <li><label for="tab3" role="button"><span>Comunidades</span></label></li>
              <li><label for="tab4" role="button"><span>Administradores</span></label></li>
            </ul>
            <div class="slider"><div class="indicator"></div></div>
            <div class="content">
            <section>
            Texto para Particulares</section>
            <section>
            Texto para Empresas</section>
            <section>
            Texto para Comunidades</section>
            <section>
            Texto para Administradores</section>
            </div>
        </div>
      </div>
      <div class="col-lg-6"><img src="{{ asset('/img/target.png') }}" alt="target"></div>
    </div>
  </div>
</section>

<section>
  <style>.icons-list span.icon {font-size: 30px}</style>
  <div class="container">
    <h2>test icons</h2>
    <div class="row">
      <div class="icons-list">
      <span class="icon flaticon-shopping-cart-of-checkered-design "></span>
<span class="icon flaticon-timer"></span>
<span class="icon flaticon-blocks-with-angled-cuts"></span>
<span class="icon flaticon-quote"></span>
<span class="icon flaticon-next"></span>
<span class="icon flaticon-phone-receiver"></span>
<span class="icon flaticon-play"></span>
<span class="icon flaticon-handshake"></span>
<span class="icon flaticon-rss"></span>
<span class="icon flaticon-comment"></span>
<span class="icon flaticon-social-media"></span>
<span class="icon flaticon-calendar"></span>
<span class="icon flaticon-next-1"></span>
<span class="icon flaticon-phone-call"></span>
<span class="icon flaticon-placeholder"></span>
<span class="icon flaticon-settings"></span>
<span class="icon flaticon-link "></span>
<span class="icon flaticon-garbage "></span>
<span class="icon flaticon-internet "></span>
<span class="icon flaticon-network "></span>
<span class="icon flaticon-clock "></span>
<span class="icon flaticon-clock-1 "></span>
<span class="icon flaticon-diamond "></span>
<span class="icon flaticon-computer "></span>
<span class="icon flaticon-e-mail-envelope "></span>
<span class="icon flaticon-message "></span>
<span class="icon flaticon-chat"></span>
<span class="icon flaticon-growth"></span>
<span class="icon flaticon-play-button"></span>
<span class="icon flaticon-right-arrow"></span>
<span class="icon flaticon-back"></span>
<span class="icon flaticon-play-button-1"></span>
<span class="icon flaticon-play-button-2"></span>
<span class="icon flaticon-upload"></span>
<span class="icon flaticon-multimedia"></span>
<span class="icon flaticon-target"></span>
<span class="icon flaticon-paper-plane"></span>
<span class="icon flaticon-play-button-3"></span>
<span class="icon flaticon-next-2"></span>
<span class="icon flaticon-next-3"></span>
<span class="icon flaticon-back-1"></span>
<span class="icon flaticon-back-2"></span>
<span class="icon flaticon-menu"></span>
<span class="icon flaticon-menu-1"></span>
<span class="icon flaticon-menu-button"></span>
<span class="icon flaticon-menu-2"></span>
<span class="icon flaticon-magnifying-glass"></span>
<span class="icon flaticon-tick"></span>
<span class="icon flaticon-next-5"></span>
<span class="icon flaticon-back-3"></span>
<span class="icon flaticon-smartphone"></span>
<span class="icon flaticon-success"></span>
<span class="icon flaticon-clock-2"></span>
<span class="icon flaticon-placeholder-1"></span>
<span class="icon flaticon-settings-1"></span>
<span class="icon flaticon-stopwatch"></span>
<span class="icon flaticon-add"></span>
<span class="icon flaticon-substract"></span>
<span class="icon flaticon-mortarboard"></span>
<span class="icon flaticon-exam"></span>
<span class="icon flaticon-attachment"></span>
<span class="icon flaticon-headset"></span>
<span class="icon flaticon-download-arrow"></span>
<span class="icon flaticon-plus-symbol"></span>
<span class="icon flaticon-bar-chart"></span>
<span class="icon flaticon-startup"></span>
<span class="icon flaticon-diamond-1"></span>
<span class="icon flaticon-headphones"></span>
<span class="icon flaticon-money-bag"></span>
<span class="icon flaticon-coin"></span>
<span class="icon flaticon-piggy-bank"></span>
<span class="icon flaticon-like"></span>
<span class="icon flaticon-cancel"></span>
<span class="icon flaticon-cancel-1"></span>
<span class="icon flaticon-share"></span>
<span class="icon flaticon-share-1"></span>
<span class="icon flaticon-price-tag"></span>
<span class="icon flaticon-tag"></span>
<span class="icon flaticon-right-quotation-mark"></span>
<span class="icon flaticon-quote-left"></span>
<span class="icon flaticon-quote-1"></span>
<span class="icon flaticon-right-quote"></span>
<span class="icon flaticon-quotations"></span>
<span class="icon flaticon-quote-2"></span>
<span class="icon flaticon-left-quote"></span>
<span class="icon flaticon-double-quotes"></span>
<span class="icon flaticon-left-quote-1"></span>
<span class="icon flaticon-quote-sign"></span>
<span class="icon flaticon-right-quote-sign"></span>
<span class="icon flaticon-left-quotes"></span>
<span class="icon flaticon-electrician"></span>
<span class="icon flaticon-map"></span>
<span class="icon flaticon-clock-3"></span>
<span class="icon flaticon-hourglass"></span>
<span class="icon flaticon-email"></span>
<span class="icon flaticon-email-1"></span>
<span class="icon flaticon-briefcase"></span>
<span class="icon flaticon-briefcase-"></span> 
<span class="icon flaticon-document"></span>
<span class="icon flaticon-contract"></span>
<span class="icon flaticon-document-1"></span>
<span class="icon flaticon-cap"></span>
<span class="icon flaticon-medal"></span>
<span class="icon flaticon-coffee-cup"></span>
<span class="icon flaticon-straight-quotes"></span>
<span class="icon flaticon-cooperation"></span>
<span class="icon flaticon-pdf"></span>
<span class="icon flaticon-pdf-1"></span>
<span class="icon flaticon-back-4"></span>
<span class="icon flaticon-reply"></span>
<span class="icon flaticon-reply-1"></span>
<span class="icon flaticon-law"></span>
<span class="icon flaticon-statistics"></span>
<span class="icon flaticon-line-chart"></span>
<span class="icon flaticon-direction"></span>
<span class="icon flaticon-eye"></span>
<span class="icon flaticon-share-option"></span>
<span class="icon flaticon-notebook-computer"></span>
<span class="icon flaticon-student"></span>
<span class="icon flaticon-layers"></span>
<span class="icon flaticon-comment-1"></span>
<span class="icon flaticon-paper"></span>
<span class="icon flaticon-home"></span>
<span class="icon flaticon-house"></span>
<span class="icon flaticon-download"></span>
<span class="icon flaticon-hand-shake"></span>
<span class="icon flaticon-hand-shake-1"></span>
<span class="icon flaticon-planet-earth"></span>
<span class="icon flaticon-map-1"></span>
<span class="icon flaticon-next-6"></span>
<span class="icon flaticon-next-7"></span>
<span class="icon flaticon-next-8"></span>
<span class="icon flaticon-chronometer"></span>
<span class="icon flaticon-monitor"></span>
<span class="icon flaticon-left-arrow"></span>
<span class="icon flaticon-back-5"></span>
<span class="icon flaticon-back-7"></span>
<span class="icon flaticon-eye-1"></span>
<span class="icon flaticon-menu-3"></span>
<span class="icon flaticon-contact"></span>
<span class="icon flaticon-collaboratio"></span> 
<span class="icon flaticon-organization"></span>
<span class="icon flaticon-partner"></span>
<span class="icon flaticon-money"></span>
<span class="icon flaticon-notes"></span>
<span class="icon flaticon-target-1"></span>
<span class="icon flaticon-line-chart-1"></span>
<span class="icon flaticon-line-graph-and-men"></span>
<span class="icon flaticon-user-with-computer-monitor-and-bar-graphs"></span>
<span class="icon flaticon-shopping-cart"></span>
<span class="icon flaticon-graph-line-screen"></span>
<span class="icon flaticon-chart-analysis"></span>
<span class="icon flaticon-supermarket"></span>
<span class="icon flaticon-growth-1"></span>
<span class="icon flaticon-monitor-1"></span>
<span class="icon flaticon-network-1"></span>
<span class="icon flaticon-banknote"></span>
<span class="icon flaticon-start"></span>
<span class="icon flaticon-engineer"></span>
<span class="icon flaticon-help"></span>
<span class="icon flaticon-risk"></span>
<span class="icon flaticon-report"></span>
<span class="icon flaticon-shield"></span>
<span class="icon flaticon-two-quote"></span> 
<span class="icon flaticon-board"></span>
<span class="icon flaticon-chess"></span>
<span class="icon flaticon-document-"></span> 
<span class="icon flaticon-bankin"></span> 
</div>
    </div>
  </div>
</section>

@endsection