<div class="flex w-full bg-[#11163D]">
    <x-aside />
    <div class="w-[85%] p-2 border-l border-gray-200 overflow-hidden">
        <div class="h-[86.5vh] w-full rounded-lg border content-scroll"> {{-- content-scroll --}}
            {{ $slot }}
        </div>
    </div>
</div>


