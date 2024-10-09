<div>
    <button wire:click="$toggle('open')" class="bg-gray-100 p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <x-dialog-modal maxWidth="5xl" wire:model='open'>
        <x-slot name='title'>
            <h1 class="bg-[#088395] text-white text-2xl p-2 pl-6">Editar Compañero</h1>
        </x-slot>
        <x-slot name='content'>
            <form class="mx-auto grid grid-cols-2">
                <div class="flex flex-col items-center">
                    <div class="w-[80%]">
                        <label class="text-base font-bold uppercase">Nombre</label>
                        <x-input wire:model='name' type="text" class="w-full"/>
                    </div>
                    <div class="w-[80%] pt-4">
                        <label class="text-base font-bold uppercase">Email</label>
                        <textarea wire:model='email' name="description" id="contentEval" class="border-gray-300 focus:border-[#088395] focus:ring-[#088395] rounded-md shadow-sm w-full h-48 resize-none overflow-hidden"></textarea>
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
