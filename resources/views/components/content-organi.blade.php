<div class="flex w-full bg-[#fafbfd]">
    <x-aside-organi />
    <div class="w-[85%] p-2 border-l border overflow-hidden">
        <div class="h-[86.5vh] w-full rounded-lg border content-scroll "> {{-- overflow-y-scroll --}}
            {{ $slot }}
        </div>
    </div>
</div>