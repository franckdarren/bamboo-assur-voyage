<div class="mt-10 md:mt-20 max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-lg border border-gray-200">
    <h2 class="text-2xl font-semibold text-black text-center mb-6">
        @if ($currentStep == 1)
            Simulation de Cotation
        @elseif ($currentStep == 2)
            Souscription
        @elseif ($currentStep == 3)
            Choisir un moyen de paiement
        @elseif ($currentStep == 4)
            Prendre un Rendez-vous
        @endif
    </h2>
    <!-- Afficher un message de succès -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="createSouscription" class="space-y-6">
        @if ($currentStep == 1)
            <!-- Destination -->
            <div>
                <label for="destination" class="block text-sm font-medium text-black">Destination</label>
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
                    <label for="voyageurs" class="block text-sm font-medium text-black">Nombre de
                        voyageur(s)</label>
                    <input type="number" min="1" wire:model.lazy="voyageurs" id="voyageurs"
                        class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required />
                    @error('voyageurs')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="depart" class="block text-sm font-medium text-black">Date départ</label>
                    <input type="date" wire:model.live="depart" id="depart"
                        class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required />
                    @error('depart')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="retour" class="block text-sm font-medium text-black">Date retour</label>
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
                    <label class="block text-sm font-medium text-black">Durée du voyage</label>
                    <div class="mt-2 p-3 bg-gray-100 rounded-md text-black">
                        <span>{{ $nombreJours }} jours</span>
                    </div>
                </div>

                <div>
                    <label for="montant" class="block text-sm font-medium text-black">Tarif d'assurances</label>
                    <div class="mt-2 p-3 bg-gray-100 rounded-md text-black">
                        <span>{{ number_format($montant, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" wire:click="resetForm"
                    class="ml-4 inline-flex items-center px-5 py-3 bg-gray-300 text-black font-bold text-sm uppercase tracking-widest rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition duration-150 ease-in-out hover:scale-105 active:scale-95">
                    Réinitialiser
                </button>
                <button type="button" wire:click="nextStep"
                    class="px-5 py-3 bg-blue-600 text-white font-bold rounded-md hover:scale-105 active:scale-95">
                    Suivant
                </button>

            </div>
        @endif

        <!-- Étape 2: Nombre de voyageurs et dates -->
        @if ($currentStep == 2)
            <!-- Informations du souscripteur -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-black mb-4">Informations du souscripteur</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nom et prénom -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <label for="nom_prenom_souscripteur" class="block text-sm font-medium text-black">Nom(s)
                            et prénom(s)</label>
                        <input type="text" wire:model.live="nom_prenom_souscripteur" id="nom_prenom_souscripteur"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required />
                        @error('nom_prenom_souscripteur')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Adresse -->
                    <div class="mb-4">
                        <label for="adresse_souscripteur" class="block text-sm font-medium text-black">Adresse</label>
                        <input type="text" wire:model.live="adresse_souscripteur" id="adresse_souscripteur"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required />
                        @error('adresse_souscripteur')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-4">
                        <label for="phone_souscripteur" class="block text-sm font-medium text-black">Téléphone</label>
                        <input type="text" wire:model.live="phone_souscripteur" id="phone_souscripteur"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required />
                        @error('phone_souscripteur')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <label for="email_souscripteur" class="block text-sm font-medium text-black">Email</label>
                        <input type="email" wire:model.live="email_souscripteur" id="email_souscripteur"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required />
                        @error('email_souscripteur')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <!-- Étape 2 : Informations de l'assuré -->
                @foreach ($liste_voyageurs as $index => $voyageur)
                    <div class="p-6 bg-white rounded-lg shadow-md mt-6">
                        <h3 class="text-lg font-semibold text-black mb-4">Informations de l'assuré
                            #{{ $index + 1 }}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nom et prénom -->
                            <div class="col-span-1 md:col-span-2 mb-4">
                                <label for="nom_prenom_assure_{{ $index }}"
                                    class="block text-sm font-medium text-black">Nom(s)
                                    et prénom(s)</label>
                                <input type="text"
                                    wire:model="liste_voyageurs.{{ $index }}.nom_prenom_assure"
                                    id="nom_prenom_assure_{{ $index }}"
                                    class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                                @error('liste_voyageurs.' . $index . '.nom_prenom_assure')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Date de naissance -->
                            <div class="mb-4">
                                <label for="date_naissance_assure_{{ $index }}"
                                    class="block text-sm font-medium text-black">Date de
                                    naissance</label>
                                <input type="date"
                                    wire:model="liste_voyageurs.{{ $index }}.date_naissance_assure"
                                    id="date_naissance_assure_{{ $index }}"
                                    class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                                @error('liste_voyageurs.' . $index . '.date_naissance_assure')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Adresse -->
                            <div class="mb-4">
                                <label for="adresse_assure_{{ $index }}"
                                    class="block text-sm font-medium text-black">Adresse</label>
                                <input type="text" wire:model="liste_voyageurs.{{ $index }}.adresse_assure"
                                    id="adresse_assure_{{ $index }}"
                                    class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                                @error('liste_voyageurs.' . $index . '.adresse_assure')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Téléphone -->
                            <div class="mb-4">
                                <label for="phone_assure_{{ $index }}"
                                    class="block text-sm font-medium text-black">Téléphone</label>
                                <input type="text" wire:model="liste_voyageurs.{{ $index }}.phone_assure"
                                    id="phone_assure_{{ $index }}"
                                    class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                                @error('liste_voyageurs.' . $index . '.phone_assure')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Passeport -->
                            <div class="mb-4">
                                <label for="passeport_assure_{{ $index }}"
                                    class="block text-sm font-medium text-black">Numéro de Passeport</label>
                                <input type="text"
                                    wire:model="liste_voyageurs.{{ $index }}.passeport_assure"
                                    id="passeport_assure_{{ $index }}"
                                    class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                                @error('liste_voyageurs.' . $index . '.passeport_assure')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-span-1 md:col-span-2 mb-4">
                                <label for="email_assure_{{ $index }}"
                                    class="block text-sm font-medium text-black">Email</label>
                                <input type="email" wire:model="liste_voyageurs.{{ $index }}.email_assure"
                                    id="email_assure_{{ $index }}"
                                    class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    required />
                                @error('liste_voyageurs.' . $index . '.email_assure')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Bouton de soumission -->
            <div class="flex justify-center mt-6 gap-2">
                <button type="button" wire:click="previousStep"
                    class="px-5 py-3 bg-gray-300 text-black font-bold rounded-md hover:scale-105 active:scale-95">
                    Précédent
                </button>
                <button type="button" wire:click="nextStep"
                    class="px-5 py-3 bg-blue-600 text-white font-bold rounded-md hover:scale-105 active:scale-95">
                    Suivant
                </button>
            </div>
        @endif

        <!-- Étape 3: Prise de rendez-vous -->
        @if ($currentStep == 3)
            <!-- Informations de prise de rendez-vous -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                {{-- <h3 class="text-lg font-semibold text-black mb-4">Informations du rendez-vous</h3> --}}
                <div class="flex justify-center gap-4 mt-6">
                    <!-- Bouton Payer en ligne -->
                    <button type="button"
                        class="px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95"
                        wire:click="nextStep">
                        Payer en Agence
                    </button>

                    <!-- Bouton Payer en Agence -->
                    <button type="button"
                        class="px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95"
                        wire:click="createSouscriptionWithPaiement">
                        Payer en Ligne
                    </button>
                </div>

            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-center mt-6 gap-2">
                <button type="button" wire:click="previousStep"
                    class="px-5 py-3 bg-gray-300 text-black font-bold rounded-md hover:scale-105 active:scale-95">
                    Précédent
                </button>
                {{-- <button type="button" wire:click="nextStep"
                    class="px-5 py-3 bg-blue-600 text-white font-bold rounded-md">
                    Suivant
                </button> --}}
            </div>
        @endif

        <!-- Étape 4: Prise de rendez-vous -->
        @if ($currentStep == 4)
            <!-- Informations de prise de rendez-vous -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-black mb-4">Informations du rendez-vous</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Agence -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <label for="agence" class="block text-sm font-medium text-black">Sélectionnez
                            l'agence</label>
                        <select wire:model.live="agence" id="agence"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Choisir une agence</option>
                            <option value="agence_1">Agence 1</option>
                            <option value="agence_2">Agence 2</option>
                            <option value="agence_3">Agence 3</option>
                            <!-- Ajoutez ici les autres agences -->
                        </select>
                        @error('agence')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date du rendez-vous -->
                    <div class="mb-4">
                        <label for="date_rdv" class="block text-sm font-medium text-black">Sélectionnez
                            la date</label>
                        <input type="date" wire:model.live="date_rdv" id="date_rdv"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required />
                        @error('date_rdv')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Heure du rendez-vous -->
                    <div class="mb-4">
                        <label for="heure_rdv" class="block text-sm font-medium text-black">Sélectionnez
                            l'heure</label>
                        <input type="time" wire:model.live="heure_rdv" id="heure_rdv"
                            class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required min="08:00" max="16:00" />
                        <p class="text-xs text-gray-500 mt-1">L'agence est ouverte de 8h à 16h.</p>
                        @error('heure_rdv')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-center mt-6 gap-2">
                <button type="button" wire:click="previousStep"
                    class="px-5 py-3 bg-gray-300 text-black font-bold rounded-md hover:scale-105 active:scale-95">
                    Précédent
                </button>
                <button type="submit"
                    class="inline-flex items-center px-5 py-3 bg-blue-600 text-white font-bold text-sm uppercase tracking-widest rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out hover:scale-105 active:scale-95">
                    Souscrire
                </button>
            </div>
        @endif
    </form>
</div>
