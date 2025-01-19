<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des rendez-vous') }}
        </h2>
    </x-slot>

    <div class="px-[5%] my-10">
        @livewire('list-rdv')
    </div>
</x-app-layout>
