<div class="relative">
    <button wire:click="$toggle('open')" class="relative">
        <i class="fa-solid fa-bell text-xl"></i>
        @if (count($notifications) > 0)
            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">
                {{ count($notifications) }}
            </span>
        @endif
    </button>

    @if ($open)
        <div class="absolute right-0 mt-2 bg-white border rounded shadow-lg w-72">
            <ul>
                @forelse ($notifications as $notification)
                    <li class="px-4 py-2 border-b hover:bg-gray-100">
                        <p class="text-sm">{{ $notification->message }}</p>
                        <button wire:click="markAsRead({{ $notification->id }})" class="text-xs text-blue-500 hover:underline">
                            Marcar como leído
                        </button>
                    </li>
                @empty
                    <li class="px-4 py-2 text-sm text-gray-500">No hay notificaciones nuevas.</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>
