<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    protected $fillable = ['id_documento', 'comentario'];
}
