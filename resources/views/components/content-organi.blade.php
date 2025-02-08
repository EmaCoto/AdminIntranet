<div class="flex w-full bg-[#fafbfd]">
    <x-slot name="header">
        <div class=" text-white leading-tight px-56 flex">
            <span class="mr-1">Bienvenido:</span>
            <p class="font-semibold">{{ Auth::user()->name }}</p>
        </div>
    </x-slot>
    <x-aside />
    <div class="w-[85%] p-2 border-l border overflow-hidden">
        <div class="h-[76.5vh] w-full rounded-lg border content-scroll "> {{-- overflow-y-scroll --}}
            {{ $slot }}
        </div>
    </div>
</div>