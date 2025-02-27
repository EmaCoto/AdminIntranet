<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="text-white leading-tight px-64 flex p-5">
                <span class="mr-1">Bienvenido:</span>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
            </div>

            <x-limpiar-cache />
        </div>
    </x-slot>

    <div class="flex">
        <x-aside />

        <div class="overflow-hidden p-8 mx-auto">
            <div class="w-full min-h-screen relative rounded-lg">
                <img src="{{ asset('img/proximamente.png') }}" alt="" class="bg-cover bg-center w-full h-[100vh] rounded-lg shadow-md">
            </div>
        </div>
    </div>
</x-app-layout>