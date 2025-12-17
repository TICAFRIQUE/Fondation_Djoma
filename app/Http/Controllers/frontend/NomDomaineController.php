<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NomDomaineController extends Controller
{
    /**
     * Recherche de domaine
     */
    public function search(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|max:255'
        ]);

        $domain = $request->domain;

        // ⚡ Simulation disponibilité
        $available = rand(0, 1) === 1;

        return response()->json([
            'domain' => $domain,
            'available' => $available,
            'message' => $available
                ? "Le domaine <strong>{$domain}</strong> est disponible !"
                : "Le domaine <strong>{$domain}</strong> est déjà pris."
        ]);
    }

    /**
     * Transfert de domaine
     */
    public function transfer(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|max:255',
            'epp_code' => 'required|string|max:100',
        ]);

        $domain = $request->domain;
        $eppCode = $request->epp_code;

        // ⚡ Simulation transfert
        return response()->json([
            'domain' => $domain,
            'message' => "La demande de transfert pour <strong>{$domain}</strong> a été envoyée avec succès !",
        ]);
    }

    /**
     * Renouvellement de domaine
     */
    public function renew(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|max:255',
            'years' => 'required|integer|min:1|max:10'
        ]);

        $domain = $request->domain;
        $years = $request->years;

        // ⚡ Simulation renouvellement
        return response()->json([
            'domain' => $domain,
            'years' => $years,
            'message' => "Le domaine <strong>{$domain}</strong> a été renouvelé pour <strong>{$years} an(s)</strong> avec succès !"
        ]);
    }
}
