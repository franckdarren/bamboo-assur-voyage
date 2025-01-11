<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Confirmation de Souscription</title>
</head>

<body style="font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0; background-color: #f7f7f7;">
    <table align="center" width="600" cellpadding="0" cellspacing="0"
        style="border: 1px solid #e0e0e0; background-color: #ffffff; padding: 20px;">
        <tr>
            <td style="text-align: center; padding: 10px 0;">
                <h1 style="color: #007bff; font-size: 24px; margin: 0;">Confirmation de votre Souscription</h1>
                <p style="font-size: 14px; color: #555;">Merci de nous avoir fait confiance !</p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px;">
                <h3 style="color: #007bff; font-size: 18px; margin-bottom: 10px;">Informations du Souscripteur</h3>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Nom et Prénom :
                    <strong>{{ $souscription->nom_prenom_souscripteur }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Adresse :
                    <strong>{{ $souscription->adresse_souscripteur }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Téléphone :
                    <strong>{{ $souscription->phone_souscripteur }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Email :
                    <strong>{{ $souscription->email_souscripteur }}</strong>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px;">
                <h3 style="color: #007bff; font-size: 18px; margin-bottom: 10px;">Informations du l'assuré</h3>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Nom et Prénom :
                    <strong>{{ $souscription->nom_prenom_assure }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Adresse :
                    <strong>{{ $souscription->adresse_assure }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Téléphone :
                    <strong>{{ $souscription->phone_assure }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Email :
                    <strong>{{ $souscription->email_assure }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Passeport :
                    <strong>{{ $souscription->passeport_assure }}</strong>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px;">
                <h3 style="color: #007bff; font-size: 18px; margin-bottom: 10px;">Informations de la Cotation</h3>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Destination :
                    <strong>{{ $cotation->destination }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Départ :
                    <strong>{{ \Carbon\Carbon::parse($cotation->depart)->format('d F Y') }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Retour :
                    <strong>{{ \Carbon\Carbon::parse($cotation->retour)->format('d F Y') }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Montant :
                    <strong>{{ number_format($montantParAssure, 0, ',', ' ') }} FCFA</strong>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px;">
                <h3 style="color: #007bff; font-size: 18px; margin-bottom: 10px;">Détails du Rendez-vous</h3>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Agence : <strong>{{ $rdv->agence }}</strong>
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Date :
                    <strong>{{ \Carbon\Carbon::parse($rdv->date_rdv)->format('d F Y') }}</strong>

                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0;">Heure : <strong>{{ $rdv->heure_rdv }}</strong>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px; text-align: center;">
                <p style="font-size: 12px; color: #777;">Pour toute question, n'hésitez pas à nous contacter.</p>
                <p style="font-size: 12px; color: #777;">&copy; {{ date('Y') }} Bamboo Assur Voyage. Tous droits
                    réservés.</p>
            </td>
        </tr>
    </table>
</body>

</html>
