@props(['user'])

<div class="flex flex-col items-center justify-around w-[150px] h-40 p-1 bg-white rounded-md shadow-md">
    <!-- Imagen del usuario -->
    <div class="relative w-16 h-16 rounded-full">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=fff" alt="Foto de {{ $user->first_name }}" class="w-16 h-16 rounded-full">
        <!-- Bordes personalizados -->
        <div class="absolute inset-0 rounded-full border-[6px] border-transparent border-l-[#2973B2] border-t-[#2973B2] border-b-[#2973B2] border-r-white pointer-events-none"></div>
    </div>
    <!-- Información del usuario -->
    <div class="w-full text-center">
        <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }}</p>
        <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->last_name }}</p>
    </div>
    {{-- <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize rounded-md">{{ $user->job_title }}</p> --}}
</div>