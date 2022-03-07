<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'id',
        'id_standar',
        'id_list',
        'name',
        'value',
    ];
}
