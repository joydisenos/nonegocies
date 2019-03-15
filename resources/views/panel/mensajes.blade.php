@extends('layouts.master')
@section('content')
<style>
	p{
		font-size: 13px !important;
	    color: dimgray !important;
	    line-height: 1.5 !important
	}
.card-body {
    padding-top: 0;
    min-height: 350px;
}
</style>
<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Mensajes</h1>
<!--   <p class="animated fadeInDown">Bienvenido {{ title_case(Auth::user()->name) }}, Si tienes alguna duda o necesitas que te ayudemos<br>ponte en contacto con atención al cliente.</p> -->
	</div>
</header>

<div class="container">

  <div class="row mt-3">
    <div class="col-md-3">
      @include('includes.nav-panel')
    </div>
    <div class="col-md-9" style="min-height: 500px">
    <div class="card">
              <div class="card-header p-4">
                
              <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">Mensajes de {{ title_case(Auth::user()->name) }}</h4>
                  </div>
                  
                  <div class="col-auto">
                    <!-- <a href="#!" id="actualizar" class="btn btn-sm btn-block btn-primary p-2">
                      Actualizar Datos
                    </a> -->
                  </div>
                  
                </div> <!-- / .row -->

              </div>
              <div class="card-body">
                
              <div class="row align-items-center">
                  <div class="col">
                  
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <th>Asunto</th>
                          <th>Mensaje</th>
                          <th>Fecha</th>
                          <th>Leído</th>
                        </thead>
                        <tbody>
                            @foreach($mensajes as $mensaje)
                                <tr class="{{ $mensaje->leido == 0 ? 'font-weight-bold' : '' }} fila" data-asunto="{{ $mensaje->asunto }}" data-mensaje="{{ $mensaje->mensaje }}" data-fecha="{{ $mensaje->created_at->format('d/m/y') }}">
                                    <td>{{ $mensaje->asunto }}</td>
                                    <td>{!! str_limit($mensaje->mensaje , 45 , '... <a href="#" class="ver-mas" data-toggle="modal" data-target="#mensaje">ver mas</a>') !!}</td>
                                    <td>{{ $mensaje->created_at->format('d/m/y') }}</td>
                                    <td>
                                    <form class="marcar-mensaje">
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" name="leido" data-id="{{$mensaje->id}}" class="custom-control-input leido" id="leido{{$mensaje->id}}" {{ $mensaje->leido == 1 ? 'checked' : '' }}>
                                      <label class="custom-control-label" for="leido{{$mensaje->id}}"></label>
                                    </div>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- / .row -->

              </div>
            </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header pt-3 pl-4">
        <h5 class="modal-title" id="Label">Mensaje:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
        
            <div class="modal-body p-4">
                 
              <div class="row mb-4">
                <div class="col-md-4">
                  Fecha:
                </div>
                <div class="col">
                  <div class="mensaje-fecha"></div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  Mensaje:
                </div>
                <div class="col">
                <div class="mensaje-texto"></div>
                </div>
              </div>
              
                       
                      
                    
            </div>
         


    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.leido').change(function () {
		
      if( $(this).is(':checked') ) {
              opcion = 1;
            }else{
              opcion = 0;
            }
      id = $(this).attr('data-id');
      parent = $(this).parents('.fila');

	  $.ajax({
		type: 'post',
		url: '{{ route("marcar.mensajes") }}',
		data: {
      leido: opcion,
      id: parseInt(id)
    },
		
        success: function (data) {
          if( opcion == 1 ) {
              parent.removeClass("font-weight-bold");
            }else{
              parent.addClass("font-weight-bold");
            }
          
          toastr.success(data.guardado);
				}
			});
		});

    $('#mensaje').on('show.bs.modal', function (event) {
      var datos = $(event.relatedTarget).parents('tr') // Button that triggered the modal
      var asunto = datos.data('asunto') // Extract info from data-* attributes
      var mensaje = datos.data('mensaje') // Extract info from data-* attributes
      var fecha = datos.data('fecha') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
     
      var modal = $(this)
      modal.find('.modal-title').text('Mensaje: ' + asunto)
      modal.find('.modal-body .mensaje-texto').text(mensaje)
      modal.find('.modal-body .mensaje-fecha').text(fecha)
    })

  });
</script>
@endsection
