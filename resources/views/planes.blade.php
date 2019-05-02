@extends('layouts.master')
@section('header')
<style>

img.check {
    width: 20px;
    margin-right: 10px;
}

ul.fa-ul.gray {
    padding-left: 15px;
}

.gray li {
    padding: 5px 0;
}


.row {
    padding-top: 50px;
}


.card-body {
    border: 2px solid #e8e8e8;
    background-color: #fff;
    padding: 30px 25px;
    border-radius: 32px;
    margin-bottom: 50px;
    position: relative;
    transition: .5s ease-in-out;
    z-index: 2;
}

.card.mb-5.mb-lg-0 {
    border: 0;
}

.card {
    border: 0;
}

span.currency {
    font-size: 30px;
}

span.period {
    font-size: 20px;
    color: black;
}

h5.card-title {
    color: black !important;
    margin: 30px 0;
    font-size: 30px;
}

h6.card-price {
    color: #e73747 !important;
    font-size: 46px;
    padding-bottom: 20px;
}

.card-body:hover {
    border-color: #e8ca49;
    transform: translateY(-5px);
}

.card-body:hover a.btn.btn-block.btn-primary.text-uppercase{
  color: white !important;
  background: #e73747 !important;
}

.card-body:hover h5.card-title:before{
  background: #FF034C;
}

a.btn.btn-block.btn-primary.text-uppercase {
    border-radius: 32px!important;
    border: none!important;
    width: 200px!important;
    background: #e8cb4a!important;
    color: #000!important;
    font-size: 14px!important;
    line-height: 14px!important;
    padding: 16px 0!important;
    text-align: center!important;
    text-transform: uppercase!important;
    letter-spacing: 1.8px;
    font-weight: 600;
    margin: 0 auto;
    transition: .5s ease-in-out;
}

a.btn.btn-block.btn-primary.text-uppercase:hover {
    background: #FF034C !important;
    color: white !important;
}

img.plan-img {
    height: 80px;
    margin: 0 auto;
    display: block;
}


h5.card-title:before{
  height: 2px;
    width: 130px;
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    background: #dedbdc;
    top: 189;
    margin: 0 auto;
    transition: .5s esae-in-out;
}

.card-body-featured{
  background: #ffffff;
    padding: 45px;
    -webkit-box-shadow: 7px 5px 30px rgba(72, 73, 121, 0.15);
    -moz-box-shadow: 7px 5px 30px rgba(72, 73, 121, 0.15);
    box-shadow: 7px 5px 30px rgba(72, 73, 121, 0.15);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
}

.col-lg-4.wow.featured.fadeInUp.animated {
    z-index: 999;
}

section{
      box-sizing: border-box;
      overflow: hidden;
      position: relative
}

/*faqs*/

details {
  width: 75%;
  min-height: 5px;
  max-width: 700px;
  padding: 45px 70px 45px 45px;
  margin: 0 auto;
  position: relative;
  font-size: 22px;
  border: 1px solid rgba(0,0,0,.1);
  border-radius: 15px;
  box-sizing: border-box;
  transition: all .3s;
}

details + details {
  margin-top: 20px;
}

details[open] {
    min-height: 50px;
    background-color: #ffffff;
    box-shadow: 2px 2px 20px rgba(0,0,0,.2);
}

details p {
  color: #96999d;
  font-weight: 300;
}

summary {
  font-weight: 500;
  cursor: pointer;
}


summary:focus {
  outline: none;
}

summary::-webkit-details-marker {
  display: none
}

summary::after {
  padding: 20px;
  position: absolute;
  top: 50%;
  right: 0;
  color: rebeccapurple;
  font-size: 15px;
  font-style: normal;
  font-variant-caps: normal;
  font-variant-ligatures: normal;
  font-weight: 900;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  content: "V";
  transform: translateY(-50%);
  transition: .3s ease;
}

details[open] summary::after {
  content: "X";
  font-size: 30px;
  top: 0;
  transform: translateY(0);
  transition: .3s ease;
}

details[open] summary:hover::after {
  animation: pulse 1s ease;
}

@keyframes pulse {
  25% {
    transform: scale(1.1);
  }
  50% {
    transform: scale(1);
  }
  75% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}
details{
  background: #f1f1f1
}
.faq{
  background: #393975 url({{ asset('/img/bg-hero-page.svg') }}) repeat;
}
.faq h2{
  color: white !important;padding-bottom: 60px
}
#contrato-screen{
    display: none;
    max-width: 900px;
    max-width: 70%;
    margin:0 auto;
}
.contrato-texto{
    height: 300px;
    overflow-y: scroll;
}

</style>

