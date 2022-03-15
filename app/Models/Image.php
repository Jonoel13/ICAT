<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'files';
    protected $fillable = ['path'];

    public function getUrlPathAttribute()
    {
        return Storage::url($this->path);
    }
}
