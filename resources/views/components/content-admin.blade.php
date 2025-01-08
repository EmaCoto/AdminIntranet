<div class="flex w-full bg-[#11163D]">
    <x-aside />
    <div class="w-[85%] p-2 border-l border-gray-200">
        <div class="flex justify-between items-center p-2">
            <div class="relative w-full md:w-1/2 flex">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fa-solid fa-magnifying-glass text-gray-500"></i>
                </div>
                <input type="text"  wire:model.lazy="search" class="pl-10 w-full focus:ring-[#11163D] focus:bg-white rounded-lg border h-10" placeholder="Buscar..." type="search">
                <button class="ml-4 items-center py-1 px-3 rounded-lg bg-[#B33031] text-white hover:bg-[#b23b3b]">Buscar</button>
            </div>
            {{-- @if (session()->has('userUpdate'))
                <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('userUpdate') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif --}}
        
            @if (session()->has('message'))
                <div class="text-green-500 bg-white p-2 rounded-l-lg flex border-r-2 border-green-500">
                    <i class="fa-solid fa-circle-info text-green-500 mr-4"></i>
                    {{ session('message') }}
                </div>
            @endif
        </div>
        

        <div class="overflow-hidden h-[70vh] rounded-lg border border-gray-200">
            <div class="overflow-y-auto h-full content-scroll">
                {{ $slot }}
            </div>
        </div>
        <div class="mt-4 w-full flex justify-end">
            <div wire:loading class="text-white">
                <p>procesando...</p>
            </div>
            <div wire:loading.remove>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>