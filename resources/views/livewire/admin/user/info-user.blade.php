<div>
    <button wire:click="$toggle('open')" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md">
        <i class="fa-solid fa-eye"></i>
    </button>
    <x-dialog-modal maxWidth="4xl" wire:model="open">
        <x-slot name="title">
            <div class="flex justify-between items-center">
                <h1 class="bg-[#11163D] w-fit text-white text-xl p-2 rounded-l-lg rounded-r-full uppercase">Información del usuario</h1>
                <button wire:click="$toggle('open')" class="text-xl font-bold text-white bg-[#B33031] rounded-full p-1 px-2">
                    <i class="fa-regular fa-circle-xmark"></i>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="text-black">
                <div>
                    <img src="{{ asset('img/photo.png') }}" alt="" class="mx-auto w-32 rounded-full p-2 border-2 border-dashed border-[#152B59]">
                </div>
                <h1 class="my-2 text-3xl font-extrabold text-center">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D]">Datos</span>
                </h1>
                <p class="text-center text-xl font-bold">{{ $nombre }} {{ $apellido }}</p>
                <hr class="border-t-2 bg-gradient-to-r to-[#B33031] from-[#11163D] w-full mx-auto my-4">
                <div class="grid grid-cols-2 gap-3 text-sm font-semibold mx-auto">
                    @foreach ([
                        'Cédula' => $cedula,
                        'Teléfono' => $numero,
                        'Correo Personal' => $personalCorreo,
                        'Talla' => $talla,
                        'Outlook' => $outlook,
                        'Correo Corporativo' => $correo,
                        'WhatsApp Corporativo' => $whatsAppCorporativo,
                        'Cloud' => $cloud,
                        'País' => $pais,
                        'Ubicación' => $ubicacion,
                        'Área' => $area,
                        'Departamento' => $etiqueta,
                        'Modalidad' => $modalidad,
                        'Perfil' => $perfilOptions[$perfil] ?? 'No definido'
                    ] as $label => $value)
                    <div class="w-fit flex">
                        <span class="bg-[#2973B2] h-full text-white p-1 px-3 rounded-full z-10">{{ $label }}:</span> 
                        <p class="-ml-2 p-1 px-3 bg-[#F1F3F5] rounded-r-full">{{ $value }}</p>
                    </div>
                    @endforeach
                </div>
                               
            </div>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>
</div>
