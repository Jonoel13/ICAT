<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'standard';

    protected $fillable = [
        'id',
        'name',
        'shortname',
        'description',
        'type',
        'image',
        'sector',
        'diagnostico',
        'cert_place',
        'cert_material',
        'cert_grade',
        'documentation',
        'p_evaluation',
        'deliverables',
        'link',
    ];
}
