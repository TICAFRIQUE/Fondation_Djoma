<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Galerie;
use App\Models\Realisation;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //index -> page d'accueil
    public function index()
    {
        $realisations = \App\Models\Realisation::orderBy('order')->get();
          $projets = \App\Models\Projet::orderBy('order')->get();
        return view('frontend.index', compact('realisations', 'projets'));
    }

    //galerie -> page de la galerie
    public function galerie()
    {
        $images = Galerie::latest()->get();

        return view('frontend.galerie', compact('images'));
    }

    public function showRealisation($slug)
    {
        $realisation = Realisation::where('slug', $slug)->firstOrFail();

    return view('frontend.realisation.show', compact('realisation'));
}

    public function showProjet($slug)
    {
        $projet = \App\Models\Projet::where('slug', $slug)->firstOrFail();

    return view('frontend.projet.show', compact('projet')); 
}
}