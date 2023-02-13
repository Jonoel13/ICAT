<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'id',
        'user_nombre',
        'user_app',
        'user_apm',
        'user_curp',
        'user_edad',
        'user_sexo',
        'user_calle',
        'user_colonia',
        'user_alcaldia',
        'user_estado',
        'user_cp',
        'user_telefono',
        'user_email',
        'user_academico',
        'user_productivo',
        'user_indigena',
        'user_lengua',
        'user_leng_indigena',
        'user_doc_curp',
        'user_doc_id',
        'user_doc_foto',
        'user_uso_dato',
        'user_check_curp',
        'user_check_id',
        'user_check_foto',
        'user_check_ok',
    ];
}
