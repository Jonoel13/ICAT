<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enroll';

    protected $fillable = [
        'id',
        'enrol_course_id',
        'enrol_course_type',
        'enrol_user_curp',
        'enrol_user_diagnostico',
        'enrol_user_certificado',
    ];
}
