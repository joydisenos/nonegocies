<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: #FF034C !important;
        color:#fff !important;
    }
</style>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ (URL::current() == route('panel.configuracion')) ? 'active' : ''}}" href="{{ route('panel.configuracion') }}">Perfil</a>
    <a class="nav-link {{ (URL::current() == route('panel.mensajes')) ? 'active' : ''}}" href="{{ route('panel.mensajes') }}">Mensajes</a>
    <a a class="nav-link {{ (URL::current() == route('panel.contratos')) ? 'active' : ''}}" href="{{ route('panel.contratos') }}">Mis Contratos</a>
  </div>