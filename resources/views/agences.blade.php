<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des agences') }}
        </h2>
    </x-slot>

    <div class="px-[5%] my-10">
        @livewire('list-agence')
    </div>
</x-app-layout>
