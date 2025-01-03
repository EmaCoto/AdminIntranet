<div class="flex items-center p-2">
    <div class="relative w-full md:w-1/2">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
            <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
        </div>
        <input type="text" id="searchInput" class="pl-10 w-full focus:ring-[#11163D] focus:bg-white rounded-lg border h-10" placeholder="Buscar..." type="search">
    </div>

    @if (session()->has('message'))
        <div class="text-green-500 mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
