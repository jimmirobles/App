<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'hosts';

    protected $fillable = [
    	'cliente_id', 
    	'cliente_nombre', 
    	'dominio', 
    	'fecha_inicial', 
    	'fecha_final'
    ];
}
