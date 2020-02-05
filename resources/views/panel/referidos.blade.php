@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="/css/user.css">
@endsection
@section('content')

  <header class="page">
      <div class="container">
        <h2 class="center blue fadeIn text-center animated">Plan de Referidos</h2>
        <p class="text-center">Puedes ganar mas dinero invitando gente a No Negocies.</p>
      </div>
  </header>
  <section class="referidos">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('includes.nav-panel')
        </div>
        <div class="col-md-9">
          <div class="card panel">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  {{ title_case(Auth::user()->name) }} ahora puedes ganar dinero invitando gente a NO NEGOCIES, es facil, simplemente tienes que enviarles el siguiente codigo a tus amigos y que se registren.
                  
                  <div class="code">
                  <span href="https://nonegocies.es/register/{{ title_case(Auth::user()->id) }} ">https://nonegocies.es/register/{{ title_case(Auth::user()->id) }}</span>
                  </div>
                  
                  <div style="margin: 0 auto; text-align: center">
                  <a href="{{ route('panel.usuarios') }}" class="btn btn-outline-light btn-lg ts-scroll mr-4 slideInUp animated js-scroll-trigger blue-btn-hero">Ver mis referidos</a>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  });
</script>
@endsection
