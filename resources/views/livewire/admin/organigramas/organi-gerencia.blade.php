<x-content-organi>
    <div class="flex justify-center items-start my-4 w-full relative">
        <div class="tree-container flex flex-col items-center w-full gap-8">
            <!-- Presidenta -->
            <div class="flex justify-center items-center gap-12">
                @foreach (['presidenta'] as $role)
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

                <div class="mx-auto"><i class="fa-solid fa-arrow-right text-4xl text-red-600"></i></div>

                <div class="flex justify-center gap-8">
                    {{-- Asistente ejecutiva --}}
                    <div>
                        <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold">Asistente ejecutiva</h1>
                        @foreach (['asistente-ejecutiva'] as $role)
                            @if (isset($users[$role]))
                                <div class="grid items-center gap-2">
                                    @foreach ($users[$role] as $user)
                                        <x-user-card :user="$user"/>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <x-arrow-organi />

            <div class="flex justify-center gap-8">
                {{-- Gerentes --}}
                <div class="p-3 bg-slate-200 h-fit rounded-lg">
                    <h1 class="text-lg mb-4 py-1 text-slate-800 text-center justify-center font-bold">Gerentes</h1>
                    @foreach (['gerente'] as $role)
                        @if (isset($users[$role]))
                            <div class="grid grid-cols-5 items-center gap-2">
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
