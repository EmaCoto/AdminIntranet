<div>
    <button wire:click="$toggle('open')" class="bg-white p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-eye"></i>
    </button>
    <x-dialog-modal maxWidth="5xl" wire:model="open">
        <x-slot name="title">
            <h1 class="bg-[#11163D] w-[40%] text-white text-xl p-2 rounded-l-lg rounded-r-full uppercase">Información del usuario</h1>
        </x-slot>

        <x-slot name="content">
            <div class="text-black">
                <div class="card mx-auto">
                    <div class="bg"><img src="{{ asset('img/photo.jpg') }}" alt="" class="mx-auto"></div>
                    <div class="blob"></div>
                </div>

                <!-- Separador -->
                <h1 class="mt-7 text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D]">Datos</span></h1>
                <hr class="border-t-2 bg-gradient-to-r to-[#B33031] from-[#11163D] w-[70%] mx-auto">

                <div class="text-black grid grid-cols-2 gap-2 mx-auto w-[80%] mt-4">
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Nombre</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 1)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Apellidos</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 2)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Departamento</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 3)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Nombre de usuario</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 50)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Ubicación</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 53)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Número de Cloudtalk</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 77)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Número de WhatsApp</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 76)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Correo corporativo</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 78)->first()?->value }}</p>
                    </div>
                    <div class="">
                        <label class="block text-sm font-bold uppercase">Fecha de nacimiento</label>
                        <p class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">{{ $user->profileData->where('field_id', 212)->first()?->value }}</p>
                    </div>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            {{-- botón cerrar modal --}}
            <x-close />
            {{-- botón cerrar modal --}}
        </x-slot>
    </x-dialog-modal>
</div>
