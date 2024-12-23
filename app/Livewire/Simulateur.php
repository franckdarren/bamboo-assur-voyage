<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Rdv;
use Livewire\Component;
use App\Models\Cotation;
use App\Models\Souscription;
use Livewire\WithValidation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationSouscription;

class Simulateur extends Component
{

    public $cotationId;
    public $destination = "";
    public $voyageurs = 0;
    public $depart;
    public $retour;
    public $nombreJours = 0;
    public $montant = 0;
    public $nombreJoursStocke = 0;

    public $currentStep = 1;

    public $nom_prenom_souscripteur;
    public $adresse_souscripteur;
    public $phone_souscripteur;
    public $email_souscripteur;
    public $nom_prenom_assure;
    public $date_naissance_assure;
    public $adresse_assure;
    public $phone_assure;
    public $email_assure;
    public $passeport_assure;
    public $statut;
    public $mode_paiement;


    public $date_rdv;
    public $heure_rdv;
    public $agence;
    public $souscription_id;



    public $liste_voyageurs = [];

    protected $tarifs = [
        'afrique-shengen' => [
            'pays' => ['Afrique du Sud',  'Algérie', 'Allemagne', 'Angola', 'Autriche', 'Belgique', 'Bénin', 'Burkina Faso', 'Burundi', 'Cameroun', 'Cap-Vert', 'République Centrafricaine', 'Tchad', 'Comores', 'Congo', 'République Démocratique du Congo', "Côte d'Ivoire", 'Djibouti', 'Danemark', 'Égypte', 'Érythrée', 'Espagne', 'Estonie', 'Eswatini', 'Éthiopie', 'Finlande', 'France', 'Gabon', 'Gambie', 'Ghana', 'Grèce', 'Guinée', 'Guinée-Bissau', 'Guinée Equatoriale', 'Hongrie', 'Islande', 'Italie', 'Kenya', 'Lesotho', 'Lettonie', 'Lituanie', 'Luxembourg', 'Madagascar',  'Malawi', 'Mali', 'Malte', 'Maroc', 'Maurice', 'Mauritanie', 'Mozambique', 'Namibie', 'Niger', 'Nigéria', 'Norvège', 'Ouganda', 'Pays-Bas', 'Portugal', 'Rwanda', 'Sénégal', 'Seychelles', 'Sierra Leone', 'Slovaquie', 'Slovénie', 'Somalie', 'Soudan', 'Suède', 'Suisse', 'Tanzanie', 'Togo', 'Tunisie', 'Zambie', 'Zimbabwe' ], // Ajoutez les pays concernés
            'tarifs' => [
                [1, 7, 13000],
                [8, 10, 16000],
                [11, 15, 20000],
                [16, 21, 25000],
                [22, 30, 28000],
                [31, 45, 37000],
                [46, 60, 40000],
                [61, 91, 65000],
                [92, 180, 75000],
                [181, 365, 85000],
            ],
        ],
        'monde' => [
            'pays' => ['Afghanistan', 'Albanie', 'Arabie Saoudite', 'Argentine', 'Arménie', 'Australie', 'Albanie', 'Azerbaïdjan', 'Bangladesh', 'Biélorussie', 'Brésil', 'Canada', 'Chili', 'Chine', 'Colombie', 'Corée du Sud', 'Costa Rica', 'Émirats Arabes Unis', 'États-Unis', 'Géorgie', 'Inde', 'Indonésie', 'Iran', 'Irak', 'Israël', 'Japon','Jordanie', 'Kazakhstan', 'Kirghizistan', 'Liban', 'Malaisie', 'Mexique', 'Mongolie', 'Nouvelle-Zélande', 'Pakistan', 'Pérou', 'Philippines', 'Qatar', 'Russie', 'Serbie', 'Singapour', 'Sri Lanka', 'Thaïlande', 'Turquie', 'Ukraine', 'Uruguay', 'Venezuela', 'Vietnam' ], // Ajoutez les pays concernés
            'tarifs' => [
                [1, 7, 15000],
                [8, 10, 18000],
                [11, 15, 24000],
                [16, 21, 30000],
                [22, 30, 39000],
                [31, 45, 45000],
                [46, 60, 53000],
                [61, 91, 85000],
                [92, 180, 105000],
                [181, 365, 120000],
            ],
        ],
    ];

