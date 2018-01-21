@component('mail::message')
# Cliente

Se ha generado un nuevo servicio de soporte con folio: {{ $folio }}. Lo puede localizar como un archivo adjunto al presente correo electrónico, de igual forma lo puede consultar vía web haciendo click en el siguiente botón: 

@component('mail::button', ['url' => url('documentos/'. $id) ])
Ver servicio
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
