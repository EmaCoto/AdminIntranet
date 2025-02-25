<div class="flex w-full bg-[#fafbfd]">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="text-white leading-tight px-56 flex p-5">
                <span class="mr-1">Bienvenido:</span>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
            </div>

            <x-limpiar-cache />
        </div>
    </x-slot>
    <x-aside />
    <div class="w-[85%] p-2 border-l border-gray-200 overflow-hidden">
        <div class="h-[86vh] w-full rounded-lg border content-scroll"> {{-- content-scroll --}}
            {{ $slot }}
        </div>
    </div>
</div>