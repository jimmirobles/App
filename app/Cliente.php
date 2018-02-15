<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['razon_social', 'rfc', 'direccion', 'email'];
}
