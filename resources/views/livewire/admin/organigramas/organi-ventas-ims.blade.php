<x-content-organi>
    <div class="relative">
        <div class="absolute -top-10 z-50 flex justify-center w-full">
            <a href="{{ route('VentasIms') }}" class="p-2 bg-[#B23B3B] text-white rounded-md shadow-md w-fit uppercase font-bold hover:bg-slate-50 hover:text-[#B23B3B] hover:border-[#B23B3B] border-2 border-[#B23B3B]"><i class="fa-solid fa-table pr-2"></i>ver tabla</a>
        </div>
    </div>
    <div class="flex justify-center gap-4 my-6">
        <button onclick="mostrarOrganigrama('gonzalez')" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Ventas KAM González</button>
        <button onclick="mostrarOrganigrama('santana')" class="px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-700">Ventas KAM Santana</button>
        <button onclick="mostrarOrganigrama('quintero')" class="px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-700">Ventas KAM Quintero</button>
    </div>
    <div class="flex justify-center items-start my-4 w-full relative">
        <div class="tree-container">
            {{-- ventas kam gonzález --}}
            <div id="organigrama-gonzalez" class="organigrama">
                <div class="flex flex-col items-center w-full">
                    <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">ventas kam gonzález</h1>
                    <!-- Director -->
                    <div class="flex justify-center items-center gap-12">
                        @foreach (['subdirector-corea-del-sur'] as $role)
                            @if (isset($users[$role]))
                                @foreach ($users[$role] as $user)
                                    <div>
                                        <x-profile-type  :user="$user"/>
                                        <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                            <x-photo-showuser-organi :user="$user"/>
                                            <div class="ml-10 w-full">
                                                <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mr-5 -translate-y-3">
                                            <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                {{ $user->job_title }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <!-- Línea de conexión hacia subdirectores -->
                    <x-arrow-organi />
                    <div class="grid grid-cols-3 justify-center gap-8">
                        {{-- subdirector-corea-del-sur --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-corea-del-sur'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-corea-del-sur'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-alemania --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-alemania'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-alemania'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-chile--}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-chile'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-chile'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-francia --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-francia'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-francia'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- ventas kam santana --}}
            <div id="organigrama-santana" class="organigrama hidden">
                <div class="flex flex-col items-center w-full">
                    <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">ventas kam santana</h1>
                    <!-- Director -->
                    <div class="flex justify-center items-center gap-12">
                        @foreach (['subdirector-espana'] as $role)
                            @if (isset($users[$role]))
                                @foreach ($users[$role] as $user)
                                    <div>
                                        <x-profile-type  :user="$user"/>
                                        <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                            <x-photo-showuser-organi :user="$user"/>
                                            <div class="ml-10 w-full">
                                                <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mr-5 -translate-y-3">
                                            <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                {{ $user->job_title }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <!-- Línea de conexión hacia subdirectores -->
                    <x-arrow-organi />
                    <div class="grid grid-cols-3 justify-center gap-8">
                        {{-- subdirector-espana --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-espana'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-espana'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-belgica --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-belgica'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-belgica'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-panama--}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-panama'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-panama'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-noruega --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-noruega'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-noruega'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-brazil --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-brazil'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-brazil'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-dinamarca --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-dinamarca'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-dinamarca'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- ventas kam quintero --}}
            <div id="organigrama-quintero" class="organigrama hidden">
                <div class="flex flex-col items-center w-full">
                    <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">ventas kam quintero</h1>
                    <!-- Director -->
                    <div class="flex justify-center items-center gap-12">
                        @foreach (['subdirector-singapur'] as $role)
                            @if (isset($users[$role]))
                                @foreach ($users[$role] as $user)
                                    <div>
                                        <x-profile-type  :user="$user"/>
                                        <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                            <x-photo-showuser-organi :user="$user"/>
                                            <div class="ml-10 w-full">
                                                <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mr-5 -translate-y-3">
                                            <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                {{ $user->job_title }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <!-- Línea de conexión hacia subdirectores -->
                    <x-arrow-organi />
                    <div class="grid grid-cols-3 justify-center gap-8">
                        {{-- subdirector-singapur --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-singapur'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-singapur'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-peru --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-peru'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-peru'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-paises-bajos--}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-paises-bajos'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-paises-bajos'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-suiza --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-suiza'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-suiza'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-portugal --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-portugal'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-portugal'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- subdirector-finlandia --}}
                        <div class="p-3 bg-slate-200 h-fit rounded-md">
                            <div class="flex justify-center gap-12">
                                @foreach (['subdirector-finlandia'] as $role)
                                    @if (isset($users[$role]))
                                        <div class="flex flex-col items-center">
                                            @foreach ($users[$role] as $user)
                                                <x-profile-type  :user="$user"/>
                                                <div>
                                                    <div class="bg-gradient-to-r from-[#e3e3e3] to-white rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
                                                        <x-photo-showuser-organi :user="$user"/>
                                                        <div class="ml-10 w-full">
                                                            <p class="text-sm font-semibold text-[#2973B2] capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end mr-5 -translate-y-3">
                                                        <p class="bg-gradient-to-t from-[#152B59] to-[#2973B2] text-sm px-2 py-1 inline-block text-white capitalize text-center rounded-md z-40">
                                                            {{ $user->job_title }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Línea de conexión hacia el equipo -->
                                            <x-arrow-organi />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach (['asistente-legal-equipo-finlandia'] as $role)
                                @if (isset($users[$role]))
                                    <div class="grid grid-cols-3 items-center gap-2">
                                        @foreach ($users[$role] as $user)
                                            <x-user-card :user="$user"/>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mostrarOrganigrama(tipo) {
            document.getElementById('organigrama-gonzalez').classList.add('hidden');
            document.getElementById('organigrama-santana').classList.add('hidden');
            document.getElementById('organigrama-quintero').classList.add('hidden');
    
            document.getElementById('organigrama-' + tipo).classList.remove('hidden');
        }
    </script>
    
</x-content-organi>
