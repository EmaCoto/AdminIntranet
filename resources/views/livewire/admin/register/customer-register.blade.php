<x-content>
<!-- Instrucciones paso a paso -->
<div class="my-4">
    <h2 class="text-2xl font-semibold mb-6 text-center text-[#152B59] uppercase">
        Flujo para Registrar un Colaborador
    </h2>

    <div class="flex justify-center space-x-6 p-4">
        <!-- Paso 1: Verificar nombre y correo -->
        <div class="text-center p-2 w-[250px] shadow-md bg-white rounded-lg relative">
            <div class="flex justify-center mb-3">
                <img src="{{ asset('img/icon/profile.png') }}" alt="" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-semibold leading-5">Verificar Nombre y Correo</h3>
            <p class="text-sm text-gray-600 mt-2">Verifica el nombre y correo del colaborador en la <a href="{{ route('solicitud-gmail') }}" class="hover:text-red-600 text-red-800 underline">tabla de correos.</a></p>
            <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">1</p>
        </div>

        <!-- Flecha -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('img/icon/right-arrow.png') }}" alt="" class="w-12 h-12">
        </div>

        <!-- Paso 2: Completar campos -->
        <div class="text-center p-2 w-[250px] shadow-md bg-white rounded-lg relative">
            <div class="flex justify-center mb-3">
                <img src="{{ asset('img/icon/edit.png') }}" alt="" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-semibold leading-5">Completar Nombre y Correo</h3>
            <p class="text-sm text-gray-600 mt-2">Llena los campos con nombre completo, apellido y correo electrónico.</p>
            <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">2</p>
        </div>

        <!-- Flecha -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('img/icon/right-arrow.png') }}" alt="" class="w-12 h-12 transform scale-y-[-1]">
        </div>

        <!-- Paso 3: Extraer nombre de usuario -->
        <div class="text-center p-2 w-[250px] shadow-md bg-white rounded-lg relative">
            <div class="flex justify-center mb-3">
                <img src="{{ asset('img/icon/register.png') }}" alt="" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-semibold leading-5">Extraer Nombre de Usuario</h3>
            <p class="text-sm text-gray-600 mt-2">Usa el nombre de usuario que aparece antes del "@" en el correo. <br><span class="font-bold"> Ej: polayaims</span></p>
            <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">3</p>
        </div>

        <!-- Flecha -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('img/icon/right-arrow.png') }}" alt="" class="w-12 h-12">
        </div>

        <!-- Paso 4: Registrar -->
        <div class="text-center p-2 w-[250px] shadow-md bg-white rounded-lg relative">
            <div class="flex justify-center mb-3">
                <img src="{{ asset('img/icon/registered.png') }}" alt="" class="w-12 h-12">
            </div>
            <h3 class="text-lg font-semibold leading-5">Hacer Clic en Registrar</h3>
            <p class="text-sm text-gray-600 mt-2">Haz clic en el botón <span class="font-semibold">Registrar</span> para finalizar el proceso.</p>
            <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">4</p>
        </div>
    </div>
</div>

    

    <div class="w-full h-full flex items-center justify-center">
        <form wire:submit.prevent="createUser" class="bg-gray-200 p-10 rounded-lg w-[85%]">
            <h1 class="mb-10 text-3xl font-extrabold text-center">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D] uppercase">
                    Registrar Nuevo Usuario en Intranet
                </span>
            </h1>
            
            <x-validation-errors class="p-3" />
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for="first_name" value="Nombres" />
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
                        <x-input id="user_pass" class="block mt-1 w-full" type="password" wire:model.defer="user_pass" required autocomplete="new-password" />                 
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
