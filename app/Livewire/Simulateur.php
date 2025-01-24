<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Rdv;
use App\Models\Agence;
use Livewire\Component;
use App\Models\Cotation;
use App\Models\Souscription;
use Livewire\WithValidation;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationSouscription;
use Illuminate\Support\Facades\Storage;
use App\Jobs\EnvoyerConfirmationSouscription;

class Simulateur extends Component
{

    use WithFileUploads;

    public $cotationId;
    public $destination = "";
    public $voyageurs;
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
    public $url_passeport_assure;
    public $url_billet_voyage;

    public $urlBilletCollectif = null; // Pour l'URL collective

    public $statut;
    public $mode_paiement;


    public $date_rdv;
    public $heure_rdv;
    public $agence_id;
    public $souscription_id;

    public $isCollectif = false; // Par défaut, individuel

    public $liste_voyageurs = [];

    protected $tarifs = [
        'afrique-shengen' => [
            'pays' => ['Afrique du Sud', 'Algérie', 'Allemagne', 'Angola', 'Autriche', 'Belgique', 'Bénin', 'Burkina Faso', 'Burundi', 'Cameroun', 'Cap-Vert', 'République Centrafricaine', 'Tchad', 'Comores', 'Congo', 'République Démocratique du Congo', "Côte d'Ivoire", 'Djibouti', 'Danemark', 'Égypte', 'Érythrée', 'Espagne', 'Estonie', 'Eswatini', 'Éthiopie', 'Finlande', 'France', 'Gabon', 'Gambie', 'Ghana', 'Grèce', 'Guinée', 'Guinée-Bissau', 'Guinée Equatoriale', 'Hongrie', 'Islande', 'Italie', 'Kenya', 'Lesotho', 'Lettonie', 'Lituanie', 'Luxembourg', 'Madagascar', 'Malawi', 'Mali', 'Malte', 'Maroc', 'Maurice', 'Mauritanie', 'Mozambique', 'Namibie', 'Niger', 'Nigéria', 'Norvège', 'Ouganda', 'Pays-Bas', 'Portugal', 'Rwanda', 'Sénégal', 'Seychelles', 'Sierra Leone', 'Slovaquie', 'Slovénie', 'Somalie', 'Soudan', 'Suède', 'Suisse', 'Tanzanie', 'Togo', 'Tunisie', 'Zambie', 'Zimbabwe'], // Ajoutez les pays concernés
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
            'pays' => ['Afghanistan', 'Albanie', 'Arabie Saoudite', 'Argentine', 'Arménie', 'Australie', 'Albanie', 'Azerbaïdjan', 'Bangladesh', 'Biélorussie', 'Brésil', 'Canada', 'Chili', 'Chine', 'Colombie', 'Corée du Sud', 'Costa Rica', 'Émirats Arabes Unis', 'États-Unis', 'Géorgie', 'Inde', 'Indonésie', 'Iran', 'Irak', 'Israël', 'Japon', 'Jordanie', 'Kazakhstan', 'Kirghizistan', 'Liban', 'Malaisie', 'Mexique', 'Mongolie', 'Nouvelle-Zélande', 'Pakistan', 'Pérou', 'Philippines', 'Qatar', 'Russie', 'Serbie', 'Singapour', 'Sri Lanka', 'Thaïlande', 'Turquie', 'Ukraine', 'Uruguay', 'Venezuela', 'Vietnam'], // Ajoutez les pays concernés
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

    protected $rules = [
        'depart' => 'required|date|after_or_equal:today',
        'retour' => 'required|date|after:depart',
    ];

    public function messages()
    {
        return [
            'destination.required' => 'Veuillez indiquer la destination.',
            'voyageurs.required' => 'Le nombre de voyageurs est requis.',
            'depart.required' => 'La date de départ est obligatoire.',
            'retour.required' => 'La date de retour est obligatoire.',
            'retour.after_or_equal' => 'La date de retour doit être après ou égale à la date de départ.',
            'nombreJours.required' => 'Le nombre de jours est obligatoire.',
            'montant.required' => 'Le montant est requis.',
            'nom_prenom_souscripteur.required' => 'Le nom et prénom du souscripteur sont requis.',
            'adresse_souscripteur.required' => 'L\'adresse du souscripteur est obligatoire.',
            'phone_souscripteur.required' => 'Le téléphone du souscripteur est requis.',
            'email_souscripteur.required' => 'L\'email du souscripteur est obligatoire.',
            'liste_voyageurs.*.nom_prenom_assure.required' => 'Le nom et prénom du voyageur est requis.',
            'liste_voyageurs.*.date_naissance_assure.required' => 'La date de naissance du voyageur est obligatoire.',
            'liste_voyageurs.*.email_assure.required' => 'L\'email du voyageur est obligatoire.',
            'liste_voyageurs.*.passeport_assure.required' => 'Le numéro de passeport est requis.',
            'liste_voyageurs.*.url_passeport_assure.required' => 'L\'image du passeport est obligatoire.',
            'liste_voyageurs.*.url_billet_voyage.required' => 'L\'image du billet de voyage est obligatoire.',
            'date_rdv.required' => 'La date de rendez-vous est obligatoire.',
            'heure_rdv.required' => 'L\'heure de rendez-vous est obligatoire.',
            'heure_rdv.date_format' => 'L\'heure doit être au format HH:MM.',
            'agence_id.required' => 'L\'agence est obligatoire.',
        ];
    }

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
            'email_assure' => '',
            'passeport_assure' => '',
            'url_passeport_assure' => '',
            'url_billet_voyage' => '',

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
        // Validation de la date de départ pour qu'elle soit aujourd'hui ou après
        if (strtotime($this->depart) < strtotime(today())) {
            $this->addError('depart', 'La date de départ doit être aujourd\'hui ou une date ultérieure.');
        } else {
            $this->resetErrorBag('depart'); // Réinitialise l'erreur si la validation passe
        }

        // Vérifiez si la date de retour est définie avant de calculer
        if ($this->retour) {
            $this->calculateDays();
        }
    }

    public function updatedRetour($value)
    {
        // Validation de la date de retour par rapport à la date de départ
        if ($this->depart && strtotime($this->retour) <= strtotime($this->depart)) {
            $this->addError('retour', 'La date de retour doit être supérieure à la date de départ.');
        } else {
            $this->resetErrorBag('retour'); // Réinitialise l'erreur si la validation passe
        }

        // Vérifie si la date de départ est définie avant de calculer les jours
        if ($this->depart) {
            $this->calculateDays();
        }
    }

    public function updatedDateRdv($value)
    {
        // Vérifie si la date de rendez-vous est définie avant la date de départ
        if ($this->depart && strtotime($this->date_rdv) > strtotime($this->depart)) {
            $this->addError('date_rdv', 'La date du rendez-vous doit être avant la date de départ.');
        } else {
            $this->resetErrorBag('date_rdv'); // Réinitialise l'erreur si la validation passe
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

    public function stepResume()
    {
        $this->validateStep();
        $this->currentStep = 5;
    }

    public function stepPayer()
    {
        $this->validateStep();
        $this->currentStep = 3;
    }

    public function returnResume()
    {
        $this->currentStep = 2;
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
                'depart' => 'required|date|after_or_equal:today',
                'retour' => 'required|date|after:depart',
            ]);
        } elseif ($this->currentStep == 2) {
            // dd($this->liste_voyageurs);
            $this->validate([
                'nom_prenom_souscripteur' => 'required|string',
                'adresse_souscripteur' => 'required|string',
                'phone_souscripteur' => 'required|string',
                'email_souscripteur' => 'required|email',
                'liste_voyageurs.*.passeport_assure' => 'required|string',
                'liste_voyageurs.*.url_passeport_assure' => 'required|image|max:10240',
                'liste_voyageurs.*.url_billet_voyage' => 'nullable|image|max:10240',
                'liste_voyageurs.*.nom_prenom_assure' => 'required|string',
                'liste_voyageurs.*.date_naissance_assure' => 'required|date',
                'liste_voyageurs.*.email_assure' => 'required|email',
            ]);
        }
    }

