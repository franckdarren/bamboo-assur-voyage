<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Simulateur extends Component
{
    public $destination = "";
    public $voyageurs = 0;
    public $depart;
    public $retour;
    public $nombreJours = 0;
    public $montant = 0;
    public $nombreJoursStocke = 0;

    public function updatedVoyageurs($value)
    {
        // Vérifiez si la date de retour est définie avant de calculer
        if ($this->retour) {
            $this->calculateDays();
        }
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
                    case 'afrique-schengen':
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
    }

    public function createSouscription()
    {
        // Logique pour créer la souscription
    }

    public function render()
    {
        return view('livewire.simulateur');
    }
}
