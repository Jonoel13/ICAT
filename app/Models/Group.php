<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'id',
        'id_standard',
        'id_allience',
        'id_place',
        'id_list_activities',
        'id_instructor',
        'group_service_type',
        'group_name',
        'group_shortname',
        'group_mode',
        'group_level',
        'group_hours',
        'group_date_init',
        'group_date_end',
        'group_min_grade',
        'group_min_asistencia',
        'group_capacity',
        'group_documentation',
        'group_link',
        'group_private',
        'group_status',
    ];
}