    // // Met à jour l'URL collective pour tous les voyageurs
    // public function updatedUrlBilletCollectif($value)
    // {
    //     if ($this->isCollectif) {
    //         foreach ($this->liste_voyageurs as $index => $voyageur) {
    //             $this->liste_voyageurs[$index]['url_billet_voyage'] = $value;
    //         }
    //     }
    // }

    // public function updatedIsCollectif()
    // {
    //     if ($this->isCollectif) {
    //         // Si le billet est collectif, applique l'URL du billet du premier voyageur à tous les autres
    //         $urlCollectif = $this->liste_voyageurs[0]['url_billet_voyage'] ?? '';
    //         foreach ($this->liste_voyageurs as $index => &$voyageur) {
    //             if ($index > 0) {
    //                 $voyageur['url_billet_voyage'] = $urlCollectif;
    //             }
    //         }
    //     }
    // }

    // public function updatedListeVoyageurs($value, $key)
    // {
    //     // Si le billet est collectif, synchronise l'URL entre tous les voyageurs
    //     if ($this->isCollectif && str_contains($key, '.url_billet_voyage')) {
    //         $urlCollectif = $this->liste_voyageurs[0]['url_billet_voyage'] ?? '';
    //         foreach ($this->liste_voyageurs as $index => &$voyageur) {
    //             $voyageur['url_billet_voyage'] = $urlCollectif;
    //         }
    //     }
    // }


