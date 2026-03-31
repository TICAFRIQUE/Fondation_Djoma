<?php

namespace App\Http\Controllers;

use App\Models\Agir;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AgirController extends Controller
{
    public function index()
    {
        $agirs = Agir::orderBy('order')->get();
        return view('backend.pages.agirs.index', compact('agirs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'type' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean'
        ]);

        Agir::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'color' => $request->color,
            'type' => $request->type,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? true
        ]);

        Alert::success('Opération réussie', 'L\'action a été créée avec succès');
        return back();
    }

    public function update(Request $request, Agir $agir)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'type' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean'
        ]);

        $agir->update($request->only([
            'title', 'description', 'icon', 'color', 'type', 'order', 'is_active'
        ]));

        Alert::success('Opération réussie', 'L\'action a été modifiée avec succès');
        return back();
    }

    public function destroy(Agir $agir): JsonResponse
    {
        $agir->delete();
        return response()->json(['status' => 200]);
    }
}
