@component('mail::message')
# Cliente

Se ha generado un nuevo servicio de soporte. Folio: {{ $folio }}, puede hacer click en el siguiente botón para consultarlo. 

@component('mail::button', ['url' => 'http://humanbusiness.com.mx/documentos/1'])
Ver servicio
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
