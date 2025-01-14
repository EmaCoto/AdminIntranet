<div>
    <div>
        <!-- Botón para abrir el modal -->
        <button wire:click="$toggle('open')" class="relative">
            <i class="fa-solid fa-bell text-[#B23B3B]"></i>
            @if($hasUnread)
                <span class="absolute top-0 right-0 w-2 h-2 bg-blue-500 rounded-full"></span>
            @endif
        </button>
    
        <!-- Modal de notificaciones -->
        <x-dialog-modal maxWidth="3xl" wire:model='open'>
            <x-slot name='title'>
                <h1 class="bg-[#B23B3B] w-[30%] text-white text-xl p-2 rounded-l-lg rounded-r-full uppercase">Notificaciones</h1>
            </x-slot>
            <x-slot name='content'>
                @if($notifications->isNotEmpty())
                    <ul class="space-y-4">
                        @foreach($notifications as $notification)
                            <li class="p-4 bg-gray-100 rounded-md shadow-md">
                                <h2 class="font-bold text-lg">{{ $notification->title }}</h2>
                                <p class="text-gray-600">{{ $notification->message }}</p>
                                <span class="text-sm text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No hay notificaciones disponibles.</p>
                @endif
            </x-slot>
            <x-slot name='footer'>
                <div wire:loading class="px-8 mx-8 py-2.5">
                    <i class="fa-solid fa-spinner animate-spin"></i>
                </div>
                <!-- botón cerrar modal -->
                <x-close />
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
