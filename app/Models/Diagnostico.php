<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';

    protected $fillable = [
        'id',
        'id_form',
        'curp',
        'estandar',
        'estatus',
        'calificacion',
        'n_intento',
        'link',
    ];
}
