@component('mail::message')
# Mensaje de seccion Colabora de {{title_case($request->nombre)}} {{title_case($request->lastname)}}

<div>
	<p>El Usuario {{title_case($request->nombre)}} {{title_case($request->lastname)}}
		<br>
			Email {{ $request->email }}
		<br>
			Teléfono {{ $request->tel }}
		<br>
	</p>

	<p>
		{{ $request->message }}
	</p>
</div>

@component('mail::button', ['url' => 'https://nonegocies.es/'])
NoNegocies
@endcomponent

<br>
Nonegocies.es
@endcomponent
