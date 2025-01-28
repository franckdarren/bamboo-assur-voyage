<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Paiement annulé - {{ config('app.name', 'Bamboo Assur Voyage') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl mx-auto">
                <div class="">
                    <header class="gap-2 pt-3 md:pt-6 flex justify-between items-center">
                        <a href="http:/">
                            <x-application-mark class="block w-auto h-9" />
                        </a>
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-white bg-[#4996d1] ring-1 ring-transparent transition hover:bg-blue-700">
                            Connexion
                        </a>
                    </header>
                </div>

                <div class="flex items-center justify-center mt-20">
                    <div class="bg-white shadow-lg rounded-2xl p-6 max-w-lg text-center">
                        <div class="flex justify-center items-center mb-4">
                            <div
                                class="bg-red-100 text-red-600 w-16 h-16 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1.293-6.707a1 1 0 011.414 0L14 13.586l4.293-4.293a1 1 0 111.414 1.414l-5 5a1 1 0 01-1.414 0L9 13.414l-2.293 2.293a1 1 0 11-1.414-1.414l3-3z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M9 11a1 1 0 112 0v2a1 1 0 01-2 0v-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-800">Erreur de paiement</h1>
                        <p class="text-gray-600 mt-2">Une erreur s'est produite lors du traitement de votre paiement.
                        </p>
                        <p class="text-gray-600 mt-1">Voulez-vous réessayer ?</p>

                        <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                            @if ($transaction->transaction_id != null)
                                <form action="{{ route('relancer.payement', ['id' => $transaction->transaction_id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-6 py-2 bg-[#4996d1] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                        Réessayer le paiement
                                    </button>
                                </form>
                            @endif

                            <a href="{{ url('/') }}"
                                class="px-6 py-2 bg-gray-100 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75">
                                Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
