@extends('layouts.master')
@section('content')
<style>

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
    font-size: 90px;
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

details{background: #f1f1f1}

.faq{background: #393975 url({{ asset('/img/bg-hero-page.svg') }}) repeat;}

.faq h2{color: white !important;padding-bottom: 60px}

</style>

<header class="page">
  <div class="container">
    <h1 class="animated fadeInLeft">Planes</h1>
    <p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
  </div>
</header>

<section class="pricing py-5">
  <div class="container">
    <div style="height: 40px"></div>
    <h2 class="text-center">Nuestros Planes</h2>
    <p class="text-center">Puedes ganar mas dinero por el plan que elijas, ademas de tener mas ventajas</p>
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <img src="https://nonegocies.es/svg/free.svg" alt="free" class="plan-img">
            <h5 class="card-title text-muted text-uppercase text-center">Gratis</h5>
            <ul class="fa-ul gray">
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
            </ul>
            <h6 class="card-price text-center">0<span class="currency">€</span><span class="period"></span></h6>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Contratar</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <img src="https://nonegocies.es/svg/premium.svg" alt="free" class="plan-img">
            <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
            <ul class="fa-ul gray">
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
            </ul>
            <h6 class="card-price text-center">29<span class="currency">€</span><span class="period"> x mes</span></h6>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Contratar</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <img src="https://nonegocies.es/svg/platinum.svg" alt="free" class="plan-img">
            <h5 class="card-title text-muted text-uppercase text-center">Platinum</h5>
            <ul class="fa-ul gray">
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
              <li>incluye ..</li>
            </ul>
            <h6 class="card-price text-center">49<span class="currency">€</span><span class="period"> x mes</span></h6>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Contratar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
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