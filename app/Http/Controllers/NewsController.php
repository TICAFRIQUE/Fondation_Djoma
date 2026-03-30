<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    // FRONT + BACK LIST
    public function index()
    {
        $news = News::latest()->get();

        return view('backend.pages.news.index', compact('news'));
    }
    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image',
            'category' => 'required|string',
            'published_at' => 'nullable|date',
            'reading_time' => 'nullable|integer',
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'image' => $path,
            'category' => $request->category,
            'published_at' => $request->published_at,
            'reading_time' => $request->reading_time ?? 3,
        ]);

        return back()->with('success', 'Article ajouté');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image',
            'category' => 'required|string',
            'published_at' => 'nullable|date',
            'reading_time' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {

            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $news->image = $request->file('image')->store('news', 'public');
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . $news->id,
            'content' => $request->content,
            'category' => $request->category,
            'published_at' => $request->published_at,
            'reading_time' => $request->reading_time ?? 3,
        ]);

        return back()->with('success', 'Article modifié');
    }

    // DELETE
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return back()->with('success', 'Article supprimé');
    }
}
