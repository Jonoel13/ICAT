<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';

    protected $fillable = [
        'id',
        'quote_date_id',
        'quote_qr_id',
        'quote_access',
        'quote_user_name',
        'quote_user_ap_p',
        'quote_user_ap_m',
        'quote_user_curp',
        'quote_user_email',
        'quote_user_pago',
        'quote_date',
        'quote_hour',
        'quote_status',
    ];
}
