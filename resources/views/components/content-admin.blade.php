<div class="flex w-full bg-[#fafbfd]">
    <x-aside />
    <div class="w-[80%] p-2 border-l border-gray-200">
        <div class="flex justify-between items-center p-2">
            <div class="w-full flex justify-between">
                <div class="relative md:w-1/2 flex">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                    </div>
                    <input type="text"  wire:model.change="search" class="pl-10 w-full focus:ring-[#11163D] focus:bg-white rounded-lg border h-10" placeholder="Buscar..." type="search">
                    <button class="ml-4 items-center py-1 px-3 rounded-lg bg-[#B33031] text-white hover:bg-[#b23b3b]">Buscar</button>
                </div>
                <div wire:loading>
                    <p>Cargando...</p>
                </div>
            </div>
        
            @if (session()->has('messageuser'))
                <div class="text-green-500 bg-white p-2 rounded-l-lg flex border-r-2 border-green-500">
                    <i class="fa-solid fa-circle-info text-green-500 mr-4"></i>
                    {{ session('messageuser') }}
                </div>
            @endif
        </div>
        

        <div class="overflow-hidden h-[57vh] rounded-lg border border-gray-200">
            <div class="overflow-y-auto h-full content-scroll">
                {{ $slot }}
            </div>
        </div>
        <div class="mt-2 w-full flex justify-end">
            <div wire:loading.remove>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>