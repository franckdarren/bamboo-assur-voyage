<div class="grid grid-cols-1 md:grid-cols-3 gap-5 justify-center" wire:poll.5s>
    <div
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $souscription_jour }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Souscriptions du jour</p>
    </div>
    <div
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $souscription_attentes }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Souscriptions en attente</p>
    </div>
    <div
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $souscription_totales }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Total des souscriptions</p>
    </div>
</div>