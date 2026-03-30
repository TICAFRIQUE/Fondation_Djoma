<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::orderBy('order')->get();
        return view('backend.pages.programmes.index', compact('programmes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'color_bg' => 'nullable',
            'color_text' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programmes', 'public');
        }

        $data['slug'] = Str::slug($request->title);

        Programme::create($data);

        return back()->with('success', 'Programme ajouté');
    }

    public function update(Request $request, Programme $programme)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'color_bg' => 'nullable',
            'color_text' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programmes', 'public');
        }

        $data['slug'] = Str::slug($request->title);

        $programme->update($data);

        return back()->with('success', 'Programme modifié');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();
        return back()->with('success', 'Programme supprimé');
    }
}
