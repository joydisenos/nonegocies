@extends('layouts.dash')
@section('content')

<style>
  svg{text-align: center;display: block;margin: 0 auto;}
  @media print{
    #sidebar{display: none;}
    .main-content { margin-left: 0 !important;}
  }
</style>
<div class="main-content">
  
  <div class="header">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-end">
          <div class="col">
            <h6 class="header-pretitle">
            Bienvenido, {{ title_case(Auth::user()->name) }} {{ title_case(Auth::user()->apellido) }}
            </h6>
            <h1 class="header-title">
            Contrato #{{ $contrato->id }}
            </h1>
          </div>
          <div class="col-auto">
            <a href="#" onClick="window.print();return true;" class="btn btn-warning">Imprimir</a>
            @role('admin')
            <a href="{{ route('negar.contrato' , [$contrato->id]) }}" class="btn btn-danger">Anular</a>
            <a href="{{ route('aprobar.contrato' , [$contrato->id]) }}" class="btn btn-success">Aprobar</a>
            @endrole
          </div>
        </div>
      </div>
    </div>
  </div>
      
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-xl-8">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col">
                <h4 class="card-header-title" style="float:left">DNI </h4>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="col">
              <a target="_blank" data-fancybox="gallery" href="{{ asset('storage/' . $contrato->dni) }}"><img src="{{ asset('storage/' . $contrato->dni) }}" alt="" class="img-fluid" title="Dni"></a>
            </div>
            <hr>
            <div class="col">
              <a target="_blank" data-fancybox="gallery" href="{{ asset('storage/' . $contrato->dni_re) }}"><img src="{{ asset('storage/' . $contrato->dni_re) }}" alt="" class="img-fluid" title="Dni Reverso"></a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col">
                <h4 class="card-header-title" style="float:left">Factura </h4>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="col">
              <a target="_blank" data-fancybox="gallery" href="{{ asset('storage/' . $contrato->factura) }}"><img src="{{ asset('storage/' . $contrato->factura) }}" alt="" class="img-fluid" title="Factura"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">
            Datos Contratación
            </h4>
          </div>
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Estado</h5>
              </div>
              <div class="col-auto">{{ $contrato->estatus() }}</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Fecha de Contratación</h5>
              </div>
              <div class="col-auto">{{ $contrato->created_at->format('d-m-Y') }}</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">IP</h5>
              </div>
              <div class="col-auto">{{ $contrato->ip }}</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Titular Cuenta</h5>
              </div>
              <div class="col-auto">@if($contrato->user->cuenta != null){{ title_case($contrato->user->cuenta->nombre) }} {{ title_case($contrato->user->cuenta->apellido) }} @endif</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">IBAN</h5>
              </div>
              <div class="col-auto">@if($contrato->user->cuenta != null){{ $contrato->user->cuenta->numero }}@endif</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Oferta</h5>
              </div>
              <div class="col-auto"><a href="{{ route('editaroferta' , $contrato->oferta->id ) }}">{{ $contrato->oferta->nombre }}</a></div>
            </div>
            <hr>
            <div class="row align-items-center">
              {!! $contrato->firma !!}
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-header-title">Datos del Usuario:</h4>
          </div>
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Nombre</h5>
              </div>
              <div class="col-auto">
                <a href="{{ route('modificarusuario' , [$contrato->user->id]) }}">
                  {{ title_case($contrato->user->name) }} {{ title_case($contrato->user->apellido) }}
                </a>
              </div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Email</h5>
              </div>
              <div class="col-auto">
                <a href="mailto:{{ $contrato->user->email }}">{{ $contrato->user->email }}</a>
              </div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Teléfono</h5>
              </div>
              <div class="col-auto">{{ $contrato->user->telefono }}</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Comisión</h5>
              </div>
              <div class="col-auto">{{ $contrato->comision }} €</div>
            </div>
            <hr>
            <div class="row align-items-center">
              <div class="col">
                <h5 class="mb-0">Plan</h5>
              </div>
              <div class="col-auto">
                {{ $contrato->user != null ? title_case($contrato->user->name) : '' }} {{ $contrato->user != null ? title_case($contrato->user->apellido) : '' }}
              </div>
            </div>
        
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
