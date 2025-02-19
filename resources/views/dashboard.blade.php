<x-app-layout>
    <x-slot name="header">
        <div class=" text-white leading-tight px-56 flex">
            <span class="mr-1">Bienvenido:</span>
            <p class="font-semibold">{{ Auth::user()->name }}</p>
        </div>
    </x-slot>

    <div class="flex">
        <div class="w-[300px]">
            <x-aside />
        </div>
        <div class="overflow-hidden p-8">
            <livewire:admin.user.grafico />
        </div>
    </div>
</x-app-layout>