@endsection
@section('content')


  <header class="page">
      <div class="container">
        <h1 class="animated fadeInLeft">Planes</h1>
        <p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
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

  <section class="pricing py-5" id="planes-screen">
    <div class="container">
      <div style="height: 40px"></div>
      <h2 class="text-center">Nuestros Planes</h2>
      <p class="text-center">Puedes ganar mas dinero por el plan que elijas, ademas de tener mas ventajas</p>
      <div class="row">
        <!-- Free Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <img src="{{ asset('svg/free.svg') }}" alt="free" class="plan-img">
              <h5 class="card-title text-muted text-uppercase text-center">Gratis</h5>
              <ul class="fa-ul gray">
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Comparador</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Hasta 5 contrataciones</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Estudio reducción de costes</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Asistencia gratuita</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobra por tus contrataciones </li>
              </ul>
              <h6 class="card-price text-center"><span class="tarifa-plan">0</span><span class="currency">€</span><span class="period"></span></h6>
              @guest
              @else
              <a href="#" data-id="0" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
              @endguest
            </div>
          </div>
        </div>
        <!-- Plus Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <img src="{{ asset('svg/premium.svg') }}" alt="free" class="plan-img">
              <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
              <ul class="fa-ul gray">
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Contrataciónes ilimitadas</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> cobra un 40% más</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cartera de clientes</li>  
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobra renovaciones</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Panel de control propio</li> 
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Acceso a formación</li>
              </ul>
              <h6 class="card-price text-center"><span class="tarifa-plan">9,90</span><span class="currency">€</span><span class="period"> x mes</span></h6>
              @guest
              @else
              <a href="#" data-id="2" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
              @endguest
            </div>
          </div>
        </div>
        <!-- Pro Tier -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('svg/platinum.svg') }}" alt="free" class="plan-img">
              <h5 class="card-title text-muted text-uppercase text-center">Platinum</h5>
              <ul class="fa-ul gray">
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Contrataciónes ilimitadas</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobras la máxima comisión</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cartera de clientes</li>  
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobras renovaciones</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Panel de control propio</li> 
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Acceso a formación</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Asistencia para ofertas</li>
              </ul>
              <h6 class="card-price text-center"><span class="tarifa-plan">29,90</span><span class="currency">€</span><span class="period"> x mes</span></h6>
              @guest
              @else
              <a href="#" data-id="3" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
              @endguest
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section id="contrato-screen">

      <div class="text-left">
          <a href="#" class="btn btn-primary p-1 mb-3" id="btn-atras">&larr; Elegir otro plan</a>
      </div>

    <h3>Plan a contratar: <span id="nombre-plan"></span></h3>
    <h3>Tarifa mensual: <span id="tarifa-plan"></span> €</h3>

  <div class="contrato-texto p-3">{!! $legal !!}</div>

  <form action="{{ route('panel.plan') }}" method="post">
    @csrf
    <input type="hidden" name="plan" value="" id="plan">
    

    @guest
    @else

    @if(Auth::user()->tarjetas->first() == null)

    <div class="card mt-3 mb-3">
          <div class="card-header p-4">
            <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h4 class="card-header-title">
              Datos Requeridos para contratar
              </h4>
            </div>
            
            </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                
                <tbody>
                
                    <tr>
                      <td width="40%">
                        Tarjeta
                      </td>
                      <td>
                        <input type="text" class="form-control" value="" name="tarjeta" required>
                      </td>
                    </tr>
                  
                    <tr>
                      <td>
                      Código de Seguridad (CVV)
                      </td>
                      <td>
                      <input type="number" min="0" class="form-control" value="" name="cvv" required>
                      </td>
                    </tr>
                  
                    <tr>
                      <td>
                      Vence
                      </td>
                      <td>
                      <input type="text" class="form-control" value="" name="vence" required>
                      </td>
                    </tr>
                
                </tbody>
              </table>
            </div>
          </div>
        </div>

    @endif

    @endguest
    
    <div class="form-check mt-3 mb-3">
      <input type="checkbox" class="form-check-input" id="terminos-contrato">
      <label class="form-check-label" for="terminos-contrato">He leído y acepto los términos y condiciones</label>
    </div>
  
    <div class="text-center">
      <button type="submit" class="btn btn-primary text-uppercase p-3 confirmar-contrato" disabled>Contratar</button>
    </div>
  </form>

</section>

<section class="faq">
  <h2 class="text-center">Preguntas Frecuentes</h2>
  <details open>
  <summary>Does this product have what I need?</summary>
  <p>Totally. Totally does.</p>
  </details>
  <details>
  <summary>Can I use it all the time?</summary>
  <p>Of course you can, we won't stop you.</p>
  </details>
  <details>
  <summary>Are there any restrictions?</summary>
  <p>Only your imagination my friend. Go forth!</p>
  </details>
</section>

@endsection
@section('scripts')
  <script>
    $(document).ready(function(){


      $('.contratar').click(function(e){

        e.preventDefault();

        planNombre = $(this).parents('.card-body').find('.card-title').text();
        precio = $(this).parents('.card-body').find('.tarifa-plan').text();
        planId = $(this).data('id');

        $('#nombre-plan').text(planNombre);
        $('#tarifa-plan').text(precio);
        $('#plan').val(planId);

        $('#planes-screen').hide();
        $('#contrato-screen').show();

        $('html, body').animate({
                    scrollTop: $('#contrato-screen').offset().top
            }, 700);

        $('#terminos-contrato').click(function(){
          if ($(this).is(":checked")) {
                $(".confirmar-contrato").removeAttr("disabled");
            } else {
                $(".confirmar-contrato").attr("disabled", "disabled");
            }
        });

      });

      $('#btn-atras').click(function(event){
        event.preventDefault();
        $('#contrato-screen').hide();
        $('#planes-screen').show();

        $('html, body').animate({
                    scrollTop: $('#planes-screen').offset().top
            }, 700);
      });
    });
  </script>
@endsection