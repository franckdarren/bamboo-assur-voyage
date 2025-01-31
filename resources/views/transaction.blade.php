<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des transactions') }}
        </h2>
    </x-slot>

    <div class="px-[5%] my-10">
        @livewire('list-transactions')
    </div>
</x-app-layout>
