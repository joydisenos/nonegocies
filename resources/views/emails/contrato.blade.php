@component('mail::message')
# Nuevo contrato solicitado del usuario {{title_case($orden->user->name)}} {{title_case($orden->user->apellido)}}

<p>El Usuario {{ title_case($orden->user->nombre) }} {{ title_case($orden->user->apellido) }}
<br>
Email {{ $orden->user->email }}
<br>
Teléfono {{ $orden->user->telefono }}
<br>
</p>

@component('mail::button', ['url' => 'https://nonegocies.es/'])
NoNegocies
@endcomponent

<br>
Nonegocies.es
@endcomponent
