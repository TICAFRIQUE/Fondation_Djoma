<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Realisation extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'date_start',
        'date_end',
        'order'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title . '-' . time());
        });
    }
}
