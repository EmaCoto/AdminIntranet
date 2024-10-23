<div>
    <button wire:click="$toggle('open')" class="bg-gray-100 p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-eye"></i>
    </button>
    <x-dialog-modal maxWidth="5xl" wire:model="open">
        <x-slot name="title">
            <h1 class="bg-[#11163D] w-[40%] text-white text-xl p-2 rounded-l-lg rounded-r-full uppercase">Información del usuario</h1>
        </x-slot>

        <x-slot name="content">
            <div class="text-black">
                <div class="card mx-auto">
                    <div class="bg"><img src="{{ asset('img/photo.jpg') }}" alt="" class="mx-auto"></div>
                    <div class="blob"></div>
                </div>
                <div class="w-full">

                </div>

                <!-- Separador -->
                <h1 class="mt-7 text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D]">Datos</span></h1>
                <hr class="border-t-2 border-gray-400 w-[70%] mx-auto">

                <div class="grid grid-cols-2 py-2 justify-items-start text-left w-[70%] mx-auto gap-x-5 gap-y-2">
                    <div class="flex items-center w-full">
                        <p class="font-semibold uppercase">Nombre:</p>
                        <span class="ml-2 bg-gray-300 rounded-lg py-1 px-2 border-2 border-gray-400 w-full">{{ $user->profileData->where('field_id', 1)->first()?->value }}</span>
                    </div>
                    <div class="flex items-center w-full">
                        <p class="font-semibold uppercase">Apellidos:</p>
                        <span class="ml-2 bg-gray-300 rounded-lg py-1 px-2 border-2 border-gray-400 w-full">{{ $user->profileData->where('field_id', 2)->first()?->value }}</span>
                    </div>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <button wire:click="$toggle('open')" class="relative inline-flex items-center justify-center px-8 py-2.5 overflow-hidden tracking-tighter text-white bg-[#11163D] rounded-md group">
            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-[#B33031] rounded-full group-hover:w-56 group-hover:h-56"></span>
            <span class="absolute bottom-0 left-0 h-full -ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-full opacity-100 object-stretch" viewBox="0 0 487 487">
                <path fill-opacity=".1" fill-rule="nonzero" fill="#FFF" d="M0 .3c67 2.1 134.1 4.3 186.3 37 52.2 32.7 89.6 95.8 112.8 150.6 23.2 54.8 32.3 101.4 61.2 149.9 28.9 48.4 77.7 98.8 126.4 149.2H0V.3z"></path>
                </svg>
            </span>
            <span class="absolute top-0 right-0 w-12 h-full -mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="object-cover w-full h-full" viewBox="0 0 487 487">
                <path fill-opacity=".1" fill-rule="nonzero" fill="#FFF" d="M487 486.7c-66.1-3.6-132.3-7.3-186.3-37s-95.9-85.3-126.2-137.2c-30.4-51.8-49.3-99.9-76.5-151.4C70.9 109.6 35.6 54.8.3 0H487v486.7z"></path>
                </svg>
            </span>
            <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-gray-200"></span>
            <span class="relative text-base font-semibold">Cerrar</span>
            </button>
        </x-slot>
    </x-dialog-modal>
</div>
