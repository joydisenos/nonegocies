<!-- Modal -->
<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="log-in" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="log-in">Iniciar Sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="modal-body">
                <!-- Email address -->

                    <a href="{{ route('social.auth', 'facebook') }}" class="" type="submit">
                      <svg viewBox="0 0 46 34">
                        <path d="M25.6 33h-7.1V19H15v-6.2h3.5V9.1c0-5.1 2-8.1 7.7-8.1H31v6.2h-3c-2.2 0-2.4.9-2.4 2.5v3.1H31l-.6 6.2h-4.7v14z"/>
                      </svg>
                    </a>

                <div class="form-group">

                <!-- Label -->
                <label>Email</label>

                <!-- Input -->
                <input type="email" class="form-control" name="email" placeholder="nombre@address.com" value="{{ old('email') }}">

                </div>

                <!-- Password -->
                <div class="form-group">

                <div class="row">
                    <div class="col">
                        
                    <!-- Label -->
                    <label>Contraseña</label>

                    </div>
                    <div class="col-auto">
                    
                    <!-- Help text -->
                    <a href="{{ route('password.request')}}" class="form-text small text-muted">
                        Olvido su contraseña?
                    </a>

                    </div>
                </div> <!-- / .row -->

                <!-- Input group -->
                <div class="input-group input-group-merge">

                    <!-- Input -->
                    <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Indique su contraseña">

                    <!-- Icon -->
                    <div class="input-group-append">
                    <span class="input-group-text mostrar">
                        <i class="fe fe-eye"></i>
                    </span>
                    </div>

                </div>
            </div>

    </div>

    <div class="modal-footer text-center">
        <!-- Submit -->
        <button class="btn btn-sm btn-block btn-primary mb-3" type="submit">
            Iniciar Sesión
        </button>
    </div>





</form>

        
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="register-form" tabindex="-1" role="dialog" aria-labelledby="register-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="register-form">Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Form -->
        <form method="POST" action="{{ route('register') }}">
                @csrf
    <div class="modal-body">              
                <!-- Nombre -->
                
                  
                
                <div class="form-group">
    
                  <!-- Label -->
                  <label>Nombre</label>
    
                  <!-- Input -->
                  <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
    
                </div>
    
                <!-- Apellido -->
                <div class="form-group">
    
                  <!-- Label -->
                  <label>Apellido</label>
    
                  <!-- Input -->
                  <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}">
    
                </div>

                <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" class="form-control">
                          <option value="1">Particular</option>
                          <option value="2">Empresa</option>
                          <option value="3">Comunidad</option>
                          <option value="4">Administrador</option>
                        </select>
                </div>
    
    
                <!-- Email address -->
                <div class="form-group">
    
                  <!-- Label -->
                  <label>Email</label>
    
                  <!-- Input -->
                  <input type="email" class="form-control" name="email" placeholder="nombre@address.com" value="{{ old('email') }}">
    
                </div>
    
                <!-- Password -->
                <div class="form-group">
    
                  <div class="row">
                    <div class="col">
                          
                      <!-- Label -->
                      <label>Contraseña</label>
    
                    </div>
    
                  </div> <!-- / .row -->
    
                  <!-- Input group -->
                  <div class="input-group input-group-merge">
    
                    <!-- Input -->
                    <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Indique su contraseña">
    
                    <!-- Icon -->
                    <div class="input-group-append">
                      <span class="input-group-text mostrar">
                        <i class="fe fe-eye"></i>
                      </span>
                    </div>
    
                  </div>
                </div>
    
                <!-- Password Confirm 
                <div class="form-group">
    
                  <div class="row">
                    <div class="col">
                      <label>Repita su Contraseña</label>
                    </div>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control form-control-appended pass" name="password_confirmation" placeholder="Indique su contraseña">
                    <div class="input-group-append">
                      <span class="input-group-text mostrar">
                        <i class="fe fe-eye"></i>
                      </span>
                    </div>
                  </div>
                </div> -->
    
               
                
</div>
                    <div class="modal-footer">
                     <!-- Submit -->
                     <button class="btn btn-lg btn-block btn-primary mb-3">
                        Registrar
                      </button>
          
                    </div>
                
                
              </form>
        
      </div>
    </div>
  </div>