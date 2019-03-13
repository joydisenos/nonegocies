<style>
.modal-sm {max-width: 350px !important;}
.modal-header {padding: 0;}
.card.mt-3.tab-card {border: 0;}
.modal-body .form-group {margin-bottom: 15px;}
.modal-header .close {font-size: 15px;font-weight: initial;padding: 10px 15px;opacity: 1;float: right;text-align: right;right: 0;position: fixed;background: #133273 !important;color: white;}
.modal-header .close:hover{background: #e8cb4a!important;color:black;}
.modal-header .close:focus{outline: 0;}
.modal-header ul {border: none;}
.modal-header ul li {margin: 0;}
.modal-header ul li a {border: none;border-radius: 0;}
.modal-header ul li.active a {color: #e12f27;}
.modal-header ul li a:hover {border: none;}
.modal-header ul li a span {margin-left: 10px;}
.tab-pane {padding: 10px !important;}
.nav-link.active {color: #FF034C !important;}
.nav-link{color: #133273 !important;}
.mt-3, .my-3 {margin-top: 8px!important;}
button.close {background: white;border-radius: 100%;color: black;opacity:1;}
.modal-header {height: 50px;}
.modal-footer{border:0 !important;padding-bottom: 0;}
.card-header-tabs{margin-left: unset !important;}
button.btn.btn-sm.btn-block.btn-primary.mb-3 {padding: 10px;display: block;margin: 0 auto;margin-bottom: 0 !important;}
.card-header {padding: 0;margin-bottom: 0;background-color: unset;border-bottom: 0;}
.nav-tabs .nav-link{border: 0 !important;font-weight: bold;}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{border: 0 !important;background: transparent !important;}
button.btn.btn-sm.btn-block.btn-primary.mb-3:hover{background: #133273 !important;}
.nav-tabs .nav-link.active:after {content: '';height: 3px;background: red;width: 100%;position: relative;display: block;margin-top: 10px;}
form.login{margin-top:-24px;}
</style>

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
              <a href="{{ route('social.auth', 'facebook') }}" class="" type="submit">
                <svg viewBox="0 0 46 34">
                  <path d="M25.6 33h-7.1V19H15v-6.2h3.5V9.1c0-5.1 2-8.1 7.7-8.1H31v6.2h-3c-2.2 0-2.4.9-2.4 2.5v3.1H31l-.6 6.2h-4.7v14z"/>
                </svg>
              </a>
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
              <br>
              <a id="olvido-contrasena" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false" class="form-text small text-muted text-center">
                Olvido su contraseña?
              </a>
              <div class="modal-footer text-center">
                <button class="btn btn-sm btn-block btn-primary mb-3" type="submit">
                Iniciar Sesión
                </button>
              </div>
            </form>

            <form method="POST" style="display:none" id="form-olvido" action="{{ route('password.email') }}">
              @csrf

              <a id="regresar" href="#" class="form-text small text-muted text-left">
                &larr; Regresar a Iniciar Sesión
              </a>

              <div class="form-group">
                  <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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