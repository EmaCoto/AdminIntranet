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
                <div class="w-full">
                    <img src="{{ asset('img/photo.jpg') }}" alt="" class="w-40 h-40 rounded-full shadow-lg shadow-blue-900 mx-auto">
                </div>

                <!-- Separador -->
                <h1 class="mt-7 text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D]">Datos</span></h1>
                <hr class="border-t-2 border-gray-400 w-[70%] mx-auto">

                <div class="grid grid-cols-2 py-2 justify-items-start text-left w-[70%] mx-auto gap-x-5 gap-y-2">
                    <div class="flex items-center w-full">
                        <p class="font-semibold uppercase">Nombre:</p>
                        <span class="ml-2 bg-gray-300 rounded-lg py-1 px-2 border-2 border-gray-400 w-full">{{ $user->display_name }}</span>
                    </div>
                    <div class="flex items-center w-full">
                        <p class="font-semibold uppercase">Email:</p>
                        <span class="ml-2 bg-gray-300 rounded-lg py-1 px-2 border-2 border-gray-400 w-full">{{ $user->user_email }}</span>
                    </div>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <button wire:click="$toggle('open')" class="bg-gray-700 rounded-lg px-6 py-2 text-white">Cerrar</button>
        </x-slot>
    </x-dialog-modal>
</div>