    // Fonction pour créer une souscription
    public function createSouscription()
    {
        $this->validate([
            'destination' => 'required|string',
            'voyageurs' => 'required|integer|min:1',
            'depart' => 'required|date',
            'retour' => 'required|date|after_or_equal:depart',
            'nombreJours' => 'required|integer|min:1',
            'montant' => 'required|numeric',
            'nom_prenom_souscripteur' => 'required|string',
            'adresse_souscripteur' => 'required|string',
            'phone_souscripteur' => 'required|string',
            'email_souscripteur' => 'required|email',
            'liste_voyageurs.*.nom_prenom_assure' => 'required|string',
            'liste_voyageurs.*.date_naissance_assure' => 'required|date',
            'liste_voyageurs.*.email_assure' => 'required|email',
            'liste_voyageurs.*.passeport_assure' => 'required|string',
            'liste_voyageurs.*.url_passeport_assure' => 'required|image|max:10240',
            'liste_voyageurs.*.url_billet_voyage' => 'nullable|image|max:10240',

            'date_rdv' => 'required|date',
            'heure_rdv' => 'required|date_format:H:i',
            'agence_id' => 'required',
        ]);

        $cotation = Cotation::create([
            'destination' => $this->destination,
            'voyageurs' => $this->voyageurs,
            'depart' => $this->depart,
            'retour' => $this->retour,
            'nombre_jours' => $this->nombreJours,
            'montant' => $this->montant,
        ]);

        $isCollectifOn = $this->isCollectif;

        foreach ($this->liste_voyageurs as &$voyageur) {
            if (isset($voyageur['url_passeport_assure']) && $voyageur['url_passeport_assure']) {
                $path = $voyageur['url_passeport_assure']->store('passeports', 'public');
                $voyageur['url_passeport_assure'] = $path;
            }
            if (isset($voyageur['url_billet_voyage']) && $voyageur['url_billet_voyage']) {
                $path2 = $voyageur['url_billet_voyage']->store('billets', 'public');
                $voyageur['url_billet_voyage'] = $path2;
            }


            if ($isCollectifOn) {
                $urlBilletVoyage = $this->liste_voyageurs[0]['url_billet_voyage'];
                // Créer une souscription pour chaque voyageur en mode collectif
                $souscription = Souscription::create([
                    'cotation_id' => $cotation->id,
                    'nom_prenom_assure' => $voyageur['nom_prenom_assure'],
                    'date_naissance_assure' => $voyageur['date_naissance_assure'],
                    'email_assure' => $voyageur['email_assure'],
                    'passeport_assure' => $voyageur['passeport_assure'],
                    'url_passeport_assure' => $voyageur['url_passeport_assure'],
                    'url_billet_voyage' => $urlBilletVoyage, // Utiliser l'URL déterminée
                    'nom_prenom_souscripteur' => $this->nom_prenom_souscripteur,
                    'adresse_souscripteur' => $this->adresse_souscripteur,
                    'phone_souscripteur' => $this->phone_souscripteur,
                    'email_souscripteur' => $this->email_souscripteur,
                ]);

                // Créer un rendez-vous pour chaque souscription
                $rdv = Rdv::create([
                    'souscription_id' => $souscription->id,
                    'date_rdv' => $this->date_rdv,
                    'agence_id' => $this->agence_id,
                    'heure_rdv' => $this->heure_rdv,
                ]);

                // Envoyer la confirmation par email
                EnvoyerConfirmationSouscription::dispatch($souscription, $cotation, $rdv);

            } else {
                $souscription = Souscription::create([
                    'cotation_id' => $cotation->id,
                    'nom_prenom_assure' => $voyageur['nom_prenom_assure'],
                    'date_naissance_assure' => $voyageur['date_naissance_assure'],
                    'email_assure' => $voyageur['email_assure'],
                    'passeport_assure' => $voyageur['passeport_assure'],
                    'url_passeport_assure' => $voyageur['url_passeport_assure'],
                    'url_billet_voyage' => $voyageur['url_billet_voyage'],
                    'nom_prenom_souscripteur' => $this->nom_prenom_souscripteur,
                    'adresse_souscripteur' => $this->adresse_souscripteur,
                    'phone_souscripteur' => $this->phone_souscripteur,
                    'email_souscripteur' => $this->email_souscripteur,
                ]);

                $rdv = Rdv::create([
                    'souscription_id' => $souscription->id,
                    'date_rdv' => $this->date_rdv,
                    'agence_id' => $this->agence_id,
                    'heure_rdv' => $this->heure_rdv,
                ]);

                // Envoyer les confirmation par mail
                EnvoyerConfirmationSouscription::dispatch($souscription, $cotation, $rdv);
            }


        }

        session()->flash('success', 'Souscription(s) créées avec succès. Vérifiez la boîte mail du souscripteur.');

        $this->resetInputFields();
    }


