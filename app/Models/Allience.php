<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allience extends Model
{
	protected $table = 'alianzas';

    protected $fillable = [
        'id',
        'alianza_proyecto',
        'alianza_dependencia',
        'alianza_nom_convenio',
        'alianza_tipo',
        'alianza_fecha_inicio',
        'alianza_fecha_termino',
        'alianza_urlpdf',
    ];

}
