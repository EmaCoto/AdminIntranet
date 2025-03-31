<div>
    <button wire:click="$toggle('open')" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md">
        <i class="fa-solid fa-eye"></i>
    </button>

    <x-dialog-modal maxWidth="6xl" wire:model="open">
        <x-slot name="title">
            <div class="flex items-center justify-between p-4 bg-[#11163D] rounded-r-md">
                <div class="flex gap-4 items-center">
                    <img src="{{ asset('img/logo_ims_blanco.webp') }}" alt="Logo" class="w-20">
                    <h1 class="text-white text-lg uppercase">Información del Usuario</h1>
                </div>
                <button wire:click="$toggle('open')" class="text-xl font-bold text-white bg-[#B33031] rounded-full p-1 px-2">
                    <i class="fa-regular fa-circle-xmark"></i>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">

            <div class="flex">
                <!-- Tabs verticales -->
                <div class="flex flex-col bg-[#11163D] text-white p-4 space-y-4 items-center w-20 -mt-4 rounded-b-md">
                    @foreach([
                        'info' => ['icon' => 'fa-user', 'label' => 'Datos Personales'],
                        'evaluacion' => ['icon' => 'fa-chart-line', 'label' => 'Evaluación de desarrollo'],
                        'resultados' => ['icon' => 'fa-award', 'label' => 'Resultados de desempeño'],
                        'plan' => ['icon' => 'fa-clipboard-list', 'label' => 'Plan de desarrollo laboral'],
                    ] as $key => $tabData)
                        <button 
                            wire:click="$set('tab', '{{ $key }}')" 
                            class="relative group text-lg py-3 px-4 rounded-full {{ $tab === $key ? 'bg-[#2e3ba3]' : 'hover:bg-[#1f2a6a]' }}">
                            <i class="fa-solid {{ $tabData['icon'] }}"></i>
                            <span class="absolute left-full ml-2 top-1/2 transform -translate-y-1/2 whitespace-nowrap text-xs bg-black text-white px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity z-10">
                                {{ $tabData['label'] }}
                            </span>
                        </button>
                    @endforeach
                </div>

                <!-- Contenido principal -->
                <div class="flex-1 overflow-y-auto p-6 space-y-6 h-full">
                    @if($tab === 'info')

                        <!-- Datos personales -->
                        <div>
                            <h2 class="text-xl font-bold border-b pb-2 mb-4 text-[#152B59]">Datos Personales</h2>
                            <div class="flex gap-8">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('img/photo.png') }}" alt="Foto" class="w-48 rounded-lg border-2 border-[#152B59]">
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm font-semibold w-full">
                                    @foreach ([
                                        'Nombre' => $nombre,
                                        'Apellido' => $apellido,
                                        'Usuario' => $usuario,
                                        'Cédula' => $cedula,
                                        'Fecha de nacimiento' => $nacimiento,
                                        'Correo personal' => $personalCorreo,
                                        'Teléfono personal' => $numero,
                                        'Talla' => $talla,
                                    ] as $label => $value)
                                        <div class="border-b pb-1">
                                            <span class="text-xs uppercase text-gray-500">{{ $label }}</span>
                                            <p class="font-light">{{ $value }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Datos corporativos -->
                        <div>
                            <h2 class="text-xl font-bold border-b pb-2 mb-4 mt-8 text-[#152B59]">Datos Corporativos</h2>
                            <div class="grid grid-cols-3 gap-4 text-sm font-semibold">
                                @foreach ([
                                    'Correo Outlook' => $outlook,
                                    'Correo Corporativo Gmail' => $correo,
                                    'WhatsApp Corporativo' => $whatsAppCorporativo,
                                    'Cloudtalk' => $cloud,
                                    'Modalidad' => $modalidad,
                                    'Fecha de ingreso' => $ingreso,
                                    'País' => $pais,
                                    'Ubicación' => $ubicacion,
                                    'Área' => $area,
                                    'Departamento' => $etiqueta,
                                    'Rol / Perfil' => $perfilOptions[$perfil] ?? 'No definido',
                                ] as $label => $value)
                                    <div class="border-b pb-1">
                                        <span class="text-xs uppercase text-gray-500">{{ $label }}</span>
                                        <p class="font-light">{{ $value }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @else
                        <div class="text-center py-16">
                            <h2 class="text-xl font-bold text-gray-600">Próximamente</h2>
                            <p class="text-sm text-gray-500">Estamos trabajando en esta sección.</p>
                        </div>
                    @endif
                </div>

            </div>
        </x-slot>

        <x-slot name='footer'>

        </x-slot>
    </x-dialog-modal>
</div>
