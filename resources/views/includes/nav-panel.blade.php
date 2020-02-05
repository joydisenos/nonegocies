<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: #FF034C !important;
        color:#fff !important;
    }
</style>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ (URL::current() == route('panel.configuracion')) ? 'active' : ''}}" href="{{ route('panel.configuracion') }}">Perfil</a>
    <a class="nav-link {{ (URL::current() == route('panel.mensajes')) ? 'active' : ''}}" href="{{ route('panel.mensajes') }}">Mensajes</a>
    <a class="nav-link {{ (URL::current() == route('panel.contratos')) ? 'active' : ''}}" href="{{ route('panel.contratos') }}">Contrataciones</a>
    @if(Auth::user()->plan_id > 1)
    <a class="nav-link {{ (URL::current() == route('panel.referidos')) ? 'active' : ''}}" href="{{ route('panel.referidos') }}">Referidos</a>
    @endif
  </div>