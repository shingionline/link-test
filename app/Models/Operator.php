<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = [
        'name',
        'website',
        'last_status',
        'last_checked',
        'is_invalid',
    ];
}
