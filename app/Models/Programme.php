<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
        'color_bg',
        'color_text',
        'order',
        'is_active'
    ];
}
