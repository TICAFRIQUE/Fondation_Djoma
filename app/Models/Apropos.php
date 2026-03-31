<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apropos extends Model
{
    use HasFactory;

    protected $table = 'apropos';

    protected $fillable = [
        'title',
        'description',
        'image',
        'stat_1_value',
        'stat_1_label',
        'stat_2_value',
        'stat_2_label',
    ];

    public function items()
    {
        return $this->hasMany(AproposItem::class)->orderBy('order');
    }
}
