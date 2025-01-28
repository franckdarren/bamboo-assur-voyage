<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Test Loader</title>
</head>

<body class="h-screen bg-gray-100">
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <!-- Spinner -->
        <div class="relative">
            <!-- Bouton Payer en ligne -->
            <button type="button"
                class="px-6 py-3 text-white bg-[#313436] hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-semibold text-lg rounded-lg shadow-lg transform transition-transform hover:scale-105 active:scale-95"
                wire:click="createSouscriptionWithPaiement" wire:loading.attr="disabled">
                Payer en Ligne
            </button>

            <!-- Afficher le spinner lorsque l'action est en cours (après avoir cliqué sur le bouton) -->
            <div wire:loading class="absolute inset-0 bg-black bg-opacity-50 flex z-10">
                <!-- Spinner (apparaît en remplacement du bouton) -->
                <div class="mx-auto">
                    <svg class="animate-spin h-12 w-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8h8a8 8 0 11-8-8z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
