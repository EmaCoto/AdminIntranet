<x-content>
    <x-validation-errors class="p-3" />
    <div class="w-full h-full flex items-center justify-center">
        <form wire:submit.prevent="createUser" class="bg-gray-200 p-10 rounded-lg w-[85%]">
            <h1 class="mb-10 text-3xl font-extrabold text-center">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D] uppercase">
                    Registrar Nuevo Usuario en Intranet
                </span>
            </h1>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for="first_name" value="Nombre" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" wire:model="first_name" required />
                </div>
                <div>
                    <x-label for="last_name" value="Apellidos" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" wire:model="last_name" required />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for="user_login" value="Nombre de Usuario" />
                    <x-input id="user_login" class="block mt-1 w-full" type="text" wire:model="user_login" required />
                </div>
                <div>
                    <x-label for="user_email" value="Correo Electrónico" />
                    <x-input id="user_email" class="block mt-1 w-full" type="email" wire:model="user_email" required />
                </div>

                <div class="">
                    <x-label for="user_pass" value="Contraseña" />
                    <div class="flex gap-2">
                        <x-input id="user_pass" class="block mt-1 w-full" type="password" wire:model.defer="user_pass" required />                 
                    </div>
                </div>

                <div class="flex gap-x-2 mt-6">
                    <button type="button" id="generate-password-btn" class="cursor-pointer bg-white relative inline-flex items-center justify-center gap-2 text-sm font-medium ring-offset-background transition focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50 hover:text-[#B33031] h-9 rounded-md px-3 hover:-translate-y-0.5 duration-300 ease-in-out border border-[#B33031]">
                        <i class="fa-solid fa-lock-open text-[#B33031]"></i>
                        Generar contraseña
                    </button>
                    <button type="button" id="toggle-password-btn" class="cursor-pointer bg-white relative inline-flex items-center justify-center gap-2 text-sm font-medium ring-offset-background transition focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50 hover:bg-[#F5F5F5] hover:text-[#B33031] h-9 rounded-md px-3 hover:-translate-y-0.5 duration-300 ease-in-out border hover:border-[#B33031]">
                        <i class="fa-solid fa-eye-low-vision"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-button class="ms-4">
                    {{ __('Registrar Usuario') }}
                </x-button>
            </div>

            @if (session()->has('message'))
                <div class="mt-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function generatePassword(length = 12) {
                const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
                return Array.from({ length }, () => chars[Math.floor(Math.random() * chars.length)]).join('');
            }

            document.getElementById("generate-password-btn").addEventListener("click", function () {
                const newPassword = generatePassword();

                document.getElementById("user_pass").value = newPassword;
                document.getElementById("user_pass").dispatchEvent(new Event("input"));

                Livewire.emit('setPassword', newPassword);
            });

            document.getElementById("toggle-password-btn").addEventListener("click", function () {
                const passField = document.getElementById("user_pass");
                const toggleBtn = document.getElementById("toggle-password-btn");

                if (passField.type === "password") {
                    passField.type = "text";
                    toggleBtn.innerHTML = `<i class="fa-solid fa-eye"></i>`;
                } else {
                    passField.type = "password";
                    toggleBtn.innerHTML = `<i class="fa-solid fa-eye-low-vision"></i>`;
                }
            });
        });
    </script>
</x-content>
