@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection
@section('content')
  <header class="page">
      <div class="container">
        <h2 class="center blue fadeIn text-center animated">Mis contrataciones</h2>
        <p class="text-center">{{ title_case(Auth::user()->name) }} aqui podras ver el estado de<br />tus servicios contratados</p>
      </div>
  </header>
  <section class="contracts">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3 mb-3">
                @include('includes.nav-panel')
            </div>
            <div class="col-md-9" style="min-height: 500px">
                <div class="card panel">
                    <div class="card-body"> 
                           <div class="pestanaBanner">
                                Podrás cobrar a los {{ Auth::user()->dias_plazo }} días de contatado
                           </div>

                           <div class="pestana">
                                Por cobrar: {{ Auth::user()->porCobrar() }}€
                           </div>

                           @if(Auth::user()->plan_id < 2)
                           <div class="pestanaPremium">
                                Plan Premium: <span class="cobroPremium"></span>€
                           </div>
                           @endif
                            
                           @if(Auth::user()->plan_id < 3)
                           <div class="pestanaPlatinum">
                                Plan Platinum: <span class="cobroPlatinum"></span>€
                           </div>
                           @endif
                                             
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>Oferta</th>
                                            <th>Fecha</th>
                                            <th>Contrato</th>
                                            <th>Comision</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody>
                                            @foreach($contratos as $contrato)
                                            <tr>
                                                <td>
                                                    {{ $contrato->oferta->nombre }}
                                                </td>
                                                <td>
                                                    {{ $contrato->created_at->format('d/m/y') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('ver.contrato', [$contrato->id]) }}">Ver Contrato</a>
                                                </td>
                                                <td class="text-right">
                                                    {{$contrato->comision}}€ 
                                                    <input type="hidden" value="{{ $contrato->oferta->comision * ($contrato->oferta->plan2 / 100) }}" class="ganaPlanPremium">
                                                    <input type="hidden" value="{{ $contrato->oferta->comision * ($contrato->oferta->plan3 / 100) }}" class="ganaPlanPlatinum">
                                                </td>
                                                <td>
                                                    @if($contrato->estatus == 1)
                                                    Por procesar
                                                    @elseif($contrato->estatus == 2)
                                                        @if(Carbon\Carbon::now() >= Carbon\Carbon::parse($contrato->created_at)->addDays( Auth::user()->dias_plazo ))
                                                    <a class="btn btn-primary p-1 pr-3 pl-3" href="{{ route('cobrar.contrato' , $contrato->id) }}">Cobrar</a>
                                                        @else
                                                        Aprobado
                                                        @endif
                                                    @elseif($contrato->estatus == 0)
                                                    Negado
                                                    @elseif($contrato->estatus == 3)
                                                    <button class="btn btn-primary p-1 pr-3 pl-3" disabled>Por Cobrar</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    premium = 0;
    platinum = 0;
    
    $('.ganaPlanPremium').each(function(){
        premium += parseFloat($(this).val());
    });

    $('.ganaPlanPlatinum').each(function(){
        platinum += parseFloat($(this).val());
    });

    $('.cobroPremium').html(premium);
    $('.cobroPlatinum').html(platinum);
</script>
@endsection