<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    protected $table = 'asesores';

    protected $fillable = ['nombre', 'email'];
}
