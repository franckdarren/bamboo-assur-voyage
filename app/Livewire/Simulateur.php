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

    public $date_rdv;
    public $heure_rdv;
    public $agence;
    public $souscription_id;



    public $liste_voyageurs = [];

    // Validation des champs
    protected $rules = [
        'liste_voyageurs.*.nom_prenom_assure' => 'required|string|max:255',
        'liste_voyageurs.*.date_naissance_assure' => 'required|date',
        'liste_voyageurs.*.adresse_assure' => 'required|string|max:255',
        'liste_voyageurs.*.phone_assure' => 'required|string|max:20',
        'liste_voyageurs.*.email_assure' => 'required|email',
        'liste_voyageurs.*.passport_assure' => 'required|string|max:255',

        // Validation des informations du souscripteur
        'nom_prenom_souscripteur' => 'required|string|max:255',
        'adresse_souscripteur' => 'required|string|max:255',
        'phone_souscripteur' => 'required|string|max:20',
        'email_souscripteur' => 'required|email',
    ];


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

                // Définir les tarifs basés sur la destination et le nombre de jours
                switch ($this->destination) {
                    case 'afrique-shengen':
                        // Déterminer le tarif en fonction du nombre de jours
                        if ($this->nombreJours > 0 && $this->nombreJours <= 7) {
                            // Tarif pour les jours entre 1 et 7
                            $this->montant = $this->voyageurs * 13000;
                        } elseif ($this->nombreJours > 7 && $this->nombreJours <= 10) {
                            // Tarif pour les jours entre 7 et 10
                            $this->montant = $this->voyageurs * 16000;
                        } elseif ($this->nombreJours > 10 && $this->nombreJours <= 15) {
                            // Tarif pour les jours entre 10 et 15
                            $this->montant = $this->voyageurs * 20000;
                        } elseif ($this->nombreJours > 15 && $this->nombreJours <= 21) {
                            // Tarif pour les jours entre 15 et 21
                            $this->montant = $this->voyageurs * 25000;
                        } elseif ($this->nombreJours > 21 && $this->nombreJours <= 30) {
                            // Tarif pour les jours entre 21 et 30
                            $this->montant = $this->voyageurs * 28000;
                        } elseif ($this->nombreJours > 30 && $this->nombreJours <= 45) {
                            // Tarif pour les jours entre 30 et 45
                            $this->montant = $this->voyageurs * 37000;
                        } elseif ($this->nombreJours > 45 && $this->nombreJours <= 60) {
                            // Tarif pour les jours entre 45 et 60
                            $this->montant = $this->voyageurs * 40000;
                        } elseif ($this->nombreJours > 60 && $this->nombreJours <= 91) {
                            // Tarif pour les jours entre 60 et 91
                            $this->montant = $this->voyageurs * 65000;
                        } elseif ($this->nombreJours > 91 && $this->nombreJours <= 180) {
                            // Tarif pour les jours entre 91 et 180
                            $this->montant = $this->voyageurs * 75000;
                        } elseif ($this->nombreJours > 180 && $this->nombreJours <= 365) {
                            // Tarif pour les jours entre 180 et 365
                            $this->montant = $this->voyageurs * 85000;
                        } else {
                        }
                        break; // Sortir du switch une fois que le cas est traité

                    case 'monde':
                        // Déterminer le tarif en fonction du nombre de jours
                        if ($this->nombreJours > 0 && $this->nombreJours <= 7) {
                            // Tarif pour les jours entre 1 et 7
                            $this->montant = $this->voyageurs * 15000;
                        } elseif ($this->nombreJours > 7 && $this->nombreJours <= 10) {
                            // Tarif pour les jours entre 7 et 10
                            $this->montant = $this->voyageurs * 18000;
                        } elseif ($this->nombreJours > 10 && $this->nombreJours <= 15) {
                            // Tarif pour les jours entre 10 et 15
                            $this->montant = $this->voyageurs * 24000;
                        } elseif ($this->nombreJours > 15 && $this->nombreJours <= 21) {
                            // Tarif pour les jours entre 15 et 21
                            $this->montant = $this->voyageurs * 30000;
                        } elseif ($this->nombreJours > 21 && $this->nombreJours <= 30) {
                            // Tarif pour les jours entre 21 et 30
                            $this->montant = $this->voyageurs * 39000;
                        } elseif ($this->nombreJours > 30 && $this->nombreJours <= 45) {
                            // Tarif pour les jours entre 30 et 45
                            $this->montant = $this->voyageurs * 45000;
                        } elseif ($this->nombreJours > 45 && $this->nombreJours <= 60) {
                            // Tarif pour les jours entre 45 et 60
                            $this->montant = $this->voyageurs * 53000;
                        } elseif ($this->nombreJours > 60 && $this->nombreJours <= 91) {
                            // Tarif pour les jours entre 60 et 91
                            $this->montant = $this->voyageurs * 85000;
                        } elseif ($this->nombreJours > 91 && $this->nombreJours <= 180) {
                            // Tarif pour les jours entre 91 et 180
                            $this->montant = $this->voyageurs * 105000;
                        } elseif ($this->nombreJours > 180 && $this->nombreJours <= 365) {
                            // Tarif pour les jours entre 180 et 365
                            $this->montant = $this->voyageurs * 120000;
                        } else {
                        }
                        break;

                    default:
                        $this->montant = 0; // Tarif par défaut si la destination n'est pas reconnue
                        break;
                }
                // $this->montant = $this->nombreJours * $this->voyageurs; // Inclusif
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



    public function render()
    {
        return view('livewire.simulateur');
    }
}
