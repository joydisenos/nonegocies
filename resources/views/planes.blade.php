@extends('layouts.master')
@section('content')
<style>
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

.pricing .container {
    padding-top: 120px;
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

</style>
<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Planes</h1>
	<p class="animated fadeInDown">Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p>
	</div>
</header>
<section class="gray">
	<div class="container">
		<section class="pricing py-5">
  <div class="container">
  	<div style="height: 40px"></div>
  	<h2 class="center text-center">Titulo para los targets</h2>
		<p class="center text-center">Lorem ipsum dolor sit amet nsdou tinasdfm tritani omittam qui mei oblique taimates.</p>
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
	</div>
</section>
@endsection