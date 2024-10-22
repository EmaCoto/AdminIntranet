<div>
    <button wire:click="$toggle('open')" class="bg-gray-100 p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <x-dialog-modal maxWidth="5xl" wire:model='open'>
        <x-slot name='title'>
            <h1 class="bg-[#088395] text-white text-2xl p-2 pl-6">Editar Compañero</h1>
        </x-slot>
        <x-slot name='content'>
            <form class="text-black">
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
            </form>
            <form class="mx-auto grid grid-cols-2 w-[70%] gap-x-5 gap-y-2 py-2">
                <div class="flex flex-col items-center w-full">
                    <!-- Campo de nombre con el estilo actualizado -->
                    <div class="w-full">
                        <label class="text-base font-semibold uppercase">Nombre</label>
                        <x-input wire:model='user_login' type="text" class="w-full bg-gray-300 rounded-lg py-1 px-2 border-2 border-gray-400 focus:border-[#11163D] focus:ring-[#11163D]"/>
                    </div>
                </div>
                <div class="flex flex-col items-center w-full">
                    <!-- Campo de email con el estilo actualizado -->
                    <div class="w-full">
                        <label class="text-base font-semibold uppercase">Email</label>
                        <textarea wire:model='user_email' name="description" id="contentEval" class="bg-gray-300 rounded-lg py-1 px-2 border-2 border-gray-400 w-full h-48 resize-none overflow-hidden focus:border-[#11163D] focus:ring-[#11163D]"></textarea>
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name='footer'>
            <button wire:click='update' class="bg-[#088395] rounded-lg px-6 py-1 text-white text-lg mx-2">Editar</button>
            <button wire:click='$toggle("open")' class="bg-gray-700 rounded-lg px-6 py-1 text-white text-lg mx-2">Cerrar</button>
        </x-slot>
    </x-dialog-modal>
</div>
