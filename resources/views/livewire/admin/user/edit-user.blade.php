<div>
    <button wire:click="$toggle('open')" class="bg-white p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <x-dialog-modal maxWidth="6xl" wire:model='open'>
        <x-slot name='title'>
            <h1 class="bg-[#11163D] w-[40%] text-white text-xl p-2 rounded-l-lg rounded-r-full uppercase">Editar Compañero</h1>
        </x-slot>
        <x-slot name='content'>
            <form>
                <div class="text-black grid grid-cols-3 gap-2">
                    <div>
                        <div class="card mx-auto">
                            <div class="bg"><img src="{{ asset('img/photo.png') }}" alt="" class="mx-auto"></div>
                            <div class="blob"></div>
                        </div>
                        <div class="">
                            <label for="nombre" class="block text-sm font-medium uppercase">Nombre</label>
                            <input type="text" id="nombre" wire:model="nombre" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="apellido" class="block text-sm font-medium uppercase">Apellidos</label>
                            <input type="text" id="apellido" wire:model="apellido" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('apellido') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="usuario" class="block text-sm font-medium uppercase">Nombre de Usuario</label>
                            <input type="text" id="usuario" wire:model="usuario" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('usuario') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <div class="">
                            <label for="outlook" class="block text-sm font-medium uppercase">Correo Outlook Corporativo</label>
                            <input type="text" id="outlook" wire:model="outlook" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('outlook') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="correo" class="block text-sm font-medium uppercase">Correo Gmail Corporativo</label>
                            <input type="text" id="correo" wire:model="correo" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('correo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="personalCorreo" class="block text-sm font-medium uppercase">Correo Personal</label>
                            <input type="text" id="personalCorreo" wire:model="personalCorreo" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('personalCorreo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="whatsAppCorporativo" class="block text-sm font-medium uppercase">Número de WhatsApp Corporativo	</label>
                            <input type="text" id="whatsAppCorporativo" wire:model="whatsAppCorporativo" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('whatsAppCorporativo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="numero" class="block text-sm font-medium uppercase">Número de WhatsApp</label>
                            <input type="text" id="numero" wire:model="numero" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('numero') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="cloud" class="block text-sm font-medium uppercase">Número de Cloudtalk</label>
                            <input type="text" id="cloud" wire:model="cloud" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                            @error('cloud') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <div class="">
                            <label for="pais" class="block text-sm font-medium uppercase">País de residencia</label>
                            <select name="pais" id="pais" wire:model="pais" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                                <option value="" class="text-gray-500">Selecciona una ubicación</option>
                                @foreach($paisOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $pais == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('pais') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="ubicacion" class="block text-sm font-medium uppercase">Oficina a la que Perteneces</label>
                            <select name="ubicacion" id="ubicacion" wire:model="ubicacion" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                                <option value="" class="text-gray-500">Selecciona una ubicación</option>
                                @foreach($ubicacionOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $ubicacion == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('ubicacion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="area" class="block text-sm font-medium uppercase">Área a la que pertenece</label>
                            <select name="area" id="area" wire:model="area" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                                <option value="" class="text-gray-500">Selecciona una ubicación</option>
                                @foreach($areaOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $area == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('area') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="etiqueta" class="block text-sm font-medium uppercase">Departamento</label>
                            <select name="etiqueta" id="etiqueta" wire:model="etiqueta" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                                <option value="" class="text-gray-500">Selecciona una etiqueta</option>
                                @foreach($etiquetaOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $etiqueta == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('etiqueta') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="modalidad" class="block text-sm font-medium uppercase">Modalidad</label>
                            <select name="modalidad" id="modalidad" wire:model="modalidad" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                                <option value="" class="text-gray-500">Selecciona una modalidad</option>
                                @foreach($modalidadOptions as $value => $label)
                                    <option value="{{ $value }}" {{ $modalidad == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('modalidad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="perfil" class="block text-sm font-medium uppercase">Tipo de Perfil</label>
                            <select name="perfil" id="perfil" wire:model="perfil" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                                <option value="">Selecciona un tipo de perfil</option>
                                @foreach($perfilOptions as $id => $name)
                                    <option value="{{ $id }}" {{ $perfil == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('perfil') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                </div>
            </form>

        </x-slot>
        <x-slot name='footer'>
            <div wire:loading class="px-8 mx-8 py-2.5">
                <i class="fa-solid fa-spinner animate-spin"></i>
            </div>
            <button wire:loading.remove wire:click='updateUser' class="relative inline-flex items-center justify-center px-8 mx-8 py-2.5 overflow-hidden tracking-tighter text-white bg-[#11163D] rounded-md group">
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
            {{-- botón cerrar modal --}}
            <x-close />
            {{-- botón cerrar modal --}}

        </x-slot>
    </x-dialog-modal>
</div>
