<x-content>
    <div class="w-full h-full flex items-center justify-center">
        <form wire:submit.prevent="createUser" class="bg-gray-200 p-10 rounded-lg w-[85%]">
            <h1 class="mb-10 text-3xl font-extrabold text-center">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D] uppercase">
                    Registrar Nuevo Usuario en Intranet
                </span>
            </h1>

            <!-- 👤 DATOS PERSONALES -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for="first_name" value="Nombre" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" wire:model="first_name" required autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" />
                </div>
                <div>
                    <x-label for="last_name" value="Apellidos" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" wire:model="last_name" required autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" />
                </div>
            </div>

            <!-- 🏆 DATOS PRINCIPALES -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for="user_login" value="Nombre de Usuario" />
                    <x-input id="user_login" class="block mt-1 w-full" type="text" wire:model="user_login" required autofocus autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" />
                </div>
                <div>
                    <x-label for="user_email" value="Correo Electrónico" />
                    <x-input id="user_email" class="block mt-1 w-full" type="email" wire:model="user_email" required autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" />
                </div>
                <div>
                    <x-label for="user_pass" value="Contraseña" />
                    <x-input id="user_pass" class="block mt-1 w-full" type="password" wire:model="user_pass" required autocomplete="new-password" />
                </div>
            </div>

            <!-- 🚀 BOTÓN DE REGISTRO -->
            <div class="flex items-center justify-end mt-6">
                <div wire:loading class="px-8 mx-8 py-2.5">
                    <i class="fa-solid fa-spinner animate-spin"></i>
                </div>
                <div wire:loading.remove>
                    <x-button class="ms-4">
                        {{ __('Registrar Usuario') }}
                    </x-button>
                </div>
            </div>

            <!-- ✅ MENSAJES DE ÉXITO Y ERROR -->
            @if (session()->has('message'))
                <div class="mt-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />
        </form>
    </div>
</x-content>