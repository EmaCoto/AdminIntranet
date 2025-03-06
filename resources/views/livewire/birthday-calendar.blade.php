<x-content> 
    <div class="relative">
        <h2 class="text-3xl font-bold mb-4 flex flex-col items-center justify-center gap-x-3 p-2">
            <dotlottie-player src="https://lottie.host/771e193e-1755-4627-ac9f-e96afeed4f72/NNsax8Wssj.lottie" background="transparent" speed="1" style="width: 150px; height: 150px" loop autoplay></dotlottie-player>
            Próximos Cumpleaños
        </h2>
        <div class="flex flex-col gap-4 absolute top-0 right-0 p-2">
            <div class="flex w-fit">
                <div class="bg-gradient-to-t from-[#B33031] to-[#f44343] p-2 px-3 w-4 rounded-full mr-1"></div>
                <p>Día del cumpleaños</p>
            </div>
            <div class="flex w-fit">
                <div class="bg-gradient-to-t from-[#152B59] to-[#2973B2] p-2 px-3 w-4 rounded-full mr-1"></div>
                <p>Años actuales</p>
            </div>
        </div>
    </div>

    {{-- Menú de selección de mes --}}
    <div class="flex justify-center space-x-2 mb-4">
        @foreach ($months as $month)
            <button wire:click="selectMonth({{ $month }})"
                class="px-3 py-1 border rounded-lg text-sm capitalize
                {{ $selectedMonth == $month ? 'bg-[#152B59] text-white' : 'bg-gray-200' }}">
                {{ \Carbon\Carbon::create()->locale('es')->month($month)->translatedFormat('F') }}
            </button>
        @endforeach
    </div>
    
    {{-- <h3 class="text-3xl font-bold mt-10 capitalize">{{ \Carbon\Carbon::create()->locale('es')->month($months)->translatedFormat('F') }}</h3> --}}
    

    {{-- Cumpleañero del día --}}
    @if (!empty($todaysBirthdays))
        <div class="mb-6 text-center">
            <h3 class="text-3xl font-bold text-red-600">🎉 Cumpleañeros del Día 🎉</h3>
            <ul class="grid grid-cols-4 gap-2 gap-y-8 p-4">
                @foreach ($todaysBirthdays as $birthday)
                    <div class="w-52 h-fit hover:scale-105 transition duration-300 relative">
                        <div class="flex items-center justify-between w-full -mb-5">
                            <p class="bg-gradient-to-t from-[#B33031] to-[#f44343] text-white p-1 px-3 text-sm rounded-lg z-20">{{ $birthday['birthday'] }}</p>
                            <div class="flex flex-col -mb-7 items-center">
                                <p class="flex flex-col bg-gradient-to-t from-[#152b59] to-[#2973B2] text-white rounded-full p-1 px-1.5 z-20">
                                    {{ $birthday['age_next'] }} <span class="text-xs -mt-2">Años</span>
                                </p>
                                @if (!empty($birthday['flag']))
                                    <img src="{{ $birthday['flag'] }}" alt="Bandera de {{ $birthday['country'] }}" class="w-6 h-4 mt-1 z-20">
                                @else
                                    <p class="text-xs text-gray-500 mt-1">Sin país</p>
                                @endif
                            </div>                                                       
                        </div>
                        
                        <li class="bg-gradient-to-r from-[#e3e3e3] to-white flex flex-col items-center w-52 h-fit p-2 relative hover:shadow-lg border text-sm gap-y-2 rounded-md overflow-hidden">
                            <dotlottie-player src="https://lottie.host/cecac2e9-1c49-4d5f-80ab-049188ab97ce/vTobqTcOMv.lottie" 
                                background="transparent" speed="1" loop autoplay 
                                class="absolute top-0 left-0 w-full h-full z-0 opacity-70">
                            </dotlottie-player>
                            
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
        <hr class="my-8 border-t-2 border-gray-300">
    @endif
        
    {{-- Cumpleañeros del mes --}}
    <div class="text-center my-4">
        <h3 class="text-3xl font-bold text-slate-800 capitalize">
            {{ \Carbon\Carbon::create()->locale('es')->month($selectedMonth)->translatedFormat('F') }}
        </h3>
    </div>
    <div class="text-center">
        <ul class="grid grid-cols-4 gap-2 gap-y-8 p-4">
            @foreach ($birthdays as $birthday)
                <div class="w-52 h-fit hover:scale-105 transition duration-300 relative">
                    <div class="flex items-center justify-between w-full -mb-5">
                        <p class="bg-gradient-to-t from-[#B33031] to-[#f44343] text-white p-1 px-3 text-sm rounded-lg z-20">{{ $birthday['birthday'] }}</p>
                        <div class="flex flex-col -mb-7 items-center">
                            <p class="flex flex-col bg-gradient-to-t from-[#152b59] to-[#2973B2] text-white rounded-full p-1 px-1.5 z-20">
                                {{ $birthday['age_next'] }} <span class="text-xs -mt-2">Años</span>
                            </p>
                            @if (!empty($birthday['flag']))
                                <img src="{{ $birthday['flag'] }}" alt="Bandera de {{ $birthday['country'] }}" class="w-6 h-4 mt-1 z-20">
                            @else
                                <p class="text-xs text-gray-500 mt-1">Sin país</p>
                            @endif
                        </div>   
                    </div>

                    <li class="bg-gradient-to-r from-[#e3e3e3] to-white flex flex-col items-center w-52 h-fit p-2 relative hover:shadow-lg border text-sm gap-y-2 rounded-md overflow-hidden 
                        {{ $birthday['is_past'] ? 'border-red-800' : '' }}">
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
</x-content>
