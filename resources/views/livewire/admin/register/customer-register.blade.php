<x-content>
    <x-validation-errors class="mb-4" />

    <div class="w-[60%] mx-auto h-full flex items-center">
        <form wire:submit.prevent="createUser" class="bg-gray-50 px-10 pb-10 rounded-lg">
            <!-- Indicador de encabezado -->
            <div class="relative bg-red-500 text-white font-bold text-center w-6 h-10 mb-4">
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1 w-0 h-0 border-l-[12px] border-l-transparent border-r-[12px] border-r-transparent border-t-[10px] border-t-red-500"></div>
            </div>

            <!-- Título de la forma -->
            <h1 class="mb-10 text-3xl font-extrabold text-center">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D] uppercase">Registrar Nuevo Empleado</span>
            </h1>

            <!-- Campos del formulario -->
            <div>
                <div>
                    <x-label for="user_login" value="Usuario" />
                    <x-input id="user_login" class="block mt-1 w-full" type="text" wire:model="user_login" required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="user_email" value="Correo Electrónico" />
                    <x-input id="user_email" class="block mt-1 w-full" type="email" wire:model="user_email" required />
                </div>
                <div class="mt-4">
                    <x-label for="user_pass" value="Contraseña" />
                    <x-input id="user_pass" class="block mt-1 w-full" type="password" wire:model="user_pass" required />
                </div>
                <div class="mt-4">
                    <x-label for="user_nicename" value="Nombre Completo" />
                    <x-input id="user_nicename" class="block mt-1 w-full" type="text" wire:model="user_nicename" required />
                </div>
                <div class="mt-4">
                    <x-label for="user_url" value="Sitio Web (opcional)" />
                    <x-input id="user_url" class="block mt-1 w-full" type="url" wire:model="user_url" />
                </div>
                <div class="mt-4">
                    <x-label for="display_name" value="Nombre para Mostrar" />
                    <x-input id="display_name" class="block mt-1 w-full" type="text" wire:model="display_name" required />
                </div>
            </div>

            <!-- Botón de registro y mensaje de éxito -->
            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
            @if (session()->has('message'))
                <div class="mt-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif
        </form>
    </div>
</x-content>
