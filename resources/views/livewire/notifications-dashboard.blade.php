<div class="max-h-80 overflow-y-auto">
    @if($notifications->isNotEmpty())
        <ul class="space-y-4">
            @foreach($notifications as $notification)
                <li class="text-sm border-b">
                    <h2 class="font-bold text-[#B23B3B]">{{ $notification->title }}</h2>
                    <p class="text-gray-700">{{ $notification->message }}</p>
                    <span class="text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-800">No hay notificaciones disponibles.</p>
    @endif
</div>
    

