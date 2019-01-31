@extends('layouts.dash')

@section('content')

<div class="main-content">
        <form action="{{ route('crearusuario') }}" method="post">
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
                  Crear Oferta
                </h1>

              </div>
              <div class="col-auto">
               
                <!-- Button trigger modal -->
              
            
                    <button type="submit" class="btn btn-primary">
                            Registrar
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
                      Oferta
                    </h4>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
              </div>

              <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="form-group">
                                <label for="nombreoferta">Empresa</label>
                                <select name="empresa_id" class="form-control" required>
                                    <option value="">Seleccione una Empresa</option>
                                        
                                </select>
                        </div>



                        <div class="form-group row">
                          <div class="col">
                            <label for="nombreoferta">Categoría</label>
                                  <select name="categoria_id" class="form-control" required>
                                      <option value="">Seleccione una Categoría</option>
                                         
                                  </select>
                            </div>
                            <div class="col">
                                  <label for="nombreoferta">Tipo de Oferta</label>
                                  <select name="tipo" class="form-control" required>
                                      <option value="">Seleccione una Opción</option>
                                      <option value="1">Particular</option>
                                      <option value="2">Empresa</option>
                                  </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="nombreoferta">Nombre de la Oferta</label>
                            <input type="text" name="nombre" class="form-control" id="nombreoferta" placeholder="Nombre de la Oferta" required>
                        </div>

                        <div class="form-group">
                            <label for="preciooferta">Precio de la oferta Anual</label>
                            <input type="number" min="0" step="0.1" name="precio" class="form-control" id="preciooferta" placeholder="Precio Anual" required>
                        </div>

                        <div class="form-group">
                                <label for="detallesoferta">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="detallesoferta" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        Registrar
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