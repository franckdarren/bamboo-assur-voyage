<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurance Voyage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .section {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Devis de Voyage</h1>
        </div>

        <div class="section">
            <h2>Détails du Voyage</h2>
            <p><strong>Destination :</strong> {{ $destination }}</p>
            <p><strong>Date de départ :</strong> {{ \Carbon\Carbon::parse($depart)->locale('fr')->format('d/m/Y') }}</p>
            <p><strong>Date de retour :</strong> {{ \Carbon\Carbon::parse($retour)->locale('fr')->format('d/m/Y') }}</p>
            <p><strong>Nombre de jours :</strong> {{ $nombre_jours }}</p>
            <p><strong>Montant :</strong> {{ number_format($montant, 0, ',', ' ') }} FCFA</p>
        </div>

        <div class="section">
            <h2>Informations du Souscripteur</h2>
            <p><strong>Nom et prénom :</strong> {{ $nom_prenom_souscripteur }}</p>
            <p><strong>Adresse :</strong> {{ $adresse_souscripteur }}</p>
            <p><strong>Téléphone :</strong> {{ $phone_souscripteur }}</p>
            <p><strong>Email :</strong> {{ $email_souscripteur }}</p>
        </div>
    </div>
</body>

</html>
