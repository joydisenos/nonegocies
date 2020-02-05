@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/planes.css') }}">
@endsection
@section('content')

  <header class="page">
      <div class="container">
        <h2 class="center wow blue  fadeIn text-center animated">Nuestros Planes</h2>
        <p class="text-center">Tienes la posibilidad de ganar más dinero eligiendo un plan superior<br />ademas de tener numerosas ventajas.</p>
      </div>
  </header>

  <section class="pricing py-5" id="planes-screen">
    <div class="container">
      <div class="row">
        <!-- Free Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <img src="{{ asset('svg/free.svg') }}" alt="free" class="plan-img">
              <h5 class="card-title text-muted text-uppercase text-center">Gratis</h5>
              
              @guest
              @else
              @if(Auth::user()->plan_id == 0 || Auth::user()->plan_id == null)
              <div class="text-center mb-3">
                <div class="btn btn-primary pt-0 pl-3 pr-3 pb-0">
                  Activo
                </div>
              </div>
              @endif
              @endguest

              <ul class="fa-ul gray">
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Comparador</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Hasta 5 contrataciones</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Estudio de reducción de costes</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Asistencia gratuita</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobra por tus contrataciones </li>
              </ul>
              <h6 class="card-price text-center"><span class="tarifa-plan">0</span><span class="currency">€</span><span class="period"></span></h6>
              @guest
              @else
                @if(Auth::user()->plan_id != null && Auth::user()->comprobarTiempoPlan() > 12)
                <a href="#" data-id="0" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
                @endif
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

              @guest
              @else
              @if(Auth::user()->plan_id == 2)
              <div class="text-center mb-3">
                <div class="btn btn-primary pt-0 pl-3 pr-3 pb-0">
                  Activo
                </div>
              </div>
              @endif
              @endguest

              <ul class="fa-ul gray">
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Contrataciónes ilimitadas</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobra un 40% más</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cartera de clientes</li>  
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobra renovaciones</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Panel de control propio</li> 
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Acceso a formación</li>
              </ul>
              <h6 class="card-price text-center"><span class="tarifa-plan">29,90</span><span class="currency">€</span><span class="period"> x mes</span></h6>
              @guest
              @else
                @if(Auth::user()->plan_id < 2)
                <a href="#" data-id="2" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
                @elseif(Auth::user()->comprobarTiempoPlan() > 12)
                <a href="#" data-id="3" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
                @endif
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

              @guest
              @else
              @if(Auth::user()->plan_id == 3)
              <div class="text-center mb-3">
                <div class="btn btn-primary pt-0 pl-3 pr-3 pb-0">
                  Activo
                </div>
              </div>
              @endif
              @endguest


              <ul class="fa-ul gray">
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Contrataciónes ilimitadas</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobras la máxima comisión</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cartera de clientes</li>  
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Cobras renovaciones</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Panel de control propio</li> 
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Acceso a formación</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Asistencia para ofertas</li>
                <li><img class="check" src="{{ asset('img/checked.svg') }}" /> Plan de referidos</li>
              </ul>
              <h6 class="card-price text-center"><span class="tarifa-plan">99,99</span><span class="currency">€</span><span class="period"> x mes</span></h6>
              @guest
              @else
                @if(Auth::user()->plan_id < 3)
                <a href="#" data-id="3" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
                @elseif(Auth::user()->comprobarTiempoPlan() > 12)
                <a href="#" data-id="3" class="btn btn-block btn-primary text-uppercase contratar">Contratar</a>
                @endif
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

   

    @endguest
    
    <div class="form-check mt-3 mb-3">
      <input type="checkbox" class="form-check-input" id="terminos-contrato">
      <label class="form-check-label" for="terminos-contrato">He leído y acepto los términos y condiciones</label>
    </div>
  
    <div class="text-center">
      <button type="submit" class="btn btn-primary text-uppercase p-3 confirmar-contrato" id="contratar-plan-gratis" disabled>Contratar</button>
     
		<div id="error-message"></div>
    </div>
  </form>

   <div class="text-center m-4">
   	<button
		  class="btn btn-primary text-uppercase p-3 confirmar-contrato"
		  id="checkout-button-plan_FunT0R9WftTcgz"
		  role="link"
		  disabled
		>Contratar (Pago)</button>
   </div>

