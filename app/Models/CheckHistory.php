<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckHistory extends Model
{
    protected $table = 'check_history';

    protected $fillable = [
        'website',
        'status',
        'redirect_url',
    ];
}
