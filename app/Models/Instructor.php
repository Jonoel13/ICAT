<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructors';

    protected $fillable = [
        'id',
        'instructor_name',
        'instructor_app',
        'instructor_apm',
        'instructor_age',
        'instructor_phone',
        'instructor_email',
        'instructor_curp',
        'instructor_rfc',
        'instructor_direc_factura',
        'instructor_cv',
        'instructor_consultoria',
        'instructor_estudios',
        'instructor_estudios_doc',
        'instructor_sector',
        'instructor_courses',
        'instructor_certifications',
        'instructor_summary',
        'instructor_operation_year',
    ];

}
