<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;


class NewslettersController extends Controller
{
    /**
     * ===============================
     * Enregistrer un email (Frontend)
     * ===============================
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:newsletter_subscribers,email'],
        ]);

        NewsletterSubscriber::create($validated);

        return redirect()->back()->with('success', 'Merci pour votre inscription 🎉');
    }

    /**
     * ===============================
     * Liste des abonnés (Dashboard)
     * ===============================
     */
    public function index(Request $request)
    {
        $query = NewsletterSubscriber::query();

        // 🔍 Recherche par email
        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        // 📊 KPIs (pour dashboard)
        $totalSubscribers = NewsletterSubscriber::count();
        $subscribersThisMonth = NewsletterSubscriber::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $subscribers = $query
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('backend.pages.newsLetters.index', compact(
            'subscribers',
            'totalSubscribers',
            'subscribersThisMonth'
        ));
    }

    /**
     * ===============================
     * Suppression d’un abonné
     * ===============================
     */
    public function destroy($id)
    {

        $newsletterSubscriber = NewsletterSubscriber::findOrFail($id);
        $newsletterSubscriber->delete();

        return redirect()->back()->with('success', 'Abonné supprimé avec succès');
    }


  /**
     * ===============================
     * Envoyer la newsletter à tous les abonnés
     * ===============================
     */

    public function sendToAll(Request $request)
    {
        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        // ⚠️ Si aucun abonné
        if (!NewsletterSubscriber::exists()) {
            return back()->with('success', 'Aucun abonné à contacter.');
        }

        // 🔥 Envoi par chunk (performance + mémoire)
        NewsletterSubscriber::select('email')
            ->chunk(100, function ($subscribers) use ($validated) {
                foreach ($subscribers as $subscriber) {
                    Mail::to($subscriber->email)
                        ->queue(new NewsletterMail(
                            $validated['subject'],
                            $validated['content']
                        ));
                }
            });

        return back()->with('success', 'Newsletter envoyée avec succès 🎉');
    }
}
