@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('registrar.mensajes') }}" method="post">
                @csrf
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
                  Enviar Mensaje
                </h1>

              </div>
              <div class="col-auto">
               
                <!-- Button trigger modal -->
              
            
                    <button type="submit" class="btn btn-primary">
                            Enviar
                    </button>
                

              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
      
      <!-- CARDS -->
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            
            <!-- Goals -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h4 class="card-header-title">
                      Enviar Mensaje
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="form-group row">
                                <div class="col">
                                  <label for="destino">Enviar a</label>
                                  <select type="text" id="destino" name="destino" class="form-control" placeholder="destino">
                                    <option value="">Todos Los Usuarios</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->email }} - {{ title_case($usuario->name) }} {{ title_case($usuario->apellido) }}</option>
                                    @endforeach
                                  </select>
                                </div>
                        </div>

                        <div class="form-group row">
                                <div class="col">
                                  <label for="asunto">Asunto</label>
                                  <input type="text" id="asunto" name="asunto" class="form-control" placeholder="Asunto" required>
                                </div>
                        </div>

                                               
                        <div class="form-group row">
                            <div class="col">
                              <label for="mensaje">Mensaje</label>
                              <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje" required></textarea>
                            </div>
                        </div>

                       

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        Enviar
                                </button>
                        </div>
                    </div>
                </div>

                
              </div>
                
              
            </div>
          
        </div> <!-- / .row -->
      </div>
    </form>
    </div>

@endsection