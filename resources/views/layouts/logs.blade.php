<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

     <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather/feather.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/highlight.js/styles/vs2015.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/quill/dist/quill.core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.css')}}">

    <!-- Theme CSS -->
      
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css')}}" id="stylesheetLight">

    <!--<link rel="stylesheet" href="{{ asset('assets/css/theme-dark.min.css')}}" id="stylesheetDark">-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <style>body { display: none; }</style>
    

    <title>@yield('titulo')</title>
  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->

    
    @yield('content')

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/libs/chart.js/Chart.extension.min.js')}}"></script>
    <script src="{{ asset('assets/libs/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('assets/libs/list.js/dist/list.min.js')}}"></script>
    <script src="{{ asset('assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js')}}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield('scripts')
    @include('includes.errors')
    @include('includes.notificacion')
  </body>
</html>