<div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="log-in" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        X
        </button>
        <div class="card mt-3 tab-card">
          <div class="card-header tab-card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">INICIAR SESION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">REGISTRO</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
            <form method="POST" id="form-login" action="{{ route('login') }}" class="login">
              @csrf
              <br>
               <a class="loginBtn loginBtn--facebook" href="{{ route('social.auth', 'facebook') }}">
                  Ingresar con Facebook
              </a>
              <hr>
              <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
              </div>
              <div class="input-group input-group-merge form-group">
                <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Contraseña">
                <div class="input-group-append">
                  <span class="input-group-text mostrar">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>
              </div>
              <div class="modal-footer text-center">
                <button class="btn btn-sm btn-block btn-primary mb-3" type="submit">
                Iniciar Sesión
                </button>
              </div>
              <a id="olvido-contrasena" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false" class="form-text small text-muted text-center">
                Olvido su contraseña?
              </a>
            </form>

            <form method="POST" style="display:none" id="form-olvido" action="{{ route('password.email') }}">
              @csrf

              <a id="regresar" href="#" class="form-text small text-muted text-left">
                &larr; Regresar a Iniciar Sesión
              </a>

              <div class="form-group">
                  <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                      <input id="email2" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                 
              </div>

              <div class="form-group text-center mb-2">
                  
                      <button type="submit" class="btn btn-sm btn-block btn-primary mb-3">
                          Enviar Solicitud
                      </button>
                  
              </div>
          </form>

          </div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <form method="POST" action="{{ route('register') }}" autocomplete="off">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="apellido" placeholder="Apellidos" value="{{ old('apellido') }}">
              </div>
               <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
              </div>
              <div class="form-group input-group input-group-merge">
                <input type="password" class="form-control form-control-appended pass" name="password" placeholder="Contraseña" autocomplete="off">
                <div class="input-group-append">
                  <span class="input-group-text mostrar">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <select name="tipo" class="form-control">
                  <option value="1">Soy:</option>
                  <option value="1">Particular</option>
                  <option value="2">Empresa</option>
                  <option value="3">Comunidad</option>
                  <option value="4">Administrador</option>
                </select>
              </div>

              <div class="g-recaptcha" data-sitekey="{{ env('RE_CLAVE_SITIO' , '') }}"></div>

              <br>
              <button type="submit" class="btn btn-sm btn-block btn-primary mb-3">Registrarme</button>
            </form>
          </div>
          <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
            LOST PASSWORD
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reset-contrasena" tabindex="-1" role="dialog" aria-labelledby="reset-contrasena" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        X
        </button>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
          <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>