    private function resetInputFields()
    {
        $this->liste_voyageurs = [];
        $this->nom_prenom_souscripteur = '';
        $this->adresse_souscripteur = '';
        $this->phone_souscripteur = '';
        $this->email_souscripteur = '';
        $this->destination = '';
        $this->voyageurs = 1;
        $this->depart = null;
        $this->retour = null;
        $this->montant = null;
        $this->date_rdv = null;
        $this->heure_rdv = null;
        $this->agence_id = '';
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
        $this->agence_id = '';
    }

    public function imprimerDevis()
    {

        $this->validate([
            'destination' => 'required|string',
            'voyageurs' => 'required|integer|min:1',
            'depart' => 'required|date',
            'retour' => 'required|date|after_or_equal:depart',
            'nombreJours' => 'required|integer|min:1',
            'montant' => 'required|numeric',
            'nom_prenom_souscripteur' => 'required|string',
            'adresse_souscripteur' => 'required|string',
            'phone_souscripteur' => 'required|string',
            'email_souscripteur' => 'required|email',
            'liste_voyageurs.*.nom_prenom_assure' => 'required|string',
            'liste_voyageurs.*.date_naissance_assure' => 'required|date',
            'liste_voyageurs.*.email_assure' => 'required|email',
            'liste_voyageurs.*.passeport_assure' => 'required|string',
            // 'liste_voyageurs.*.url_passeport_assure' => 'nullable|image|max:10240',
        ]);

        foreach ($this->liste_voyageurs as &$voyageur) {

            $data = [
                'destination' => $this->destination,
                'voyageurs' => $this->voyageurs,
                'depart' => $this->depart,
                'retour' => $this->retour,
                'nombre_jours' => $this->nombreJours,
                'montant' => $this->montant,

                'nom_prenom_assure' => $voyageur['nom_prenom_assure'],
                'date_naissance_assure' => $voyageur['date_naissance_assure'],
                'email_assure' => $voyageur['email_assure'],
                'passeport_assure' => $voyageur['passeport_assure'],
                'url_passeport_assure' => $voyageur['url_passeport_assure'],
                'url_billet_voyage' => $voyageur['url_billet_voyage'],

                'nom_prenom_souscripteur' => $this->nom_prenom_souscripteur,
                'adresse_souscripteur' => $this->adresse_souscripteur,
                'phone_souscripteur' => $this->phone_souscripteur,
                'email_souscripteur' => $this->email_souscripteur,

                'liste_voyageurs' => $this->liste_voyageurs,
            ];

            $pdf = Pdf::loadView('devis', $data);

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, 'devis.pdf');
        }
    }



    public function render()
    {
        $agences = Agence::get();

        return view('livewire.simulateur', [
            'agences' => $agences,
            'isButtonDisabled' => $this->nombreJours > 366 || $this->montant == 0,
        ]);
    }
}
