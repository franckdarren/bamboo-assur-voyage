<div class="mt-8 md:mt-10 max-w-xl lg:w-[36rem] mx-auto p-8 bg-white shadow-lg rounded-lg border border-gray-200">
    <!-- Afficher un message de succès -->
    <div>
        @if (session('success'))
            <div class="flex items-center justify-between p-4 mx-auto mb-4 space-x-4 text-white bg-green-500 rounded-md shadow-md md:fixed md:top-5 md:right-5"
                x-data="{ open: true }" x-init="setTimeout(() => open = false, 10000)" x-show="open" x-transition>
                <span>{{ session('success') }}</span>
                <button class="text-white hover:text-gray-200 focus:outline-none" @click="open = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center justify-between p-4 mx-auto mb-4 space-x-4 text-white bg-red-500 rounded-md shadow-md md:fixed md:top-5 md:right-5"
                x-data="{ open: true }" x-init="setTimeout(() => open = false, 10000)" x-show="open" x-transition>
                <span>{{ session('error') }}</span>
                <button class="text-white hover:text-gray-200 focus:outline-none" @click="open = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

    </div>
    <div>
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
        <form wire:submit.prevent="createSouscription" class="space-y-6">
            @if ($currentStep == 1)
                <!-- Destination -->
                <div>
                    <label for="destination" class="block text-sm font-medium text-black">Destination</label>
                    <select wire:model.live="destination" id="destination"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#4996D1] focus:border-[#4996D1] text-black">
                        <option>Sélectionnez une destination</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Afrique du Sud">Afrique du Sud</option>
                        <option value="Albanie">Albanie</option>
                        <option value="Algérie">Algérie</option>
                        <option value="Allemagne">Allemagne</option>
                        <option value="Angola">Angola</option>
                        <option value="Arabie Saoudite">Arabie Saoudite</option>
                        <option value="Argentine">Argentine</option>
                        <option value="Arménie">Arménie</option>
                        <option value="Australie">Australie</option>
                        <option value="Autriche">Autriche</option>
                        <option value="Azerbaïdjan">Azerbaïdjan</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Bénin">Bénin</option>
                        <option value="Biélorussie">Biélorussie</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brésil">Brésil</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cameroun">Cameroun</option>
                        <option value="Canada">Canada</option>
                        <option value="Cap-Vert">Cap-Vert</option>
                        <option value="Chili">Chili</option>
                        <option value="Chine">Chine</option>
                        <option value="Colombie">Colombie</option>
                        <option value="Corée du Sud">Corée du Sud</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="République Centrafricaine">République Centrafricaine</option>
                        <option value="Tchad">Tchad</option>
                        <option value="Comores">Comores</option>
                        <option value="Congo">Congo</option>
                        <option value="République Démocratique du Congo">République Démocratique du Congo</option>
                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Danemark">Danemark</option>
                        <option value="Égypte">Égypte</option>
                        <option value="Émirats Arabes Unis">Émirats Arabes Unis</option>
                        <option value="Érythrée">Érythrée</option>
                        <option value="Espagne">Espagne</option>
                        <option value="Estonie">Estonie</option>
                        <option value="Eswatini">Eswatini</option>
                        <option value="États-Unis">États-Unis</option>
                        <option value="Éthiopie">Éthiopie</option>
                        <option value="Finlande">Finlande</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambie">Gambie</option>
                        <option value="Géorgie">Géorgie</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Grèce">Grèce</option>
                        <option value="Guinée">Guinée</option>
                        <option value="Guinée-Bissau">Guinée-Bissau</option>
                        <option value="Guinée Equatoriale">Guinée Equatoriale</option>
                        <option value="Hongrie">Hongrie</option>
                        <option value="Inde">Inde</option>
                        <option value="Indonésie">Indonésie</option>
                        <option value="Iran">Iran</option>
                        <option value="Irak">Irak</option>
                        <option value="Islande">Islande</option>
                        <option value="Israël">Israël</option>
                        <option value="Italie">Italie</option>
                        <option value="Japon">Japon</option>
                        <option value="Jordanie">Jordanie</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kirghizistan">Kirghizistan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Liban">Liban</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Lettonie">Lettonie</option>
                        <option value="Lituanie">Lituanie</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaisie">Malaisie</option>
                        <option value="Mali">Mali</option>
                        <option value="Malte">Malte</option>
                        <option value="Maroc">Maroc</option>
                        <option value="Maurice">Maurice</option>
                        <option value="Mauritanie">Mauritanie</option>
                        <option value="Mexique">Mexique</option>
                        <option value="Mongolie">Mongolie</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Namibie">Namibie</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigéria">Nigéria</option>
                        <option value="Norvège">Norvège</option>
                        <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
                        <option value="Ouganda">Ouganda</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Pays-Bas">Pays-Bas</option>
                        <option value="Pérou">Pérou</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Russie">Russie</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Sénégal">Sénégal</option>
                        <option value="Serbie">Serbie</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapour">Singapour</option>
                        <option value="Slovaquie">Slovaquie</option>
                        <option value="Slovénie">Slovénie</option>
                        <option value="Somalie">Somalie</option>
                        <option value="Soudan">Soudan</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Suède">Suède</option>
                        <option value="Suisse">Suisse</option>
                        <option value="Tanzanie">Tanzanie</option>
                        <option value="Thaïlande">Thaïlande</option>
                        <option value="Togo">Togo</option>
                        <option value="Tunisie">Tunisie</option>
                        <option value="Turquie">Turquie</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Zambie">Zambie</option>
                        <option value="Zimbabwe">Zimbabwe</option>

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
                            class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                            required />
                        @error('voyageurs')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Départ -->
                    <div>
                        <label for="depart" class="block text-sm font-medium text-black">Date départ</label>
                        <input type="date" wire:model.live="depart" id="depart"
                            class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                            required />
                        @error('depart')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Retour -->
                    <div>
                        <label for="retour" class="block text-sm font-medium text-black">Date retour</label>
                        <input type="date" wire:model.live="retour" id="retour"
                            class="mt-2 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
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
                        <label for="montant" class="block text-sm font-medium text-black">Tarif d'assurance</label>
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
                        class="px-5 py-3 text-white bg-[#4996d1] hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95">
                        Suivant
                    </button>

                </div>
            @endif

            <!-- Étape 2: Nombre de voyageurs et dates -->
            @if ($currentStep == 2)
                <!-- Informations du souscripteur -->
                <h3 class="text-lg font-semibold text-black mb-4">Informations du souscripteur</h3>

                <!-- Nom et prénom -->
                <div class="col-span-1 md:col-span-2 mb-4">
                    <label for="nom_prenom_souscripteur" class="block text-sm font-medium text-black">Nom(s)
                        et prénom(s)</label>
                    <input type="text" wire:model.live="nom_prenom_souscripteur" id="nom_prenom_souscripteur"
                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                        required />
                    @error('nom_prenom_souscripteur')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Adresse -->
                <div class="mb-4">
                    <label for="adresse_souscripteur" class="block text-sm font-medium text-black">Adresse</label>
                    <input type="text" wire:model.live="adresse_souscripteur" id="adresse_souscripteur"
                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                        required />
                    @error('adresse_souscripteur')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Téléphone -->
                <div class="mb-4">
                    <label for="phone_souscripteur" class="block text-sm font-medium text-black">Téléphone</label>
                    <input type="text" wire:model.live="phone_souscripteur" id="phone_souscripteur"
                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                        required />
                    @error('phone_souscripteur')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-span-1 md:col-span-2 mb-4">
                    <label for="email_souscripteur" class="block text-sm font-medium text-black">Email</label>
                    <input type="email" wire:model.live="email_souscripteur" id="email_souscripteur"
                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                        required />
                    @error('email_souscripteur')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <!-- Étape 2 : Informations de l'assuré -->
                    @foreach ($liste_voyageurs as $index => $voyageur)
                        <div class="mt-6">
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
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
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
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                                        required />
                                    @error('liste_voyageurs.' . $index . '.date_naissance_assure')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Adresse -->
                                <div class="mb-4">
                                    <label for="adresse_assure_{{ $index }}"
                                        class="block text-sm font-medium text-black">Adresse</label>
                                    <input type="text"
                                        wire:model="liste_voyageurs.{{ $index }}.adresse_assure"
                                        id="adresse_assure_{{ $index }}"
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                                        required />
                                    @error('liste_voyageurs.' . $index . '.adresse_assure')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="mb-4">
                                    <label for="phone_assure_{{ $index }}"
                                        class="block text-sm font-medium text-black">Téléphone</label>
                                    <input type="text"
                                        wire:model="liste_voyageurs.{{ $index }}.phone_assure"
                                        id="phone_assure_{{ $index }}"
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
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
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                                        required />
                                    @error('liste_voyageurs.' . $index . '.passeport_assure')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Url Passeport -->
                                <div class="mb-4">
                                    <label for="url_passeport_assure_{{ $index }}"
                                        class="block text-sm font-medium text-black">Image du Passeport</label>
                                    <input type="file"
                                        wire:model="liste_voyageurs.{{ $index }}.url_passeport_assure_"
                                        id="url_passeport_assure_{{ $index }}"
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                                        required />
                                    @error('liste_voyageurs.' . $index . '.url_passeport_assure_')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-span-1 md:col-span-2 mb-4">
                                    <label for="email_assure_{{ $index }}"
                                        class="block text-sm font-medium text-black">Email</label>
                                    <input type="email"
                                        wire:model="liste_voyageurs.{{ $index }}.email_assure"
                                        id="email_assure_{{ $index }}"
                                        class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
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
                        class="px-5 py-3 text-white bg-[#4996d1] hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95">
                        Suivant
                    </button>
                </div>
            @endif

            <!-- Étape 3: Prise de rendez-vous -->
            @if ($currentStep == 3)
                <!-- Informations de prise de rendez-vous -->
                <div class="">
                    {{-- <h3 class="text-lg font-semibold text-black mb-4">Informations du rendez-vous</h3> --}}
                    <div class="flex justify-center gap-4 mt-6">
                        <!-- Bouton Payer en agence -->
                        <button type="button"
                            class="px-5 py-3 text-white bg-[#4996d1] hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95"
                            wire:click="nextStep">
                            Payer en Agence
                        </button>

                        <!-- Bouton Payer en ligne -->
                        {{-- <button type="button"
                            class="px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95"
                            wire:click="createSouscriptionWithPaiement">
                            Payer en Ligne
                        </button> --}}
                    </div>
                </div>

                <!-- Bouton de soumission -->
                <div class="flex justify-center mt-6 gap-2">
                    <button type="button" wire:click="previousStep"
                        class="px-5 py-3 bg-gray-300 text-black font-bold rounded-md hover:scale-105 active:scale-95">
                        Précédent
                    </button>
                    {{-- <button type="button" wire:click="nextStep"
                        class="px-5 py-3 bg-[#4996d1] text-white font-bold rounded-md">
                        Suivant
                    </button> --}}
                </div>
            @endif

            <!-- Étape 4: Prise de rendez-vous -->
            @if ($currentStep == 4)
                <!-- Informations de prise de rendez-vous -->
                <div class="p-6 bg-white rounded-lg">
                    <h3 class="text-lg font-semibold text-black mb-4">Informations du rendez-vous</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Agence -->
                        <div class="col-span-1 md:col-span-2 mb-4">
                            <label for="agence" class="block text-sm font-medium text-black">Sélectionnez
                                l'agence</label>
                            <select wire:model.live="agence" id="agence"
                                class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
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
                                class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
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
                                class="mt-1 block w-full p-3 shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-[#4996D1] focus:border-[#4996D1] text-black"
                                required min="08:00" max="16:00" />
                            <p class="text-xs text-gray-600 mt-1">L'agence est ouverte de 8h à 16h.</p>
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
                        class="px-5 py-3 text-white bg-[#4996d1] hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95">
                        Souscrire
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>
