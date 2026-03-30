<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'published_at',
        'reading_time'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
