  	<article class="card card-oferta">
	  <div class="card__company">
	  	<img src="{{ ($oferta->empresa->logo) ? asset('storage/'. $oferta->empresa->logo) : asset('img/nonegocies.png')}}" class="img-company" alt="Logo {{$oferta->empresa->nombre}}">
	  </div>
	  <div class="card__img" style="
	  @if($oferta->imagen_oferta == null)
	  background-image: url({{ asset('img/hero.jpg') }});
	  @else
	  	@if($oferta->categoria->slug == 'gas' || $oferta->categoria->slug == 'luz')
	  	background-image: url('{{ asset('storage/ofertas/' . $oferta->ofertaid . '/' . $oferta->imagen_oferta) }}');
	  	@else
	  	background-image: url('{{ asset('storage/ofertas/' . $oferta->id . '/' . $oferta->imagen_oferta) }}');
	  	@endif
  	  @endif
	  "></div>
	  <a href="#" class="card_link">
	     
	   </a>
	  <div class="card__info">
<!-- 	    <span class="card__category"> {{$oferta->empresa->nombre}}</span> -->
	    @if($oferta->categoria->slug == 'luz' || $oferta->categoria->slug == 'gas')
	    <h3 class="card__title">{{ title_case($oferta->titulo) }}</h3>
	    @else
	    <h3 class="card__title">{{ title_case($oferta->nombre) }}</h3>
	    @endif
	    
	   <!--  <span class="desc">{{ $oferta->descripcion }}</span> -->
	    			
	    			@if($oferta->opcion != null && $oferta->opcion->precio_telefonia != null)
					<h2 class="price">{{ number_format($oferta->opcion->precio_telefonia , 2) }} €</h2>
					@endif

		<span class="card__by">{{ $contenido }}</span>
					
					

				
</article>
