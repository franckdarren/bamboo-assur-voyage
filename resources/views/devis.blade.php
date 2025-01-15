<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis Voyage</title>
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
            <p><strong>Date de départ :</strong> {{ $depart }}</p>
            <p><strong>Date de retour :</strong> {{ $retour }}</p>
            <p><strong>Nombre de jours :</strong> {{ $nombre_jours }}</p>
            <p><strong>Montant :</strong> {{ $montant }} FCFA</p>
        </div>

        <div class="section">
            <h2>Informations du Souscripteur</h2>
            <p><strong>Nom et prénom :</strong> {{ $nom_prenom_souscripteur }}</p>
            <p><strong>Adresse :</strong> {{ $adresse_souscripteur }}</p>
            <p><strong>Téléphone :</strong> {{ $phone_souscripteur }}</p>
            <p><strong>Email :</strong> {{ $email_souscripteur }}</p>
        </div>

        <div class="section">
            <h2>Liste des Voyageurs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom et Prénom</th>
                        <th>Date de Naissance</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Passeport</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($liste_voyageurs as $voyageur)
                        <tr>
                            <td>{{ $voyageur['nom_prenom_assure'] }}</td>
                            <td>{{ $voyageur['date_naissance_assure'] }}</td>
                            <td>{{ $voyageur['adresse_assure'] }}</td>
                            <td>{{ $voyageur['phone_assure'] }}</td>
                            <td>{{ $voyageur['email_assure'] }}</td>
                            <td>{{ $voyageur['passeport_assure'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
