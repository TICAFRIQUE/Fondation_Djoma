<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Impact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use RealRashid\SweetAlert\Facades\Alert;

class ImpactController extends Controller
{
    public function index()
    {
        $impacts = Impact::orderBy('order')->get();
        return view('backend.pages.impact.index', compact('impacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        Impact::create([
            'value' => $request->value,
            'label' => $request->label,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? 1,
        ]);

        Alert::success('Opération réussie', 'L\'impact a été créé avec succès');
        return back();
    }

    public function update(Request $request, Impact $impact)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $impact->update([
            'value' => $request->value,
            'label' => $request->label,
            'order' => $request->order ?? 0,
            'is_active' => $request->is_active ?? 1,
        ]);

        Alert::success('Opération réussie', 'L\'impact a été modifié avec succès');
        return back();
    }

    public function destroy(Impact $impact): JsonResponse
    {
        $impact->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}