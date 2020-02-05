@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection
@section('content')
  <header class="page">
      <div class="container">
        <h2 class="center blue fadeIn text-center animated">Mis contrataciones</h2>
        <p class="text-center">{{ title_case(Auth::user()->name) }} aqui podras ver las comisiones generadas por<br />tus usuarios referidos</p>
      </div>
  </header>
  <section class="contracts">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">
                @include('includes.nav-panel')
            </div>
            <div class="col-md-9" style="min-height: 500px">
                <div class="card panel">
                    <div class="card-body">                       
                        <div class="row align-items-center">
                            <div class="col">

                                @if($comisiones->count() == 0)
                                <h3>Aún no tienes comisiones, comparte tu link para que comiences a generar ingresos!</h3>
                                @else
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Número</th>
                                            <th>Fecha</th>
                                            <th>Concepto</th>
                                            <th>Importe</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody>
                                            @foreach($comisiones as $comision)
                                            <tr>
                                                <td>
                                                    {{ $comision->id }}
                                                </td>
                                                <td>
                                                    {{ $comision->created_at->format('d/m/y') }}
                                                </td>
                                                <td>
                                                    {{ $comision->concepto }}
                                                </td>
                                                <td>
                                                   {{ $comision->monto }}€
                                                </td>
                                                <td>
                                                    @if(Carbon\Carbon::now() >= Carbon\Carbon::parse($comision->created_at)->addDays( Auth::user()->dias_plazo ) && $comision->estatus == 0)
                                                   
                                                     <a class="btn btn-primary p-1 pr-3 pl-3" href="{{ route('cobrar.comision' , $comision->id) }}">Cobrar</a>
                                                    @else
                                                     {{ $comision->verEstatus() }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
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