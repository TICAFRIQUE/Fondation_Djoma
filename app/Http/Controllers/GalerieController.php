<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    // CONTROLLER
    public function index()
    {
        $images = Galerie::latest()->get();
        return view('backend.pages.galerie.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20000', // 20Mo max
            'title' => 'nullable|string'
        ]);

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $type = in_array($extension, ['mp4', 'mov', 'avi']) ? 'video' : 'image';

            $path = $file->store('galerie', 'public');

            Galerie::create([
                'title' => $request->title,
                'path' => $path,
                'type' => $type
            ]);
        }

        return back()->with('success', 'Média ajouté avec succès');
    }

    public function update(Request $request, $id)
    {
        $galerie = Galerie::findOrFail($id);

        if ($request->hasFile('media')) {
            // Supprimer l'ancien fichier
            if (Storage::disk('public')->exists($galerie->path)) {
                Storage::disk('public')->delete($galerie->path);
            }

            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $galerie->type = in_array($extension, ['mp4', 'mov', 'avi']) ? 'video' : 'image';
            $galerie->path = $file->store('galerie', 'public');
        }

        $galerie->title = $request->title;
        $galerie->save();

        return back()->with('success', 'Média modifié');
    }
    public function destroy($id)
    {
        Galerie::findOrFail($id)->delete();
        return back();
    }
}
