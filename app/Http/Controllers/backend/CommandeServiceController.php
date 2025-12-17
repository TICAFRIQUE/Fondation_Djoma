<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\CommandeService;
use App\Mail\CommandeServiceMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CommandeServiceController extends Controller
{


    // ... ton store() existant

    public function index()
    {
        // Récupérer toutes les commandes triées par date
        $commandes = CommandeService::latest()->paginate(20);

        // Retourner la vue du dashboard avec ton layout master
        return view('backend.pages.commandes.index', compact('commandes'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // ✅ Validation propre
        $validated = $request->validate([
            // Étape 1
            'statut'        => 'required|in:particulier,entreprise',
            'nomprenoms'   => 'nullable|required_if:statut,particulier|string|max:150',
            'fonction'     => 'nullable|string|max:150',
            'societe'      => 'nullable|required_if:statut,entreprise|string|max:150',
            'tel'          => 'required|string|max:20',

            // Étape 2
            'service'      => 'required|in:domaine,hosting,ssl,autre',
            'domaine'      => 'nullable|string|max:255',
            'hebergement'  => 'nullable|string|max:100',

            // Étape 3
            'emailc'       => 'required|email|max:150',
            'telc'         => 'required|string|max:20',

            // Étape 4
            'complementaire' => 'nullable|string|max:1000',
        ]);

        // ✅ Enregistrement BDD
        $commande = CommandeService::create($validated);

        // ✅ ENVOI EMAIL COMMERCIAL
        Mail::to('commercial@ticafrique.com')
            ->send(new CommandeServiceMail($commande));

        // ✅ Redirection UX
        return redirect()
            ->back()
            ->with('success', 'Votre demande a été envoyée avec succès.');
    }
}
