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
                  Panel de Usuario
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
                      Ordenes
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
                  <div class="col-auto">
                    
                    <!-- Avatar -->
                    <a href="project-overview.html" class="avatar avatar-4by3">
                      <img src="assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                    </a>

                  </div>
                  <div class="col ml--2">

                    <!-- Title -->
                    <h4 class="card-title mb-1">
                      <a href="project-overview.html">Homepage Redesign</a>
                    </h4>

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <time datetime="2018-05-24">Updated 5hr ago</time>
                    </p>
                    
                  </div>
                  <div class="col-auto">
                    
                    <!-- Dropdown -->
                    <div class="dropdown">
                      <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#!" class="dropdown-item">
                          Action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Another action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Something else here
                        </a>
                      </div>
                    </div>
                    
                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                  <div class="col-auto">
                    
                    <!-- Avatar -->
                    <a href="project-overview.html" class="avatar avatar-4by3">
                      <img src="assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                    </a>

                  </div>
                  <div class="col ml--2">

                    <!-- Title -->
                    <h4 class="card-title mb-1">
                      <a href="project-overview.html">Travels & Time</a>
                    </h4>

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <time datetime="2018-05-24">Updated 3hr ago</time>
                    </p>
                    
                  </div>
                  <div class="col-auto">
                    
                    <!-- Dropdown -->
                    <div class="dropdown">
                      <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#!" class="dropdown-item">
                          Action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Another action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Something else here
                        </a>
                      </div>
                    </div>
                    
                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                  <div class="col-auto">
                    
                    <!-- Avatar -->
                    <a href="project-overview.html" class="avatar avatar-4by3">
                      <img src="assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                    </a>

                  </div>
                  <div class="col ml--2">

                    <!-- Title -->
                    <h4 class="card-title mb-1">
                      <a href="project-overview.html">Safari Exploration</a>
                    </h4>

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <time datetime="2018-05-24">Updated 10hr ago</time>
                    </p>
                    
                  </div>
                  <div class="col-auto">
                    
                    <!-- Dropdown -->
                    <div class="dropdown">
                      <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#!" class="dropdown-item">
                          Action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Another action
                        </a>
                        <a href="#!" class="dropdown-item">
                          Something else here
                        </a>
                      </div>
                    </div>
                    
                  </div>
                </div> <!-- / .row -->

                <!-- Divider -->
                <hr>

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
