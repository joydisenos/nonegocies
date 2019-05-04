@component('mail::message')
# Nuevo Usuario a Contactar!

<p>El Usuario {{ title_case($contactar->nombre) }} {{ title_case($contactar->apellido) }}
<br>
Email {{ $contactar->email }}
<br>
Teléfono {{ $contactar->telefono }}
<br>
Ha solicitado el servicio de {{ $contactar->servicio }}</p>

@component('mail::button', ['url' => 'https://nonegocies.es/'])
NoNegocies
@endcomponent

<br>
Nonegocies.es
@endcomponent
