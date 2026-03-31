<?php

namespace App\Http\Controllers;

use App\Models\Engagement;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use RealRashid\SweetAlert\Facades\Alert;

class EngagementController extends Controller
{
    public function index()
    {
        $engagements = Engagement::latest()->get();

        return view('backend.pages.engagements.index', compact('engagements'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'amount' => 'nullable|numeric|min:0',
            'message' => 'nullable|string'
        ]);

        Engagement::create($request->only([
            'type',
            'name',
            'email',
            'phone',
            'amount',
            'message'
        ]));

        // Si c'est une requête AJAX, retourner JSON
        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Merci pour votre engagement !'
            ]);
        }

        Alert::success('Merci pour votre engagement !', 'Nous vous contacterons bientôt.');
        return back();
    }

    public function destroy(Engagement $engagement)
    {
        $engagement->delete();
        return back();
    }
}
