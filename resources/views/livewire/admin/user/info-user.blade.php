<div>
    <button wire:click="$toggle('open')" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md">
        <i class="fa-solid fa-eye"></i>
    </button>

    <!-- Modal -->
    @if($open)
        <div class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-sm">
            <div class="bg-white rounded-lg  shadow-lg w-[80%] h-hit overflow-y-auto relative content-scroll">
                <!-- Encabezado -->
                <div class="flex justify-between items-center mb-4 p-4 bg-[#11163D]">
                    <div class="flex items-center">
                        <img src="{{ asset('img/logo_ims_blanco.webp') }}" alt="Foto de perfil" class="mx-auto w-20 mr-4">
                        <h1 class="text-white text-lg uppercase">Información del usuario</h1>
                    </div>
                    <button wire:click="$toggle('open')" class="text-white bg-[#B33031] rounded-full p-1 px-2">
                        <i class="fa-regular fa-circle-xmark text-xl"></i>
                    </button>
                </div>

                <!-- Contenido -->
                <div class="text-black text-center p-4 flex items-center">
                    <img src="{{ asset('img/photo.png') }}" alt="Foto de perfil" class="mx-auto w-60 rounded-lg">
                    
                    <!-- Información en dos columnas -->
                    <div class="grid grid-cols-3 gap-3 text-sm font-semibold mx-auto h-[292px]">
                        <div class="text-left">
                            <p class="text-xl font-bold">{{ $nombre }}</p>
                            <p class="text-xl font-bold -mt-1">{{ $apellido }}</p>
                        </div>
                        @foreach ([
                            'Teléfono' => $numero,
                            'Correo Personal' => $personalCorreo,
                            'Cédula' => $cedula,
                            'Outlook' => $outlook,
                            'Correo Corporativo' => $correo,
                            'País' => $pais,
                            'WhatsApp Corporativo' => $whatsAppCorporativo,
                            'Cloud' => $cloud,
                            'Ubicación' => $ubicacion,
                            'Área' => $area,
                            'Departamento' => $etiqueta,
                            'Talla' => $talla,
                            'Fecha de ingreso' => $ingreso,
                            'Modalidad' => $modalidad,
                            'Fecha de nacimiento' => $nacimiento,
                            'Perfil' => $perfilOptions[$perfil] ?? 'No definido'
                        ] as $label => $value)
                        <div class="flex flex-col text-left border-b border-slate-300">
                            <span class="text-lg font-bold">{{ $label }}:</span> 
                            <p class="font-light text-wrap">{{ $value }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Imagen al final del modal -->
                <div class="-mt-[89px]">
                    <img src="{{ asset('img/footer_info_user.png') }}" alt="Footer" class="w-full rounded-b-lg">
                </div>
            </div>
        </div>
    @endif
</div>
