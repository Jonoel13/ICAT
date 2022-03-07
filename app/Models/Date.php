<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';

    protected $fillable = [
        'id',
        'date_date',
        'date_hour',
        'date_place',
        'date_service',
        'date_standar',
        'date_status',
    ];
}
