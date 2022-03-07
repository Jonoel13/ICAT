<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorStandard extends Model
{
    protected $table = 'instructor_standard';

    protected $fillable = [
        'id',
        'id_standard',
        'id_instructor',
    ];
}
