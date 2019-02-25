@extends('layouts.dash')

@section('content')
<div class="main-content">
     <!-- HEADER -->
      <div class="header">
        <div class="container-fluid">

          <!-- Body -->
          <div class="header-body">
            <div class="row align-items-end">
              <div class="col">
                
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                 Bienvenido, {{ title_case(Auth::user()->name) }} {{ title_case(Auth::user()->apellido) }}
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Planes
                </h1>

              </div>
              <div class="col-auto">
                
                <!-- Button 
                <a href="#!" class="btn btn-primary">
                  Create Report
                </a>
                 -->
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
      
      <!-- CARDS -->
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12 col-xl-8">
            
            <!-- Orders -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Contratar
                    </h4>

                  </div>

                  <!--
                  <div class="col-auto mr--3">
                    <span class="text-muted">
                      Show affiliate:
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="custom-control custom-checkbox-toggle">
                      <input type="checkbox" class="custom-control-input" id="cardToggle">
                      <label class="custom-control-label" for="cardToggle"></label>
                    </div>
                  </div>
                  -->
                </div> <!-- / .row -->

              </div>
              <div class="card-body">
                
              <div class="row align-items-center">
                  <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('svg/free.svg') }}" alt="free" class="plan-img" />
                        <h5 class="card-title text-muted text-uppercase text-center">Gratis</h5>
                        <ul class="fa-ul gray">
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        </ul>
                        <h6 class="card-price text-center">0<span class="currency">€</span><span class="period"> x mes</span></h6>
                        <a href="{{ route('panel.plan' , [0]) }}" class="btn btn-block btn-primary text-uppercase">Contratar</a>
                    </div>
                   </div>
                  </div>

                  <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('svg/premium.svg') }}" alt="free" class="plan-img" />
                        <h5 class="card-title text-muted text-uppercase text-center">Premium</h5>
                        <ul class="fa-ul gray">
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        </ul>
                        <h6 class="card-price text-center">29<span class="currency">€</span><span class="period"> x mes</span></h6>
                        <a href="{{ route('panel.plan' , [2]) }}" class="btn btn-block btn-primary text-uppercase">Contratar</a>
                    </div>
                   </div>
                  </div>

                  <div class="col">
                  <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('svg/platinum.svg') }}" alt="free" class="plan-img" />
                        <h5 class="card-title text-muted text-uppercase text-center">Platinum</h5>
                        <ul class="fa-ul gray">
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        <li>incluye ..</li>
                        </ul>
                        <h6 class="card-price text-center">49<span class="currency">€</span><span class="period"> x mes</span></h6>
                        <a href="{{ route('panel.plan' , [3]) }}" class="btn btn-block btn-primary text-uppercase">Contratar</a>
                    </div>
                   </div>
                  </div>
                </div> <!-- / .row -->

              </div>
            </div>

          </div>
          <div class="col-12 col-xl-4">

            <!-- Devices -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                
                    <!-- Title -->
                    <h4 class="card-header-title">
                      Plan Activo
                    </h4>

                  </div>
                  <div class="col-auto">
                   
                  @if (Auth::user()->plan_id == null)
                    Gratis
                    @elseif (Auth::user()->plan_id == 2)
                    Premium
                    @elseif (Auth::user()->plan_id == 3)
                    Platinum
                    @endif
                    

                  </div>
                </div> <!-- / .row -->

              </div>
              <div class="card-body">
                
                @if (Auth::user()->plan_id == null)
                    <img src="{{ asset('svg/free.svg') }}" alt="free" class="plan-img" />
                    @elseif (Auth::user()->plan_id == 2)
                    <img src="{{ asset('svg/premium.svg') }}" alt="free" class="plan-img" />
                    @elseif (Auth::user()->plan_id == 3)
                    <img src="{{ asset('svg/platinum.svg') }}" alt="free" class="plan-img" />
                    @endif

              </div>
            </div>
            
          </div>
        </div> <!-- / .row -->
        
      </div>
</div>
@endsection
