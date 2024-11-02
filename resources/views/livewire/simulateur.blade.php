<div class="mt-10 max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-lg border border-gray-200">
    <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Simulation de Cotation</h2>
    <form wire:submit.prevent="submit" class="space-y-6">
        <!-- Destination -->
        <div>
            <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
            <select wire:model.live="destination" id="destination"
                class="mt-2 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option>Choisir une destination</option>
                <option value="afrique-schengen">Afrique - Schengen</option>
                <option value="monde">Monde entier</option>
            </select>
            @error('destination')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nombre de voyageurs et dates -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="voyageurs" class="block text-sm font-medium text-gray-700">Nombre de voyageur(s)</label>
                <input type="number" min="1" wire:model.live="voyageurs" id="voyageurs"
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
                    <span>{{ $montant }} FCFA</span>
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
