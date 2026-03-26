<?php

namespace App\Http\Controllers;

use App\Models\Apropos;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AproposController extends Controller
{
    /**
     * Affiche la liste.
     */
    public function index(): View
    {
        $aproposList = Apropos::all();
        return view('backend.pages.apropos.index', compact('aproposList'));
    }

    /**
     * Enregistre une nouvelle image.
     */
    public function storeApropos(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('apropos', 'public');

        Apropos::create([
            'image' => $path,
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Image ajoutée avec succès.');
    }

    /**
     * Met à jour une image existante.
     */
    public function updateApropos(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $apropos = Apropos::findOrFail($id);
        
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image du storage
            if ($apropos->image) {
                Storage::disk('public')->delete($apropos->image);
            }
            // Stocker la nouvelle
            $apropos->image = $request->file('image')->store('apropos', 'public');
        }

        $apropos->title = $request->title;
        $apropos->save();

        return redirect()->back()->with('success', 'Image mise à jour avec succès.');
    }

//    public function destroy($id)
// {
//     $apropos = Apropos::findOrFail($id);
    
//     // Supprimer le fichier physique si nécessaire
//     if ($apropos->image) {
//         \Storage::disk('public')->delete($apropos->image);
//     }

//     $apropos->delete();

//     return redirect()->back()->with('success', 'Image supprimée avec succès.');
// }
}