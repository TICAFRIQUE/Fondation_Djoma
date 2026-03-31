<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Galerie;
use App\Models\Agir;
use App\Models\Impact;
use App\Models\News;
use App\Models\Programme;
use App\Models\Projet;
use App\Models\Realisation;
use App\Models\Slider;
use Illuminate\Http\Request;

class indexController extends Controller
{
    // INDEX - Page d'accueil
    public function index()
    {
        $realisations = Realisation::orderBy('order')->get();
        $projets = Projet::orderBy('order')->get();
        $news = News::latest()->take(6)->get();
        $programmes = Programme::where('is_active', true)
            ->orderBy('order')
            ->get();
        $apropos = \App\Models\Apropos::with('items')->first();
        $impacts = Impact::where('is_active', 1)
            ->orderBy('order')
            ->get();
        $sliders = Slider::where('is_active', 1)
            ->orderBy('order')
            ->get();
        $agirs = Agir::where('is_active', 1)
            ->orderBy('order')
            ->get();
        return view('frontend.index', compact('realisations', 'projets', 'news', 'programmes', 'apropos', 'impacts', 'sliders', 'agirs'));
    }

    // GALERIE - Page galerie
    public function galerie()
    {
        $images = Galerie::latest()->get();
        return view('frontend.galerie', compact('images'));
    }

    // ─── AFFICHAGES DES DÉTAILS (COMMON-SHOW) ───

    public function showRealisation($slug)
    {
        $data = Realisation::where('slug', $slug)->firstOrFail();
        return view('frontend.common-show', ['data' => $data, 'type' => 'realisation']);
    }

    public function showNews($slug)
    {
        $data = News::where('slug', $slug)->firstOrFail();
        return view('frontend.common-show', ['data' => $data, 'type' => 'news']);
    }

    public function showProjet($slug)
    {
        $data = Projet::where('slug', $slug)->firstOrFail();
        return view('frontend.common-show', ['data' => $data, 'type' => 'projet']);
    }

    // ─── AFFICHAGES DES LISTES (LIST-ALL) ───

    public function allNews()
    {
        $items = News::orderBy('published_at', 'desc')->paginate(12);
        return view('frontend.list-all', ['items' => $items, 'type' => 'news', 'title' => 'Toutes nos actualités']);
    }

    public function allProjets()
    {
        $items = Projet::orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.list-all', ['items' => $items, 'type' => 'projet', 'title' => 'Tous nos projets']);
    }

    public function allRealisations()
    {
        $items = Realisation::orderBy('order')->paginate(12);
        return view('frontend.list-all', ['items' => $items, 'type' => 'realisation', 'title' => 'Toutes nos réalisations']);
    }
}
