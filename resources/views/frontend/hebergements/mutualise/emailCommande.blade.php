<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Nouvelle commande</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f4f6f8; padding:20px">

    <div style="max-width:600px; margin:auto; background:#fff; padding:25px; border-radius:6px">
        <h2 style="color:#355d93;">Nouvelle commande de service</h2>

        <p><strong>Statut :</strong> {{ ucfirst($commande->statut) }}</p>

        @if ($commande->statut === 'particulier')
            <p><strong>Nom :</strong> {{ $commande->nomprenoms }}</p>
            <p><strong>Fonction :</strong> {{ $commande->fonction }}</p>
        @else
            <p><strong>Entreprise :</strong> {{ $commande->societe }}</p>
        @endif

        <hr>

        <p><strong>Service :</strong> {{ ucfirst($commande->service) }}</p>

        @if ($commande->domaine)
            <p><strong>Domaine :</strong> {{ $commande->domaine }}</p>
        @endif

        @if ($commande->hebergement)
            <p><strong>Hébergement :</strong> {{ $commande->hebergement }}</p>
        @endif

        <hr>

        <p><strong>Email contact :</strong> {{ $commande->emailc }}</p>
        <p><strong>Téléphone :</strong> {{ $commande->telc }}</p>

        @if ($commande->complementaire)
            <hr>
            <p><strong>Message :</strong><br>{{ $commande->complementaire }}</p>
        @endif

        <p style="margin-top:30px; font-size:12px; color:#999">
            Message automatique – TicAfrique
        </p>
    </div>

</body>

</html>
