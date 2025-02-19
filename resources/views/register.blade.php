<x-app-layout>
    <x-slot name="header">
        <div class=" text-white leading-tight px-56 flex">
            <span class="mr-1">Bienvenido:</span>
            <p class="font-semibold">{{ Auth::user()->name }}</p>
        </div>
    </x-slot>

    <x-content class="overflow-hidden p-8 mx-auto">
        <x-view-register />
    </x-content>
</x-app-layout>