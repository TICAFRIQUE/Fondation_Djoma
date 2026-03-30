<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\News;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
  
    // STORE MESSAGE (formulaire site)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Message envoyé avec succès');
    }

    // BACKOFFICE LISTE
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('backend.pages.messages.index', compact('messages'));
    }

    // DELETE
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Message supprimé');
    }
}
