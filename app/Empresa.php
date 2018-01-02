<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = ['razon_social', 'rfc', 'direccion', 'correo'];
}