</section>

<section class="faq">
  <h2 class="text-center">Preguntas Frecuentes</h2>
  <details>
  <summary>¿Tengo permanencia?</summary>
  <p>No, no existe penalización de permanencia, te queremos para siempre pero te puedes ir cuando quieras de no negocies, las solicitudes que curses con las compañías tendrán sus propias condiciones.</p>
  </details>
  <details>
  <summary>¿Cuánto pagaré?</summary>
  <p>Nada, si tal como as leido, nada<br>
  en nuestro plan gratis tienes la posibilidad de contratar los servicios que desees obteniendo una rentabilidad economica.</p>
  </details>
  <details>
  <summary>¿Puedo contratar no negocies en toda España?</summary>
  <p>Si. Aunque no todos los productos están disponibles ahora mismo, pero la gran mayoría sin problemas.</p>
  </details>
</section>

@endsection
@section('scripts')
<script src="https://js.stripe.com/v3"></script>
  <script>

  	(function() {
		  var stripe = Stripe('pk_live_L8KST6KzLxAaQetGYRuoaQKv00UGRQZ8cG');

		  var checkoutButton = document.getElementById('checkout-button-plan_FunT0R9WftTcgz');
		  checkoutButton.addEventListener('click', function () {
		    // When the customer clicks on the button, redirect
		    // them to Checkout.
        //detectar el plan a contratar
        plan = $(this).attr('data-plan');
        planId = parseInt($(this).attr('data-plan-id'));
        
		    stripe.redirectToCheckout({
		      items: [{plan: plan, quantity: 1}],

		      // Do not rely on the redirect to the successUrl for fulfilling
		      // purchases, customers may not always reach the success_url after
		      // a successful payment.
		      // Instead use one of the strategies described in
		      // https://stripe.com/docs/payments/checkout/fulfillment
		      successUrl: 'https://nonegocies.es/plan?plan='+planId,
		      cancelUrl: 'https://nonegocies.es/pago-cancelado',
		    })
		    .then(function (result) {
		      if (result.error) {
		        // If `redirectToCheckout` fails due to a browser or network
		        // error, display the localized error message to your customer.
		        var displayError = document.getElementById('error-message');
		        displayError.textContent = result.error.message;
		      }
		    });
		  });
		})();


    $(document).ready(function(){

      // Al presionar botón contratar plan
      $('.contratar').click(function(e){

        e.preventDefault();

        planNombre = $(this).parents('.card-body').find('.card-title').text();
        precio = $(this).parents('.card-body').find('.tarifa-plan').text();
        planId = $(this).data('id');

        if(planId == 2){
          $('#checkout-button-plan_FunT0R9WftTcgz').attr('data-plan' , '01');
          $('#checkout-button-plan_FunT0R9WftTcgz').attr('data-plan-id' , '2');
          $('#contratar-plan-gratis').hide();
          $('#checkout-button-plan_FunT0R9WftTcgz').show();
        }else if(planId == 3){
          $('#checkout-button-plan_FunT0R9WftTcgz').attr('data-plan' , '02');
          $('#checkout-button-plan_FunT0R9WftTcgz').attr('data-plan-id' , '3');
          $('#contratar-plan-gratis').hide();
          $('#checkout-button-plan_FunT0R9WftTcgz').show();
        }else{
          $('#checkout-button-plan_FunT0R9WftTcgz').hide();
          $('#contratar-plan-gratis').show();
        }

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
                $(".form-check-label").addClass("text-blue");
            } else {
                $(".confirmar-contrato").attr("disabled", "disabled");
                $(".form-check-label").removeClass("text-blue");
            }
        });

      });

      // Al presionar volver atrás dentro del contrato del plan
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