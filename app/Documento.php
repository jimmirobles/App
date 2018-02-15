<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $table = 'documentos';

    protected $fillable = [
    	'tipo', 
        'lugar',
    	'folio', 
    	'fecha', 
    	'id_cliente', 
    	'razon_social', 
    	'direccion', 
    	'contacto_nombre',
    	'contacto_email',
    	'hInicial', 
    	'hFinal', 
    	'error', 
    	'solucion', 
    	'comentarios',
    	'id_asesor',
    	'asesor_nombre', 
    	'id_servicio',
    	'servicio_nombre'
    ];

    // Establecer atributor default

    // protected $attributes = array(
    //     'direccion' => 'hola',
    //     'contacto_nombre' => 'jimmi',
    //     'contacto_email' => 'jimmi@email.com'
    // );
    protected $dates = ['deleted_at'];
}
