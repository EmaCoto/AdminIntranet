<div>
    <button wire:click="$toggle('open')" class="bg-[#152B59] hover:bg-[#0e1d3c] text-white px-3 py-1 rounded-md">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <x-dialog-modal maxWidth="6xl" wire:model='open'>
        <x-slot name='title'>
            <div class="flex justify-between items-center">
                <h1 class="w-fit text-[#11163D] text-xl p-2 uppercase">Editar Colaborador</h1>
                <button wire:click="$toggle('open')" class="text-xl font-bold text-white bg-[#B33031] rounded-full p-1 px-2">
                    <i class="fa-regular fa-circle-xmark"></i>
                </button>
            </div>
        </x-slot>
        <x-slot name='content'>

            {{-- Tabs tipo carpeta --}}
            <div class="flex space-x-2 mb-4 border-b border-[#11163D]">
                @foreach(['info' => 'Datos del Colaborador', 'evaluacion de desarrollo' => 'Evaluación de desarrollo', 'resultados de desempeño' => 'resultados de desempeño', 'plan de desarrollo laboral' => 'plan de desarrollo laboral'] as $key => $label)
                    <button
                        wire:click="$set('tab', '{{ $key }}')"
                        class="text-sm font-semibold uppercase px-4 py-2 rounded-t-md transition-all duration-200
                            {{ $tab === $key ? 'bg-[#11163D] text-white' : 'bg-gray-300 text-gray-600 opacity-50 hover:opacity-100' }}"
                    >
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        
            {{-- Contenido de cada sección --}}
            @if($tab === 'info')
                <div class="grid grid-cols-2 gap-4">
        
                    {{-- Columna izquierda: Datos personales --}}
                    <div class="space-y-4">
                        <h2 class="text-center font-bold uppercase py-1 text-xl">Datos personales</h2>
        
                        <div class="flex justify-center">
                            <img src="{{ asset('img/photo.png') }}" class="w-32 h-32 object-cover rounded-full border-2 border-dashed border-[#152B59]" alt="Foto de perfil">
                        </div>
        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-semibold uppercase">Nombre</label>
                                <input type="text" wire:model="nombre" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Apellido</label>
                                <input type="text" wire:model="apellido" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div class="col-span-2">
                                <label class="text-xs font-semibold uppercase">Cédula</label>
                                <input type="text" wire:model="cedula" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Número personal</label>
                                <input type="text" wire:model="numero" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Nacimiento</label>
                                <input type="date" wire:model="nacimiento" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div class="col-span-2">
                                <label class="text-xs font-semibold uppercase">Correo personal</label>
                                <input type="text" wire:model="personalCorreo" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                        </div>
                    </div>
        
                    {{-- Columna derecha: Datos corporativos --}}
                    <div class="space-y-4 border-l pl-4 border-gray-300">
                        <h2 class="text-center font-bold uppercase py-1 text-xl">Datos corporativos</h2>
        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-semibold uppercase">Correo Outlook</label>
                                <input type="text" wire:model="outlook" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Correo Gmail Corporativo</label>
                                <input type="text" wire:model="correo" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">WhatsApp Corporativo</label>
                                <input type="text" wire:model="whatsAppCorporativo" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Cloudtalk</label>
                                <input type="text" wire:model="cloud" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Modalidad</label>
                                <select wire:model="modalidad" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona modalidad</option>
                                    @foreach($modalidadOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Ingreso</label>
                                <input type="date" wire:model="ingreso" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Talla</label>
                                <select wire:model="talla" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona talla</option>
                                    @foreach($tallaOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">País</label>
                                <select wire:model="pais" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona país</option>
                                    @foreach($paisOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Ubicación</label>
                                <select wire:model="ubicacion" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona ubicación</option>
                                    @foreach($ubicacionOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-semibold uppercase">Área</label>
                                <select wire:model="area" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona área</option>
                                    @foreach($areaOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="text-xs font-semibold uppercase">Departamento</label>
                                <select wire:model="etiqueta" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona departamento</option>
                                    @foreach($etiquetaOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="text-xs font-semibold uppercase">Rol</label>
                                <select wire:model="perfil" class="w-full p-2 rounded bg-gray-300 focus:bg-white border focus:ring-[#11163D]">
                                    <option value="">Selecciona rol</option>
                                    @foreach($perfilOptions as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-20">
                    <h2 class="text-xl font-bold text-gray-600">Próximamente</h2>
                    <p class="text-sm text-gray-500 mt-2">Estamos trabajando en esta sección.</p>
                </div>
            @endif
        
        </x-slot>
        
        
        <x-slot name='footer'>
            <div wire:loading class="px-8 mx-8 py-2.5">
                <i class="fa-solid fa-spinner animate-spin"></i>
            </div>
            <button wire:loading.remove wire:click='updateUser' class="relative inline-flex items-center justify-center px-8 py-2.5 overflow-hidden tracking-tighter text-white bg-[#11163D] rounded-md group">
                <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-[#2e3ba3] rounded-full group-hover:w-56 group-hover:h-56"></span>
                <span class="absolute bottom-0 left-0 h-full -ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-full opacity-100 object-stretch" viewBox="0 0 487 487">
                        <path fill-opacity=".1" fill-rule="nonzero" fill="#FFF" d="M0 .3c67 2.1 134.1 4.3 186.3 37 52.2 32.7 89.6 95.8 112.8 150.6 23.2 54.8 32.3 101.4 61.2 149.9 28.9 48.4 77.7 98.8 126.4 149.2H0V.3z"></path>
                    </svg>
                </span>
                <span class="absolute top-0 right-0 w-12 h-full -mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="object-cover w-full h-full" viewBox="0 0 487 487">
                        <path fill-opacity=".1" fill-rule="nonzero" fill="#FFF" d="M487 486.7c-66.1-3.6-132.3-7.3-186.3-37s-95.9-85.3-126.2-137.2c-30.4-51.8-49.3-99.9-76.5-151.4C70.9 109.6 35.6 54.8.3 0H487v486.7z"></path>
                    </svg>
                </span>
                <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-gray-200"></span>
                <span class="relative text-base font-semibold">Guardar</span>
            </button>
        </x-slot>
    </x-dialog-modal>
</div>
