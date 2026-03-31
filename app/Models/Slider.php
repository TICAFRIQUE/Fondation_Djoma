<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


   class Slider extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'highlight',
        'description',
        'btn1_text',
        'btn1_link',
        'btn2_text',
        'btn2_link',
        'image',
        'stats',
        'order',
        'is_active'
    ];

    protected $casts = [
        'stats' => 'array'
    ];
}
