<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalerieController extends Controller
{
    public function index()
    {
        $images = Galerie::latest()->get();
        return view('backend.pages.galerie.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:2048',
            'title' => 'nullable|string|max:255'
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

    public function update(Request $request, Galerie $galerie)
    {

        $request->validate([
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:2048',
            'title' => 'nullable|string|max:255'
        ]);

        if ($request->hasFile('media')) {

            // supprimer ancien fichier
            if ($galerie->path && Storage::disk('public')->exists($galerie->path)) {
                Storage::disk('public')->delete($galerie->path);
            }

            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();

            $galerie->type = in_array($extension, ['mp4', 'mov', 'avi']) ? 'video' : 'image';
            $galerie->path = $file->store('galerie', 'public');
        }

        $galerie->title = $request->title;
        $galerie->save();

        Alert::success('Opération réussie', 'Le média a été modifié avec succès');
        return back();
    }

    public function destroy(Galerie $galerie): JsonResponse
    {
        // supprimer fichier
        if ($galerie->path && Storage::disk('public')->exists($galerie->path)) {
            Storage::disk('public')->delete($galerie->path);
        }

        $galerie->delete();

        return response()->json([
            'status' => 200,
        ]);
    }
}
