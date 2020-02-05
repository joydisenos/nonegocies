@component('mail::message')
# {{ title_case($user->name) }} Bienvenid@ a nuestra plataforma

<div>
	<h3>Te pagamos por ahorrar en tus facturas</h3>
	<p>Te damos la comisión de venta por cada contratación de servicio en nuestra web</p>
	<p>puedes acceder a tu cuenta desde esta enlace</p>
</div>

@component('mail::button', ['url' => 'https://nonegocies.es/'])
NoNegocies
@endcomponent

<br>
Nonegocies.es
@endcomponent
