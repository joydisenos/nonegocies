@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/colabora.css') }}">
@endsection
@section('content')
<header class="page">
  <div class="container">
    <h2 class="center wow blue animated fadeIn text-center">Colabora con nosotros</h2>
    <p class="center">Forma parte como empresa o colaborador promocionando tus productos o servicios a travez de nuestra plataforma</p>
  </div>
</header>

<section class="colabora">
  <div class="container">
    <div class="row">

      <div class="col-md-5 wow featured animated fadeInUp">
        <img class="featured" src="{{ asset('/img/colabora/colaborador.png') }}" alt="empresa">
      </div>
      <div class="col-md-7 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <h3 class="title-colabora">Colaborador:</h3>
            <h5>Coordinador en telecomunicaciones:</h5>
            <p class="gray big-txt">
            Se precisa coordinador en este campo para proyecto anivel nacional. experiencia minima requerida 5 años en el sector y experiencia demostrable.</p>
            <h5>Responsable ventas seguridad:</h5>
            <p class="gray big-txt">
              Buscamos responsable en este campo para proyecto anivel nacional.
              experiencia minima requerida 5 años en el sector y experiencia demostrable.
              entre sus labores se encuentra la coordinación y la gestion de las contrataciones.</p> 
          </div>
        </div>
        <a href="#contacForm" class="btn btn-primary float-right scrollDown">CONTACTAR</a>
      </div>
      <div class="space"></div>
      <div class="col-md-7 wow featured animated fadeInUp">
        <div class="card">
          <div class="card-body-featured">
            <!-- icon -->
            <h3 class="title-colabora">Empresas:</h3>
            <p class="gray big-txt">
              si tienes una empresa y quieres colaborar y promocionar tus productos o servicios a travez de nuestra plataforma, no dudes en contactar con nostros:
            </p>   
          </div>
        </div>
        <a href="#contacForm" class="btn btn-primary float-left ml-0 scrollDown">Contactar</a>
      </div>
      <div class="col-md-5 wow featured animated fadeInUp">
        <img class="featured" src="{{ asset('/img/colabora/empresa.png') }}" alt="empresa">
      </div>
    
      
    </div>
</section>

<section id="contacForm" style="background: white;">
  <div class="container">
    <div class="row">
      <div class="col-md-5"> <h2 class="wow blue fadeIn animated">CONTÁCTANOS</h2>
        <hr>
        <p>Escribenos para formar parte de nuestro equipo o para vender tus servicios/productos en No Negocies, completando el formulario o enviando un mail a <a href="mailto:info@nonegocies.es">info@nonegocies.es</a> y pronto nos pondremos en contacto.</p>
      </div>
      <div class="col-md-7">
        <form action="{{ route('mail.colabora') }}" method="post">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre:" required>
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="lastname" class="form-control" placeholder="Apellidos:" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Email:" required>
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="tel" class="form-control" placeholder="Teléfono:" required>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Mensaje"></textarea>
          </div>
          <input type="submit" value="Enviar" class="btn btn-primary float-right">
        </div>
      </form>
      <div class="space"></div>
    </div>
  </div>
</div>

</section>

<script>
  $('.scrollDown').click(function(e){
      e.preventDefault();

      target = $(this).attr('href');

      $('html, body').animate({
              scrollTop: $(target).offset().top
      }, 2000);
  });
</script>

@endsection            