    protected function getCategorieByDestination($destination)
    {
        foreach ($this->tarifs as $categorie => $details) {
            if (in_array($destination, $details['pays'])) {
                return $categorie;
            }
        }
        return null; // Retournez null si la destination n'est pas trouvée
    }

    public function calculMontant()
    {
        $categorie = $this->getCategorieByDestination($this->destination);
        if (!$categorie) {
            $this->montant = 0; // Si la destination n'est pas reconnue
            return;
        }

        $tarifs = $this->tarifs[$categorie]['tarifs'];

        foreach ($tarifs as [$min, $max, $prix]) {
            if ($this->nombreJours >= $min && $this->nombreJours <= $max) {
                $this->montant = $this->voyageurs * $prix;
                return;
            }
        }

        $this->montant = 0; // Si aucun tarif ne correspond
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['destination', 'nombreJours', 'voyageurs'])) {
            $this->calculMontant();
        }
    }



    public function updatedVoyageurs($value)
    {
        // Vérifiez si la date de retour est définie avant de calculer
        if ($this->retour) {
            $this->calculateDays();
        }

        // Mettre à jour la liste des voyageurs en fonction du nombre de voyageurs
        $this->liste_voyageurs = array_fill(0, $value, [
            'nom_prenom_assure' => '',
            'date_naissance_assure' => '',
            'adresse_assure' => '',
            'phone_assure' => '',
            'email_assure' => '',
            'passeport_assure' => '',
        ]);
    }

    public function updatedDestination($value)
    {
        // Vérifiez si la date de retour est définie avant de calculer
        if ($this->retour) {
            $this->calculateDays();
        }
    }

    public function updatedDepart($value)
    {
        // Vérifiez si la date de retour est définie avant de calculer
        if ($this->retour) {
            $this->calculateDays();
        }
    }

    public function updatedRetour($value)
    {
        // Vérifiez si la date de départ est définie avant de calculer
        if ($this->depart) {
            $this->calculateDays();
        }
    }

    public function calculateDays()
    {
        // Vérifiez que les deux dates sont définies
        if ($this->depart && $this->retour) {
            // Convertir les dates en instances de Carbon
            $departDate = Carbon::parse($this->depart);
            $retourDate = Carbon::parse($this->retour);

            // Vérifiez que la date de retour est après la date de départ
            if ($retourDate->greaterThanOrEqualTo($departDate)) {
                // Calculer la différence de jours et ajouter 1
                $this->nombreJours = $departDate->diffInDays($retourDate) + 1; // Inclusif

                // Identifier la catégorie basée sur la destination
                $categorie = $this->getCategorieByDestination($this->destination);

                if ($categorie) {
                    // Appliquer les tarifs correspondants
                    $tarifs = $this->tarifs[$categorie]['tarifs'];
                    foreach ($tarifs as [$min, $max, $prix]) {
                        if ($this->nombreJours >= $min && $this->nombreJours <= $max) {
                            $this->montant = $this->voyageurs * $prix;
                            return;
                        }
                    }
                    // Si aucun tarif ne correspond, mettre à 0
                    $this->montant = 0;
                } else {
                    $this->montant = 0; // Destination non reconnue
                }
            } else {
                $this->nombreJours = 0; // Dates invalides
            }
        }
    }


    public function resetForm()
    {
        $this->reset(); // Réinitialise toutes les propriétés publiques à leurs valeurs par défaut
        $this->currentStep = 1;
    }

    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    private function validateStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'destination' => 'required',
                'voyageurs' => 'required|numeric|min:1',
                'depart' => 'required|date',
                'retour' => 'required|date',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'nom_prenom_souscripteur' => 'required|string',
                'adresse_souscripteur' => 'required|string',
                'phone_souscripteur' => 'required|string',
            ]);
        }
    }

    // Fonction pour créer une souscription
    public function createSouscription()
    {

        // Créer une nouvelle cotation
        $cotation = Cotation::create([
            'destination' => $this->destination,  // Assurez-vous que vous passez ces données dans le formulaire
            'voyageurs' => $this->voyageurs,
            'depart' => $this->depart,
            'retour' => $this->retour,
            'nombre_jours' => $this->nombreJours,
            'montant' => $this->montant,
        ]);

        // Créer les souscriptions pour chaque voyageur
        foreach ($this->liste_voyageurs as $voyageur) {
            $souscription = Souscription::create([
                'cotation_id' => $cotation->id,  // Lier la souscription à la cotation
                'nom_prenom_assure' => $voyageur['nom_prenom_assure'],
                'date_naissance_assure' => $voyageur['date_naissance_assure'],
                'adresse_assure' => $voyageur['adresse_assure'],
                'phone_assure' => $voyageur['phone_assure'],
                'email_assure' => $voyageur['email_assure'],
                'passeport_assure' => $voyageur['passeport_assure'],

                // Informations du souscripteur
                'nom_prenom_souscripteur' => $this->nom_prenom_souscripteur,
                'adresse_souscripteur' => $this->adresse_souscripteur,
                'phone_souscripteur' => $this->phone_souscripteur,
                'email_souscripteur' => $this->email_souscripteur,
            ]);
        }

        // Validation des données
        $this->validate([
            'date_rdv' => 'required|date',
            'heure_rdv' => 'required|date_format:H:i',
        ]);

        // Créer un rendez-vous lié à la souscription
        $rdv = Rdv::create([
            'souscription_id' => $souscription->id,
            'date_rdv' => $this->date_rdv,
            'agence' => $this->agence,
            'heure_rdv' => $this->heure_rdv,
        ]);

        Mail::to($souscription->email_assure)->send(new ConfirmationSouscription($souscription, $cotation, $rdv));

        // Message de succès
        session()->flash('message', 'Souscription(s) créées avec succès. Verifier la boite mail du souscripteur.');

        // Réinitialiser les données des voyageurs (optionnel)
        $this->liste_voyageurs = [];
        // Réinitialiser les données des voyageurs et du souscripteur (optionnel)
        $this->nom_prenom_souscripteur = '';
        $this->adresse_souscripteur = '';
        $this->phone_souscripteur = '';
        $this->email_souscripteur = '';
        $this->destination = '';  // Réinitialiser destination et autres champs de cotation
        $this->voyageurs = 1;
        $this->depart = null;
        $this->retour = null;
        $this->montant = null;
        $this->date_rdv = null;
        $this->heure_rdv = null;
        $this->agence = '';
    }

    public function createSouscriptionWithPaiement()
    {

        // Créer une nouvelle cotation
        $cotation = Cotation::create([
            'destination' => $this->destination,  // Assurez-vous que vous passez ces données dans le formulaire
            'voyageurs' => $this->voyageurs,
            'depart' => $this->depart,
            'retour' => $this->retour,
            'nombre_jours' => $this->nombreJours,
            'montant' => $this->montant,
        ]);

        // Créer les souscriptions pour chaque voyageur
        foreach ($this->liste_voyageurs as $voyageur) {
            $souscription = Souscription::create([
                'cotation_id' => $cotation->id,  // Lier la souscription à la cotation
                'nom_prenom_assure' => $voyageur['nom_prenom_assure'],
                'date_naissance_assure' => $voyageur['date_naissance_assure'],
                'adresse_assure' => $voyageur['adresse_assure'],
                'phone_assure' => $voyageur['phone_assure'],
                'email_assure' => $voyageur['email_assure'],
                'passeport_assure' => $voyageur['passeport_assure'],

                // Informations du souscripteur
                'nom_prenom_souscripteur' => $this->nom_prenom_souscripteur,
                'adresse_souscripteur' => $this->adresse_souscripteur,
                'phone_souscripteur' => $this->phone_souscripteur,
                'email_souscripteur' => $this->email_souscripteur,

                'statut' => 'En cours de traitement',
                'mode_paiement' => 'En ligne',

            ]);
        }

        Mail::to($souscription->email_assure)->send(new ConfirmationSouscription($souscription, $cotation, $rdv));

        // Message de succès
        session()->flash('message', 'Souscription(s) créées avec succès. Verifier la boite mail du souscripteur.');

        // Réinitialiser les données des voyageurs (optionnel)
        $this->liste_voyageurs = [];
        // Réinitialiser les données des voyageurs et du souscripteur (optionnel)
        $this->nom_prenom_souscripteur = '';
        $this->adresse_souscripteur = '';
        $this->phone_souscripteur = '';
        $this->email_souscripteur = '';
        $this->destination = '';  // Réinitialiser destination et autres champs de cotation
        $this->voyageurs = 1;
        $this->depart = null;
        $this->retour = null;
        $this->montant = null;
        $this->date_rdv = null;
        $this->heure_rdv = null;
        $this->agence = '';
    }



    public function render()
    {
        return view('livewire.simulateur');
    }
}
