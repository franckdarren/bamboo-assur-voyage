<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Souscription; // Assurez-vous d'importer le modèle

class DashboardCount extends Component
{
    public $souscription_jour;
    public $souscription_attentes;
    public $souscription_totales;
    public $souscription_encours_traitement;


    public function render()
    {
        // Rafraîchir les données à chaque requête
        $this->souscription_jour = Souscription::whereDate('created_at', now()->toDateString())->count();
        $this->souscription_attentes = Souscription::where('statut', 'En attente de paiement')->count();
        $this->souscription_encours_traitement = Souscription::where('statut', 'En cours de traitement')->count();
        $this->souscription_totales = Souscription::count();

        return view('livewire.dashboard-count', [
            'souscription_jour' => $this->souscription_jour,
            'souscription_attentes' => $this->souscription_attentes,
            'souscription_totales' => $this->souscription_totales,
        ]);
    }
}
