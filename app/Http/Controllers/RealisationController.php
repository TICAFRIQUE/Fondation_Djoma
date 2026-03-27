<?php

namespace App\Http\Controllers;


use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RealisationController extends Controller
{
    public function index()
    {
        $realisations = Realisation::orderBy('order')->get();
        return view('backend.pages.realisations.index', compact('realisations'));
    }

   public function store(Request $request)
{
    // 1. Validation (avec vérification du poids et de l'extension)
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // 2Mo max
        'date_start' => 'required|date',
        'date_end' => 'required|date|after_or_equal:date_start',
    ]);

    // 2. Upload de l'image de manière sécurisée
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('realisations', 'public');
    }

    // 3. Création dans la base de données
    Realisation::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
        'date_start' => $request->date_start,
        'date_end' => $request->date_end,
        'order' => (Realisation::max('order') ?? 0) + 1
       
    ]);

    return back()->with('success', 'Réalisation ajoutée avec succès !');
}
    public function update(Request $request, Realisation $realisation)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($realisation->image);
            $realisation->image = $request->file('image')->store('realisations', 'public');
        }

        $realisation->update([
            'title' => $request->title,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);

        return back()->with('success', 'Modification réussie');
    }

    public function destroy(Realisation $realisation)
    {
        Storage::disk('public')->delete($realisation->image);
        $realisation->delete();

        return back()->with('success', 'Supprimé');
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            Realisation::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }

    public function show($slug)
    {
        $realisation = Realisation::where('slug', $slug)->firstOrFail();
        return view('frontend.realisations.show', compact('realisation'));
    }
}
