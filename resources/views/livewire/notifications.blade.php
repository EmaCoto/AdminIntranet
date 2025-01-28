<div class="relative">
    <!-- Botón de la campanita -->
    <button wire:click="$toggle('open')" class="relative focus:outline-none">
        <i class="fa-regular fa-bell text-gray-500 text-xl"></i>
        @if($hasUnread)
            <span class="absolute animate-ping top-0 right-0 w-2 h-2 bg-[#B23B3B] rounded-full"></span>
            <span class="absolute top-0 right-0 w-2 h-2 bg-[#B23B3B] rounded-full"></span>
        @endif
    </button>

    <!-- Dropdown de notificaciones -->
    <div x-data="{ open: @entangle('open') }" x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-72 bg-white border rounded-lg shadow-lg z-50" x-cloak>
        <div class="p-2 font-bold bg-[#fafbfd] border-b text-sm h-10 items-center text-gray-400">Notificaciones</div>
        <div class="p-4 max-h-80 overflow-y-auto">
            @if($notifications->isNotEmpty())
                <ul class="space-y-4">
                    @foreach($notifications as $notification)
                        <li class="text-sm border-b">
                            <h2 class="font-bold text-[#B23B3B]">{{ $notification->title }}</h2>
                            <p class="text-gray-600">{{ $notification->message }}</p>
                            <span class="text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay notificaciones disponibles.</p>
            @endif
        </div>
        <div class="p-2 text-right border-t bg-[#fafbfd]">
            <button @click="open = false" class="text-sm text-[#152B59]">Cerrar</button>
        </div>
    </div>
</div>
