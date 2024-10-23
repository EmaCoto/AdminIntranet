<div>
    <button wire:click="$toggle('open')" class="bg-gray-100 p-1 text-[#11163D] text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <x-dialog-modal maxWidth="5xl" wire:model='open'>
        <x-slot name='title'>
            <h1 class="bg-[#11163D] w-[40%] text-white text-xl p-2 rounded-l-lg rounded-r-full uppercase">Editar Compañero</h1>
        </x-slot>
        <x-slot name='content'>
            <form class="text-black grid grid-cols-2 gap-2">
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium uppercase">Nombre</label>
                    <input type="text" id="nombre" wire:model="nombre" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="apellido" class="block text-sm font-medium uppercase">Apellidos</label>
                    <input type="text" id="apellido" wire:model="apellido" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('apellido') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="etiqueta" class="block text-sm font-medium uppercase">Departamento</label>
                    <select name="etiqueta" id="etiqueta" wire:model="etiqueta" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                        <option value="" class="text-gray-500">Selecciona una etiqueta</option>
                        @foreach($etiquetaOptions as $value => $label)
                            <option value="{{ $value }}" {{ $etiqueta == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('etiqueta') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="usuario" class="block text-sm font-medium uppercase">Nombre de Usuario</label>
                    <input type="text" id="usuario" wire:model="usuario" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('usuario') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ubicacion" class="block text-sm font-medium uppercase">Ubicación</label>
                    <select name="ubicacion" id="ubicacion" wire:model="ubicacion" class="block w-full mt-1 bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                        <option value="" class="text-gray-500">Selecciona una ubicación</option>
                        @foreach($ubicacionOptions as $value => $label)
                            <option value="{{ $value }}" {{ $ubicacion == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('ubicacion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="cloud" class="block text-sm font-medium uppercase">Número de Cloudtalk</label>
                    <input type="text" id="cloud" wire:model="cloud" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('cloud') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="numero" class="block text-sm font-medium uppercase">Número de WhatsApp</label>
                    <input type="text" id="numero" wire:model="numero" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('numero') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="correo" class="block text-sm font-medium uppercase">Correo Corporativo</label>
                    <input type="text" id="correo" wire:model="correo" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('correo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium uppercase">Fecha de Cumpleaños</label>
                    <input type="datetime" id="date" wire:model="date" class="mt-1 block w-full p-2 border bg-gray-300 focus:bg-white rounded-md shadow-sm focus:ring-[#11163D]">
                    @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                @if (session()->has('message'))
                    <div class="text-green-500 mt-3">
                        {{ session('message') }}
                    </div>
                @endif
            </form>

        </x-slot>
        <x-slot name='footer'>
            <button wire:click='updateUser' class="bg-[#11163D] rounded-lg px-6 py-1 text-white text-lg mx-2">Editar</button>
            <button wire:click='$toggle("open")' class="bg-gray-600 rounded-lg px-6 py-1 text-white text-lg mx-2">Cerrar</button>
        </x-slot>
    </x-dialog-modal>
</div>
