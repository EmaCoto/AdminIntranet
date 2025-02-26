<x-content-organi>
    <div class="flex justify-center items-start my-4 w-full relative">
        <div class="tree-container flex flex-col items-center w-full gap-8">
            
            <!-- Gerente -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['gerente-de-publicidad'] as $role)
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

            <!-- Línea de conexión hacia Subgerente -->
            <x-arrow-organi />

            <!-- Subgerente -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['subgerente-de-publicidad'] as $role)
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

            <!-- Línea de conexión hacia Director -->
            <x-arrow-organi />

            <!-- Director -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['director-de-publicidad'] as $role)
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

            <div class="flex justify-center gap-8">
                {{-- Desarrollo Web --}}
                <div class="p-3 bg-slate-200 h-fit rounded-md">
                    <div class="flex justify-center gap-12">
                        @foreach (['subdirector-desarrollo-web'] as $role)
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

                    @foreach (['desarrollo-web'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                    <x-user-card :user="$user"/>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Content Manager --}}
                <div class="p-3 bg-slate-200 h-fit rounded-md">
                    <div class="flex justify-center gap-12">
                        @foreach (['subdirector-content-manager'] as $role)
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

                    @foreach (['content-manager'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                    <x-user-card :user="$user"/>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Audiovisual --}}
                <div class="p-3 bg-slate-200 h-fit rounded-md">
                    <div class="flex justify-center gap-12">
                        @foreach (['subdirector-audiovisual'] as $role)
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

                    @foreach (['audiovisual'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                    <x-user-card :user="$user"/>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Marketing --}}
                <div class="p-3 bg-slate-200 h-fit rounded-md">
                    <div class="flex justify-center gap-12">
                        @foreach (['subdirector-marketing'] as $role)
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

                    @foreach (['marketing'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
                                @foreach ($users[$role] as $user)
                                    <x-user-card :user="$user"/>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- Diseño --}}
                <div class="p-3 bg-slate-200 h-fit rounded-md">
                    <div class="flex justify-center gap-12">
                        @foreach (['subdirector-diseño'] as $role)
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

                    @foreach (['diseño'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-2 items-center gap-2">
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
</x-content-organi>
