<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeService extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut',
        'nomprenoms',
        'fonction',
        'societe',
        'tel',
        'service',
        'domaine',
        'hebergement',
        'emailc',
        'telc',
        'complementaire',
    ];
}
