<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status',
        'progress',
        'date_start',
        'date_end',
        'order'
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
    ];
}
