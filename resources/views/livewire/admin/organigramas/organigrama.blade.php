<x-content-organi>
    <div class="organigrama-container flex flex-col items-center">
        @forelse ($users as $jobTitle => $group)
            {{-- Nivel del organigrama --}}
            <div class="job-level flex items-center justify-center mb-8">
                <div class="level-label bg-[#B33031] px-4 py-2 rounded-lg shadow-lg text-white">
                    <p class="font-bold">{{ $jobTitle }}</p>
                </div>
            </div>
    
            {{-- Usuarios en este nivel --}}
            <div class="grid grid-cols-4 justify-center gap-6">
                @foreach ($group as $user)
                <div class="flex flex-col items-center">
                    {{-- Foto del usuario --}}
                    <x-photo-showuser :user="$user"/>
                    <div class="bg-white rounded-lg shadow-lg p-2 flex flex-col items-center w-52 h-[100px] pt-6">
                        {{-- Información del usuario --}}
                        <p class="text-sm font-semibold  text-center capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p class="text-sm text-gray-600 text-center">{{ $user->job_title }}</p>
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

