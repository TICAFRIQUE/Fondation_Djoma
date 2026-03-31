<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'amount',
        'message'
    ];
}
