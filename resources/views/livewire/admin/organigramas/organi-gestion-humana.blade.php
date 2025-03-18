<x-content-organi>
    <div class="flex justify-center items-start my-4 w-full relative">
        <div class="tree-container flex flex-col items-center w-full gap-8">               
            <!-- Subgerente -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['subgerente-recursos-humanos'] as $role)
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

            <x-arrow-organi />

            <!-- Director -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['directora-recursos-humanos'] as $role)
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

            <x-arrow-organi />

            <div class="flex justify-center gap-8">
                {{-- Asistente --}}
                <div class="p-3 bg-slate-200 h-fit rounded-lg">
                    <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Recursos Humanos Colombia</h1>
                    <h2 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold">Asistente de recursos humanos</h2>
                    @foreach (['asistente-de-recursos-humanos'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                    <x-user-card :user="$user"/>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="grid grid-cols-2 gap-4">
                    {{-- Recursos Humano CR--}}
                    <div class="p-3 bg-slate-200 h-fit rounded-lg">
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Recursos Humanos Costa Rica</h1>
                        <div class="flex justify-center items-center gap-12">
                            @foreach (['recursos-humanos'] as $role)
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
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold">Asistente recursos humano</h1>
                        @foreach (['recursos-humanos-usa'] as $role)
                            @if (isset($users[$role]))
                                <div class="grid grid-cols-2 items-center gap-2">
                                    @foreach ($users[$role] as $user)
                                        <x-user-card :user="$user"/>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- Recursos Humano AR--}}
                    <div class="p-3 bg-slate-200 h-fit rounded-lg">
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Recursos Humanos Agentina</h1>
                        <div class="flex justify-center items-center gap-12">
                            @foreach (['recursos-humanos'] as $role)
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
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold">Asistente recursos humano</h1>
                        @foreach (['recursos-humanos-usa'] as $role)
                            @if (isset($users[$role]))
                                <div class="grid grid-cols-2 items-center gap-2">
                                    @foreach ($users[$role] as $user)
                                        <x-user-card :user="$user"/>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- Recursos Humano PR--}}
                    <div class="p-3 bg-slate-200 h-fit rounded-lg">
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Recursos Humanos Puerto Rico</h1>
                        <div class="flex justify-center items-center gap-12">
                            @foreach (['recursos-humanos'] as $role)
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
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold">Asistente recursos humano</h1>
                        @foreach (['recursos-humanos-usa'] as $role)
                            @if (isset($users[$role]))
                                <div class="grid grid-cols-2 items-center gap-2">
                                    @foreach ($users[$role] as $user)
                                        <x-user-card :user="$user"/>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{-- Recursos Humano MX--}}
                    <div class="p-3 pl-8 bg-slate-200 h-fit rounded-lg">
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Recursos Humanos México</h1>
                        <div class="flex flex-col justify-center items-center gap-12">
                            @foreach (['asistente-ejecutiva'] as $role)
                                @if (isset($users[$role]))
                                    @foreach ($users[$role] as $user)
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
                                @endif
                            @endforeach
                            @foreach (['director-equipo-legal'] as $role)
                                @if (isset($users[$role]))
                                    @foreach ($users[$role] as $user)
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</x-content-organi>
