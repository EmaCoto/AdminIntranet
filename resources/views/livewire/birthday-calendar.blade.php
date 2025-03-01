<x-content> 
    <h2 class="text-3xl font-bold mb-4 flex flex-col items-center justify-center gap-x-3 p-2">
        <dotlottie-player src="https://lottie.host/771e193e-1755-4627-ac9f-e96afeed4f72/NNsax8Wssj.lottie" background="transparent" speed="1" style="width: 150px; height: 150px" loop autoplay></dotlottie-player>
        Próximos Cumpleaños
    </h2>

    {{-- Menú de selección de mes --}}
    <div class="flex justify-center space-x-2 mb-4">
        @foreach ($months as $month)
            <button wire:click="selectMonth({{ $month }})"
                class="px-3 py-1 border rounded-lg text-sm 
                {{ $selectedMonth == $month ? 'bg-[#152B59] text-white' : 'bg-gray-200' }}">
                {{ \Carbon\Carbon::create()->month($month)->format('F') }}
            </button>
        @endforeach
    </div>

    <div class="mb-6 text-center">
        <h3 class="text-xl font-semibold">{{ \Carbon\Carbon::create()->month($selectedMonth)->format('F') }}</h3>
        <ul class="grid grid-cols-4 gap-2 gap-y-8 p-4">
            @foreach ($birthdays as $birthday)
            {{-- Card --}}
                <div class="w-52 h-fit hover:scale-105 transition duration-300 relative">
                    
                    <div class="flex items-center justify-between w-full -mb-5">
                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-white p-1 px-3 text-sm rounded-lg z-20">{{ $birthday['birthday'] }}</p>
                        <p class="flex flex-col bg-gradient-to-t from-[#152B59] to-[#2973B2] text-white rounded-full p-1 px-1.5 z-20">{{ $birthday['age_next'] }} <span class="text-xs -mt-2">Años</span></p>
                    </div>

                    {{-- Tarjeta con fondo dinámico --}}
                    <li class="bg-gradient-to-r from-[#e3e3e3] to-white flex flex-col items-center w-52 h-fit p-2 relative hover:shadow-lg border text-sm gap-y-2 rounded-md overflow-hidden 
                        {{ $birthday['is_past'] ? 'border-red-500' : '' }}">

                        {{-- Animación Lottie como fondo solo si es su cumpleaños --}}
                        @if ($birthday['is_today'])
                            <dotlottie-player src="https://lottie.host/cecac2e9-1c49-4d5f-80ab-049188ab97ce/vTobqTcOMv.lottie" 
                                background="transparent" speed="1" loop autoplay 
                                class="absolute top-0 left-0 w-full h-full z-0 opacity-70">
                            </dotlottie-player>
                        @endif

                        {{-- Contenido de la tarjeta --}}
                        <div class="relative z-10 flex flex-col items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($birthday['name']) }}&background=fff" alt="Foto de {{ $birthday['name'] }}" class="w-16 h-16 rounded-full">
                            <div>
                                <p>{{ $birthday['first_name'] }}</p>
                                <p>{{ $birthday['last_name'] }}</p>
                            </div>
                        </div>

                    </li>
                </div>
            @endforeach
        </ul>
    </div>

    @if(empty($birthdays))
        <p class="text-gray-500">No hay cumpleaños en este mes. 🎂</p>
    @endif
</x-content> 
