<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capacitation extends Model
{
    protected $table = 'capacitation';

    protected $fillable = [
        'id',
        'curp',
        'estandar',
        'modalidad',
        'grupo',
        'sede',
        'estatus',
        'grupo',
        'calificacion',
        'asistencia',
        'fecha',
        'pago',
        'diagnostico',
        'diagnostico_status',
        'link_documentacion',
        'documento',
        'constancia',
    ];
}
