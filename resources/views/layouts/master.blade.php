<!-- remover en produccion: -->
<?php $realtime      = date('dm').''.date('His');  ?>
<!-- end remover -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="follow,index">
    <meta name="revisit-after" content="2 days">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Ahorrar y gana dinero con tu factura de gas, luz, telefono y seguros">
    <title>No Negocies</title>
    <link rel="apple-touch-icon" href="{{asset('img/nonegocies.png')}}" />
    <link rel="icon" href="{{asset('img/favicon2.png')}}" type="image/png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather/feather.min.css')}}">
    <link href="{{asset('css/styles.css?')}}<?php echo $realtime; ?>" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    @yield('header')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function(){
	    window.cookieconsent.initialise({
	      "palette": {
	        "popup": {
	          "background": "transparent",
	          "text": "#838391"
	        },
	        "button": {
	          "background": "#FF034C",
	        }
	      },
	      "position": "bottom-right",
	      "content": {
	        "message": "Utilizamos cookies propias y de terceros para mejorar la experiencia de navegación.",
	        "dismiss": "Acepto",
	        "link": "Política de cookies",
	        "href": "{{route('cookies')}}"
	      }
	    })
	});
    </script>
  </head>
  <body id="page-top">
    <div id="grve-loader-overflow" class="">
      <div class="grve-spinner"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
          <img class="logo" src="{{asset('img/logo.png')}}" alt="nonegocies">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          ☰
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/') }}">Como Funciona</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('nosotros') }}">Quienes somos</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('colabora') }}">Colabora</a>
            </li>
            @guest
            @else

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('indexofertas') }}">Ofertas</a>
            </li>
            @endguest
              <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('planes') }}">Planes</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" id="iniciar-sesion" href="{{ route('login') }}" >Ingresar</a>
            </li>
            @else

            <li class="nav-item">
                <a class="nav-link js-scroll-trigger trigger-drop" href="{{ route('panel.configuracion') }}" >{{ title_case(Auth::user()->name) }} <span class="badge">{{ (Auth::user()->noleidos() > 0) ? Auth::user()->noleidos() : '' }}</span> <i class="arrow"></i></a>
                <ul class="drop">
                  @role('admin')
                  <li><a href ="{{ route('inicio') }}">Admin</a></li>
                  @endrole

                  @role('contador')
                  <li><a href ="{{ route('ofertas') }}">Admin</a></li>
                  <li><a href ="{{ route('pagos.comision') }}">Pago a Usuarios</a></li>
                  @elserole('gerente')
                  <li><a href ="{{ route('ofertas') }}">Admin</a></li>
                  @endrole

                    @if(Auth::user()->plan_id > 1)
                    <li><a href ="{{ route('panel.usuarios') }}">Panel</a></li>
                    @endif
                  <li><a href ="{{ route('panel.configuracion') }}">Perfil</a></li>
                  <li><a href ="{{ route('panel.mensajes') }}">Mensajes <span class="badge">{{ (Auth::user()->noleidos() > 0) ? Auth::user()->noleidos() : '' }}</span></a></li>
                  <li><a href ="{{ route('panel.contratos') }}">Mis Contratos</a></li>
                  <li><a class="nav-link logout" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Salir</a></li>
                </ul>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

	@yield('content')

    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        <div class="row">
        <div class="col-md-9 copyright">
           Copyright &copy; {{ date('Y') }} No Negocies <a href="{{ route('terminos') }}"> Términos y Condiciones</a> <a href="{{ route('privacidad') }}"> Politicas de Privacidad</a>
        </div>
        <div class="col-md-3">
          <ul class="social-links">
            <li class="facebook">
              <a href="" rel="external" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook">
              <img src="{{ asset('img/fb.svg') }}" alt="">
              </a>
            </li>
            <li class="twitter">
              <a href="" rel="external" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter">
              <img src="{{ asset('img/tw.svg') }}" alt="">
              </a>
            </li>
            <li class="instagram">
              <a href="" rel="external" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram">
              <img src="{{ asset('img/ig.svg') }}" alt="">
              </a>
            </li>
          </ul>
        </div>
        </div>
      </div>
    </footer>

    @include('includes.formslogin')

    <!-- Bootstrap core JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @include('includes.errors')
    @include('includes.notificacion')
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5c2f48f782491369baa078c9/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131740290-1"></script>
    <script async>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-131740290-1');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
      new WOW().init();
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

      $('#iniciar-sesion').click(function(e){
        e.preventDefault();
        $('#login-form').modal('show');
      });

      $('.iniciar').click(function(e){
        e.preventDefault();
        $('#login-form').modal('show');
      });

      $('#registro-sesion').click(function(e){
        e.preventDefault();
        $('#register-form').modal('show');
      });

      $('.mostrar').click(function () { 
        if ($(this).parents('.form-group').find('.pass').attr('type') === 'text') {
        $(this).parents('.form-group').find('.pass').attr('type', 'password');
        } else {
        $(this).parents('.form-group').find('.pass').attr('type', 'text');
        }
      });

      $('#olvido-contrasena').click(function (e){
        e.preventDefault();
        $('#form-login').hide('slow');
        $('#form-olvido').show('slow'); 
      });
      
      $('#regresar').click(function (e){
        e.preventDefault();
        $('#form-olvido').hide('slow');
        $('#form-login').show('slow'); 
      });

    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield('scripts')
  </body>
</html>