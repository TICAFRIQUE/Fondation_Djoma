<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apropos extends Model
{
    use HasFactory;

    // Optionnel : Forcer le nom de la table si Laravel tente de la pluraliser bizarrement
    protected $table = 'apropos';

    // Autoriser l'assignation de masse pour ces champs
    protected $fillable = [
        'image',
        'title',
    ];
}
