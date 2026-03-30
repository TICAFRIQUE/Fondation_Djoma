<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjetController extends Controller
{
    //index -> page de listing des projets
    public function index()
    {
        $projets = \App\Models\Projet::orderBy('order')->get();
        return view('backend.pages.projets.index', compact('projets'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'progress' => 'nullable|integer|min:0|max:100',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
        ]);

        $path = null;

        // upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projets', 'public');
        }

        \App\Models\Projet::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'description' => $request->description,
            'image' => $path,
            'status' => $request->status,
            'progress' => $request->progress ?? 0,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'order' => 0
        ]);

        return back()->with('success', 'Projet ajouté avec succès');
    }

    public function destroy($id)
    {
        $projet = \App\Models\Projet::findOrFail($id);

        // supprimer image si existe
        if ($projet->image && Storage::disk('public')->exists($projet->image)) {
            Storage::disk('public')->delete($projet->image);
        }

        $projet->delete();

        return back()->with('success', 'Projet supprimé');
    }



    public function update(Request $request, $id)
    {
        $projet = \App\Models\Projet::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'progress' => 'nullable|integer|min:0|max:100',
            'date_start' => 'nullable|date',
            'date_end' => 'nullable|date',
        ]);

        // upload nouvelle image
        if ($request->hasFile('image')) {

            // supprimer ancienne image
            if ($projet->image && Storage::disk('public')->exists($projet->image)) {
                Storage::disk('public')->delete($projet->image);
            }

            $path = $request->file('image')->store('projets', 'public');

            $projet->image = $path;
        }

        // mise à jour des champs
        $projet->title = $request->title;
        $projet->slug = Str::slug($request->title) . '-' . $projet->id;
        $projet->description = $request->description;
        $projet->status = $request->status;
        $projet->progress = $request->progress ?? 0;
        $projet->date_start = $request->date_start;
        $projet->date_end = $request->date_end;

        $projet->save();

        return back()->with('success', 'Projet modifié avec succès');
    }
}
