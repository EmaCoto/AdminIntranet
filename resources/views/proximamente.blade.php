<x-app-layout>
    <x-slot name="header">
        <div class=" text-white leading-tight px-56 flex">
            <span class="mr-1">Bienvenido:</span>
            <p class="font-semibold">{{ Auth::user()->name }}</p>
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