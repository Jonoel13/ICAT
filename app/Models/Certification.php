<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = 'certification';

    protected $fillable = [
        'id',
        'curp',
        'estandar',
        'sector',
        'estatus',
        'calificacion',
        'fecha',
        'n_intento',
        'vigencia',
        'documento',
        'constancia',
        'link_documentacion',
        'pago',
        'diagnostico',
        'diagnostico_status',
    ];
}