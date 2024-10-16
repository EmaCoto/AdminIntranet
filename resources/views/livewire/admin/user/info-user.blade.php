<div>
    <button wire:click="$toggle('open')" class="bg-gray-100 p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-eye"></i>
    </button>
    <x-dialog-modal maxWidth="5xl" wire:model="open">
        <x-slot name="title">
            <h1 class="bg-[#088395] w-full text-white text-2xl p-4">Información del usuario</h1>
        </x-slot>

        <x-slot name="content">
            <div>
                <span class="user-email font-bold text-xs block truncate">{{ $user->user_login }}</span>
                <span class="user-name font-bold text-sm block truncate">{{ $user->user_email }}</span>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="$toggle('open')" class="bg-gray-700 rounded-lg px-6 py-2 text-white">Cerrar</button>
        </x-slot>
    </x-dialog-modal>
</div>
