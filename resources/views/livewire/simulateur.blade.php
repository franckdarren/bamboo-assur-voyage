<div class="mt-2 max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-lg border border-gray-200">
    <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Simulation de Cotation</h2>
    <form wire:submit.prevent="submit" class="space-y-6">
        <!-- Destination -->
        <div>
            <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
            <select wire:model.live="destination" id="destination"
                class="mt-2 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option>Sélectionnez une destination</option>
                <option value="monde">Afghanistan</option>
                <option value="afrique-shengen">Afrique du Sud</option>
                <option value="monde">Albanie</option>
                <option value="afrique-shengen">Algérie</option>
                <option value="afrique-shengen">Allemagne</option>
                <option value="afrique-shengen">Angola</option>
                <option value="monde">Arabie Saoudite</option>
                <option value="monde">Argentine</option>
                <option value="monde">Arménie</option>
                <option value="monde">Australie</option>
                <option value="afrique-shengen">Autriche</option>
                <option value="monde">Azerbaïdjan</option>
                <option value="monde">Bangladesh</option>
                <option value="afrique-shengen">Belgique</option>
                <option value="afrique-shengen">Bénin</option>
                <option value="monde">Biélorussie</option>
                <option value="afrique-shengen">Botswana</option>
                <option value="monde">Brésil</option>
                <option value="afrique-shengen">Burkina Faso</option>
                <option value="afrique-shengen">Burundi</option>
                <option value="afrique-shengen">Cameroun</option>
                <option value="monde">Canada</option>
                <option value="afrique-shengen">Cap-Vert</option>
                <option value="monde">Chili</option>
                <option value="monde">Chine</option>
                <option value="monde">Colombie</option>
                <option value="monde">Corée du Sud</option>
                <option value="monde">Costa Rica</option>
                <option value="afrique-shengen">République centrafricaine</option>
                <option value="afrique-shengen">Tchad</option>
                <option value="afrique-shengen">Comores</option>
                <option value="afrique-shengen">Congo</option>
                <option value="afrique-shengen">République Démocratique du Congo</option>
                <option value="afrique-shengen">Côte d'Ivoire</option>
                <option value="afrique-shengen">Djibouti</option>
                <option value="afrique-shengen">Danemark</option>
                <option value="afrique-shengen">Égypte</option>
                <option value="monde">Émirats Arabes Unis</option>
                <option value="afrique-shengen">Érythrée</option>
                <option value="afrique-shengen">Espagne</option>
                <option value="afrique-shengen">Estonie</option>
                <option value="afrique-shengen">Eswatini</option>
                <option value="monde">États-Unis</option>
                <option value="afrique-shengen">Éthiopie</option>
                <option value="afrique-shengen">Finlande</option>
                <option value="afrique-shengen">France</option>
                <option value="afrique-shengen">Gabon</option>
                <option value="afrique-shengen">Gambie</option>
                <option value="monde">Géorgie</option>
                <option value="afrique-shengen">Ghana</option>
                <option value="afrique-shengen">Grèce</option>
                <option value="afrique-shengen">Guinée</option>
                <option value="afrique-shengen">Guinée-Bissau</option>
                <option value="afrique-shengen">Guinée équatoriale</option>
                <option value="afrique-shengen">Hongrie</option>
                <option value="monde">Inde</option>
                <option value="monde">Indonésie</option>
                <option value="monde">Iran</option>
                <option value="monde">Irak</option>
                <option value="afrique-shengen">Islande</option>
                <option value="monde">Israël</option>
                <option value="afrique-shengen">Italie</option>
                <option value="monde">Japon</option>
                <option value="monde">Jordanie</option>
                <option value="monde">Kazakhstan</option>
                <option value="monde">Kirghizistan</option>
                <option value="afrique-shengen">Kenya</option>
                <option value="monde">Liban</option>
                <option value="afrique-shengen">Lesotho</option>
                <option value="afrique-shengen">Lettonie</option>
                <option value="afrique-shengen">Lituanie</option>
                <option value="afrique-shengen">Luxembourg</option>
                <option value="afrique-shengen">Madagascar</option>
                <option value="afrique-shengen">Malawi</option>
                <option value="monde">Malaisie</option>
                <option value="afrique-shengen">Mali</option>
                <option value="afrique-shengen">Malte</option>
                <option value="afrique-shengen">Maroc</option>
                <option value="afrique-shengen">Maurice</option>
                <option value="afrique-shengen">Mauritanie</option>
                <option value="monde">Mexique</option>
                <option value="monde">Mongolie</option>
                <option value="afrique-shengen">Mozambique</option>
                <option value="afrique-shengen">Namibie</option>
                <option value="afrique-shengen">Niger</option>
                <option value="afrique-shengen">Nigéria</option>
                <option value="afrique-shengen">Norvège</option>
                <option value="monde">Nouvelle-Zélande</option>
                <option value="afrique-shengen">Ouganda</option>
                <option value="monde">Pakistan</option>
                <option value="afrique-shengen">Pays-Bas</option>
                <option value="monde">Pérou</option>
                <option value="monde">Philippines</option>
                <option value="afrique-shengen">Portugal</option>
                <option value="monde">Qatar</option>
                <option value="monde">Russie</option>
                <option value="afrique-shengen">Rwanda</option>
                <option value="afrique-shengen">Sénégal</option>
                <option value="monde">Serbie</option>
                <option value="afrique-shengen">Seychelles</option>
                <option value="afrique-shengen">Sierra Leone</option>
                <option value="monde">Singapour</option>
                <option value="afrique-shengen">Slovaquie</option>
                <option value="afrique-shengen">Slovénie</option>
                <option value="afrique-shengen">Somalie</option>
                <option value="afrique-shengen">Soudan</option>
                <option value="monde">Sri Lanka</option>
                <option value="afrique-shengen">Suède</option>
                <option value="afrique-shengen">Suisse</option>
                <option value="afrique-shengen">Tanzanie</option>
                <option value="monde">Thaïlande</option>
                <option value="afrique-shengen">Togo</option>
                <option value="afrique-shengen">Tunisie</option>
                <option value="monde">Turquie</option>
                <option value="monde">Ukraine</option>
                <option value="monde">Uruguay</option>
                <option value="monde">Venezuela</option>
                <option value="monde">Vietnam</option>
                <option value="afrique-shengen">Zambie</option>
                <option value="afrique-shengen">Zimbabwe</option>

            </select>
            @error('destination')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nombre de voyageurs et dates -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="voyageurs" class="block text-sm font-medium text-gray-700">Nombre de voyageur(s)</label>
                <input type="number" min="1" wire:model.lazy="voyageurs" id="voyageurs"
                    class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required />
                @error('voyageurs')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="depart" class="block text-sm font-medium text-gray-700">Date départ</label>
                <input type="date" wire:model.live="depart" id="depart"
                    class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required />
                @error('depart')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="retour" class="block text-sm font-medium text-gray-700">Date retour</label>
                <input type="date" wire:model.live="retour" id="retour"
                    class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required />
                @error('retour')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Durée et tarif -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Durée du voyage</label>
                <div class="mt-2 p-3 bg-gray-100 rounded-md text-gray-700">
                    <span>{{ $nombreJours }} jours</span>
                </div>
            </div>

            <div>
                <label for="montant" class="block text-sm font-medium text-gray-700">Tarif d'assurances</label>
                <div class="mt-2 p-3 bg-gray-100 rounded-md text-gray-700">
                    <span>{{ number_format($montant, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="inline-flex items-center px-5 py-3 bg-blue-600 text-white font-bold text-sm uppercase tracking-widest rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                Souscrire
            </button>
            <button type="button" wire:click="resetForm"
                class="ml-4 inline-flex items-center px-5 py-3 bg-gray-300 text-gray-700 font-bold text-sm uppercase tracking-widest rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition duration-150 ease-in-out">
                Réinitialiser
            </button>
        </div>
    </form>
</div>
