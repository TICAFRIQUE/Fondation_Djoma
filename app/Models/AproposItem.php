<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AproposItem extends Model
{
    use HasFactory;

    protected $table = 'apropos_items';

    protected $fillable = [
        'apropos_id',
        'title',
        'description',
        'icon',
        'color',
        'order',
    ];

    public function apropos()
    {
        return $this->belongsTo(Apropos::class);
    }
}
