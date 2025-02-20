<x-content-organi>
    {{-- <nav class="sticky top-0 bg-white bg-opacity-95 shadow z-40 px-4 py-2 flex justify-center gap-4 content-scroll overflow-x-auto">
        @foreach ($profileTypes as $type)
            @if (isset($users[$type])) 
                <a href="#{{ Str::slug($type) }}" class="rounded-lg px-2 py-1 hover:bg-[#B33031] hover:text-white text-sm">
                    {{ ucfirst(str_replace('-', ' ', $type)) }}
                </a>
            @endif
        @endforeach
    </nav> --}}

    <div class="flex justify-center items-start my-4 overflow-auto w-full h-[80vh] relative">
        <div class="tree-container flex flex-col items-center w-full gap-8">
            
            <!-- Director -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['director-de-publicidad'] as $role)
                    @if (isset($users[$role]))
                        @foreach ($users[$role] as $user)
                        <div>
                            <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
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

            <!-- Línea de conexión hacia Subgerente -->
            <div class="w-0.5 h-8 bg-gray-500 mx-auto"></div>

            <!-- Subgerente -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['subgerente-de-publicidad'] as $role)
                    @if (isset($users[$role]))
                        @foreach ($users[$role] as $user)
                        <div>
                            <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
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

            <!-- Línea de conexión hacia supervisores -->
            <div class="w-0.5 h-8 bg-gray-500 mx-auto"></div>

            <div class="flex justify-center gap-8">
                {{-- Desarrollo Web --}}
                <div>
                    <div class="flex justify-center gap-12">
                        @foreach (['supervisor-de-desarrollo-web'] as $role)
                            @if (isset($users[$role]))
                                <div class="flex flex-col items-center">
                                    @foreach ($users[$role] as $user)
                                        <p class="text-lg mb-4 py-1 inline-block text-[#B33031] text-center">
                                            {{ ucwords(str_replace('-', ' ', $user->profile_type)) }}
                                        </p>
                                        <div>
                                            <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
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
                                    <div class="w-0.5 h-8 bg-gray-500 mx-auto mb-8"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @foreach (['desarrollador-web'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                <div class="flex flex-col items-center justify-around w-[150px] h-40 p-1 bg-[#ededed] rounded-md shadow-md">
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
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Community --}}
                <div>
                    <div class="flex justify-center gap-12">
                        @foreach (['supervisor-de-community'] as $role)
                            @if (isset($users[$role]))
                                <div class="flex flex-col items-center">
                                    @foreach ($users[$role] as $user)
                                        <p class="text-lg mb-4 py-1 inline-block text-[#B33031] text-center">
                                            {{ ucwords(str_replace('-', ' ', $user->profile_type)) }}
                                        </p>
                                        <div>
                                            <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
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
                                    <div class="w-0.5 h-8 bg-gray-500 mx-auto mb-8"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @foreach (['community'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                <div class="flex flex-col items-center justify-around w-[150px] h-40 p-1 bg-[#ededed] rounded-md shadow-md">
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
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Audiovisual --}}
                <div>
                    <div class="flex justify-center gap-12">
                        @foreach (['supervisor-audiovisual'] as $role)
                            @if (isset($users[$role]))
                                <div class="flex flex-col items-center">
                                    @foreach ($users[$role] as $user)
                                        <p class="text-lg mb-4 py-1 inline-block text-[#B33031] text-center">
                                            {{ ucwords(str_replace('-', ' ', $user->profile_type)) }}
                                        </p>
                                        <div>
                                            <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
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
                                    <div class="w-0.5 h-8 bg-gray-500 mx-auto mb-8"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @foreach (['audiovisual'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                <div class="flex flex-col items-center justify-around w-[150px] h-40 p-1 bg-[#ededed] rounded-md shadow-md">
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
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Marketing --}}
                <div>
                    <div class="flex justify-center gap-12">
                        @foreach (['supervisor-de-marketing'] as $role)
                            @if (isset($users[$role]))
                                <div class="flex flex-col items-center">
                                    @foreach ($users[$role] as $user)
                                        <p class="text-lg mb-4 py-1 inline-block text-[#B33031] text-center">
                                            {{ ucwords(str_replace('-', ' ', $user->profile_type)) }}
                                        </p>
                                        <div>
                                            <div class="bg-gradient-to-r from-[#e3e3e3] rounded-r-full flex items-center w-[265px] h-[62px] p-2 relative shadow-lg border">
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
                                    <div class="w-0.5 h-8 bg-gray-500 mx-auto mb-8"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @foreach (['marketing'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                <div class="flex flex-col items-center justify-around w-[150px] h-40 p-1 bg-[#ededed] rounded-md shadow-md">
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
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-content-organi>
