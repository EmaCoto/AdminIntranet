<x-content-organi>
    {{-- Barra de navegación --}}
    <nav class="sticky top-0 bg-white bg-opacity-95 shadow z-50 px-4 py-2 flex justify-center gap-4">
        @foreach ($jobTitles as $title)
            <a href="#{{ Str::slug($title) }}" class="rounded-lg px-2 py-1 hover:bg-[#B33031] hover:text-white">
                {{ $title }}
            </a>
        @endforeach
    </nav>

    <div class="organigrama-container flex flex-col items-center my-4">
        @forelse ($users as $jobTitle => $group)
            {{-- Nivel del organigrama --}}
            <div id="{{ Str::slug($jobTitle) }}" class="job-level flex items-center justify-center mb-8">
                <div class="level-label bg-[#B33031] px-4 py-2 rounded-lg shadow-lg text-white">
                    <p class="font-bold">{{ $jobTitle }}</p>
                </div>
            </div>
    
            {{-- Usuarios en este nivel --}}
            <div class="grid grid-cols-5 justify-center gap-8">
                @foreach ($group as $user)
                <div>
                    <div class="flex flex-col items-center justify-around w-[200px] h-44 p-2 bg-white rounded-md shadow-md">
                        <!-- Imagen del usuario -->
                        <div class="relative w-16 h-16 rounded-full mb-2">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=fff" alt="Foto de {{ $user->first_name }}" class="w-16 h-16 rounded-full">
                            <!-- Bordes personalizados -->
                            <div class="absolute inset-0 rounded-full border-[6px] border-transparent border-l-[#2973B2] border-t-[#2973B2] border-b-[#2973B2] border-r-white pointer-events-none"></div>
                        </div>
                        <!-- Información del usuario -->
                        <div class="w-full text-center">
                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }}</p>
                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->last_name }}</p>
                        </div>
                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize rounded-md">{{ $user->job_title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
    
            {{-- Línea que conecta al siguiente nivel --}}
            @if (!$loop->last)
                <div class="connection-line flex items-center justify-center mt-4">
                    <div class="h-12 w-0.5 bg-gray-500"></div>
                </div>
            @endif
        @empty
            <p class="text-gray-600 text-center">No se encontraron usuarios.</p>
        @endforelse
    </div>
</x-content-organi>

