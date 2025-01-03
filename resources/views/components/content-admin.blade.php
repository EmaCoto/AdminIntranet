<div class="flex w-full bg-[#11163D]">
    <x-aside />
    <div class="w-[85%] p-2 border-l border-gray-200">
        <x-search-admin />
        

        <div class="overflow-hidden h-[75.5vh] rounded-lg border border-gray-200">
            <div class="overflow-y-auto h-full content-scroll">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>


