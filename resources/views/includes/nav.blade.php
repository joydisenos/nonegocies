 <!-- NAVIGATION
    ================================================== -->
    
      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">

          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Brand -->
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.png')}}" class="navbar-brand-img 
            mx-auto" alt="...">
          </a>

          <!-- User (xs) -->
          <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">
        
              <!-- Toggle -->
              <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                  <img src="{{ asset('assets/img/logo.png')}}" class="avatar-img rounded-circle" alt="...">
                </div>
              </a>

              <!-- Menu 
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                <a href="profile-posts.html" class="dropdown-item">Profile</a>
                <a href="settings.html" class="dropdown-item">Settings</a>
                <hr class="dropdown-divider">
                <a href="sign-in.html" class="dropdown-item">Logout</a>
              </div> -->

            </div>

          </div>

          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
              <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fe fe-search"></span>
                  </div>
                </div>
              </div>
            </form>
      
            <!-- Navigation -->
            <ul class="navbar-nav">
              @role('admin')
               <li class="nav-item">
                <a class="nav-link" href="#admin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="admin">
                  <i class="fe fe-home"></i> Administración
                </a>
                <div class="collapse" id="admin">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{ route('inicio') }}" class="nav-link ">
                        inicio
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios') }}">
                  <i class="fe fe-user"></i> Usuarios
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('empresas') }}">
                  <i class="fe fe-truck"></i> Empresas
                </a>
              </li>

              <!--<li class="nav-item">
                <a class="nav-link" href="#ofertas" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="ofertas">
                  <i class="fe fe-package"></i> Ofertas
                </a>
                <div class="collapse" id="ofertas">
                  <ul class="nav nav-sm flex-column">
                    @foreach((new App\Categoria)->categorias() as $categoria)
                    <li class="nav-item">
                      <a href="{{ route('ofertascategoria' , [$categoria->slug]) }}" class="nav-link ">
                        {{ $categoria->nombre }}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </li>-->

              <li class="nav-item">
                <a class="nav-link " href="{{ route('ofertas') }}">
                  <i class="fe fe-package"></i> Ofertas
                </a>
              </li>

               <li class="nav-item">
                <a class="nav-link " href="{{ route('contactos') }}">
                  <i class="fe fe-phone-call"></i> Contactar
                </a>
              </li>

            <!--   <li class="nav-item">
                <a class="nav-link" href="{{ route('cobros') }}">
                  <i class="fe fe-user"></i> Cobro a Usuarios
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link" href="{{ route('pagos.comision') }}">
                  <i class="fe fe-user"></i> Pago a Usuarios
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('index.contratos') }}">
                  <i class="fe fe-user"></i> Contrataciones
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('categorias') }}">
                  <i class="fe fe-tag"></i> Categorías
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('enviar.mensajes') }}">
                  <i class="fe fe-mail"></i> Mensajes
                </a>
              </li>
              
              <!--<li class="nav-item">
                <a class="nav-link " href="{{ route('ofertas') }}">
                  <i class="fe fe-package"></i> Ofertas
                </a>
              </li>-->


              <li class="nav-item">
                <a class="nav-link " href="{{ route('legales') }}">
                  <i class="fe fe-clipboard"></i> Legales
                </a>
              </li>

              @else

              @role('contador')
              <li class="nav-item">
                <a class="nav-link " href="{{ route('ofertas') }}">
                  <i class="fe fe-package"></i> Ofertas
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('pagos.comision') }}">
                  <i class="fe fe-user"></i> Pago a Usuarios
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('contactos') }}">
                  <i class="fe fe-phone-call"></i> Contactar
                </a>
              </li>
              @elserole('gerente')
              <li class="nav-item">
                <!-- {{ route('usuarios') }} -->
                <a class="nav-link" href="{{ route('panel.usuarios') }}"> 
                  <i class="fe fe-user"></i> Usuarios
                </a>
              </li>
               <li class="nav-item">
                <!-- {{ route('index.contratos') }} -->
                <a class="nav-link" href="{{ route('panel.contratos.referidos') }}">
                  <i class="fe fe-user"></i> Contrataciones
                </a>
              </li>
               
			         <li class="nav-item">
                <!-- {{ route('contactos') }} -->
                <a class="nav-link " href="{{ route('contactos.panel') }}">
                  <i class="fe fe-phone-call"></i> Contactar
                </a>
              </li>
              <li class="nav-item">
                <!-- {{ route('enviar.mensajes') }} -->
                <a class="nav-link" href="{{ route('enviar.mensajes.panel') }}">
                  <i class="fe fe-mail"></i> Mensajes
                </a>
              </li>
              @else
      
              <li class="nav-item">
                <a class="nav-link " href="{{ route('panel.usuarios') }}">
                  <i class="fe fe-user"></i> Usuarios
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('panel.contratos.referidos') }}">
                  <i class="fe fe-activity"></i> Contratos
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('panel.comisiones') }}">
                  <i class="fe fe-activity"></i> Comisiones
                </a>
              </li>

              @endrole
              
              @endrole

              <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="fe fe-log-out"></i> Cerrar Sesión
                </a>
              </li>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>


            


              <li class="nav-item d-md-none">
                <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                 <span class="fe fe-bell"></span> Notifications
                </a>
              </li>
            </ul>

            <!-- Divider -->
            <hr class="navbar-divider my-3">

        
      
            <!-- Push content down -->
            <div class="mt-auto"></div>
            
      

          </div> <!-- / .navbar-collapse -->

        </div>
      </nav>