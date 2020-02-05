@extends('layouts.master')

@section('content')
<script>
    window.location.replace("https://nonegocies.es");
</script>
<header class="page">
	<div class="container">
	<h1 class="animated fadeInLeft">Esta página no se encuentra registrada</h1>
	<a href="{{ url('/') }}" class="btn btn-primary">Inicio</a>
	</div>
</header>
@endsection
