<div class="absolute -left-6 z-40">
    <div class="relative w-16 h-16 rounded-full overflow-hidden">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=fff" alt="Foto de {{ $user->first_name }}" class="w-16 h-16 rounded-full">
        <!-- Bordes personalizados -->
        <div class="absolute inset-0 rounded-full border-[6px] border-transparent border-l-[#2973B2] border-t-[#2973B2] border-b-[#2973B2] border-r-white pointer-events-none"></div>
    </div>
</div>
