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
            <div class="grid grid-cols-4 justify-center gap-8 gap-y-12">
                @foreach ($group as $user)
                <div>
                    <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[235px] h-[62px] p-2 relative shadow-lg border">
                        <!-- Imagen del usuario -->
                        <x-photo-showuser-organi :user="$user"/>
                        <!-- Información del usuario -->
                        <div class="ml-10 w-full">
                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                        </div>
                    </div>
                    <div class="flex justify-end mr-5 -translate-y-3">
                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">{{ $user->job_title }}</p>
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
