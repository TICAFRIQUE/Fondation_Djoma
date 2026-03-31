<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agir extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'color',
        'type',
        'order',
        'is_active'
    ];
}
