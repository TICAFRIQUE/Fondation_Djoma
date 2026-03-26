<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Galerie;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //index -> page d'accueil
    public function index()
    {
        return view('frontend.index');
    }

    //galerie -> page de la galerie
   public function galerie()
{
    $images =Galerie::latest()->get();

    return view('frontend.galerie', compact('images'));
}
}
