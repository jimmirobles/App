<?php

namespace CRM;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = ['folio', 'fecha', 'hInicial', 'hFinal', 'id_empresa', 'id_asesor', 'id_servicio', 'error', 'solucion', 'comentarios'];
}
