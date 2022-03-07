<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'id',
        'id_service',
        'pay_type_service',
        'pay_curp',
        'pay_standar',
        'pay_status',
        'pay_monto',
        'pay_documento',
        'pay_link',
    ];
}
