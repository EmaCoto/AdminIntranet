<x-content-organi>
    <div class="flex justify-center items-start my-4 w-full relative">
        <div class="tree-container flex flex-col items-center w-full gap-8">
            
            <!-- Gerente -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['gerente'] as $role)
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


        <div class="flex gap-4">
            <div class="p-3 bg-slate-200 h-fit rounded-md">
                {{-- publicidad --}}
                @foreach (['mis-a-pal-publicidad'] as $role)
                <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">publicidad</h1>
                    @if (isset($users[$role]))
                        <div class="grid grid-cols-2 items-center gap-2">
                            @foreach ($users[$role] as $user)
                                <x-user-card :user="$user"/>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="p-3 bg-slate-200 h-fit rounded-md">
                {{-- Agentes Comerciales PAL --}}
                @foreach (['agentes-comerciales-mis-a-pal'] as $role)
                <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Agentes Comerciales Mis A</h1>
                    @if (isset($users[$role]))
                        <div class="grid grid-cols-2 items-center gap-2">
                            @foreach ($users[$role] as $user)
                                <x-user-card :user="$user"/>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="p-3 bg-slate-200 h-fit rounded-md">
                {{-- Ventas PAL --}}
                @foreach (['ventas-mis-a-pal'] as $role)
                <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">Ventas Mis A</h1>
                    @if (isset($users[$role]))
                        <div class="grid grid-cols-2 items-center gap-2">
                            @foreach ($users[$role] as $user)
                                <x-user-card :user="$user"/>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="p-3 bg-slate-200 h-fit rounded-md">
                {{-- área legal mis-a-pal --}}
                @foreach (['area-legal-mis-a'] as $role)
                <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold uppercase">área legal Mis A</h1>
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
