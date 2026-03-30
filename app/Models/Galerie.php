<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    use HasFactory;

    // Autoriser l'insertion de ces champs
   protected $fillable = ['title', 'path', 'type'];
}
