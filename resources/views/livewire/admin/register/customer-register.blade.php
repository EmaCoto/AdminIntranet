<x-content>

    <!-- Instrucciones paso a paso -->
    <div class="my-4 mb-14">
        <h2 class="text-2xl font-semibold mb-6 text-center text-[#152B59] uppercase">Flujo de Registro de Colaboradores</h2>
        
        <div class="flex justify-center space-x-2 p-2">
            <!-- Paso 1: Gestión Humana ingresa un usuario -->
            <div class="text-center p-3 w-[250px] shadow-md bg-white rounded-lg relative">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('img/icon/profile.png') }}" alt="" class="w-10 h-10 mr-2">
                </div>
                <h3 class="text-lg font-semibold leading-4">Gestión Humana ingresa colaborador</h3>
                <p class="text-sm text-gray-600 mt-1">Ingresa los datos básicos del colaborador, como nombre y apellido completo.</p>
                <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">1</p>
            </div>
            
            <!-- Flecha -->
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/icon/right-arrow.png') }}" alt="" class="w-12 h-12 mr-2">
            </div>

            <!-- Paso 2: Sistemas edita el usuario y agrega el Gmail -->
            <div class="text-center p-3 w-[250px] shadow-md bg-white rounded-lg relative">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('img/icon/edit.png') }}" alt="" class="w-10 h-10 mr-2">
                </div>
                <h3 class="text-lg font-semibold leading-4">Sistemas edita y agrega el Gmail</h3>
                <p class="text-sm text-gray-600 mt-1">Edita la información del usuario y agrega su correo electrónico corporativo (Gmail).</p>
                <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">2</p>
            </div>

            <!-- Flecha -->
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/icon/right-arrow.png') }}" alt="" class="w-12 h-12 mr-2 transform scale-y-[-1]">
            </div>

            <!-- Paso 3: Gestión Humana crea y elimina un usuario -->
            <div class="text-center p-3 w-[250px] shadow-md bg-white rounded-lg relative">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('img/icon/register.png') }}" alt="" class="w-10 h-10 mr-2">
                </div>
                <h3 class="text-lg font-semibold leading-4">Gestión Humana crea y elimina usuario</h3>
                <p class="text-sm text-gray-600 mt-1">Crea al usuario en la Intranet y lo elimina de la <a href="#tabla-gmail-corpo" class="hover:text-red-600 text-red-800 underline">tabla</a></p>
                <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">3</p>
            </div>

            <!-- Flecha -->
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/icon/right-arrow.png') }}" alt="" class="w-12 h-12 mr-2">
            </div>

            <!-- Paso 4: Completar datos personales y corporativos -->
            <div class="text-center p-3 w-[250px] shadow-md bg-white rounded-lg relative">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('img/icon/registered.png') }}" alt="" class="w-10 h-10 mr-2">
                </div>
                <h3 class="text-lg font-semibold leading-4">Completar los datos del colaborador</h3>
                <p class="text-sm text-gray-600 mt-1">Gestión Humana y Sistemas completan todos los datos de cada <a href="{{ route('vacio') }}" class="hover:text-red-600 text-red-800 underline">nuevo colaborador.</a></p>
                <p class="absolute z-10 text-lg font-bold -right-2 -top-2 w-8 h-8 bg-[#B23B3B] rounded-full text-white flex items-center justify-center">4</p>
            </div>
        </div>
    </div>

    <h2 class="text-2xl font-semibold text-center text-[#152B59] uppercase">¡Empezar a registar!</h2>

    <livewire:ingreso-nuevo-table />
    
    <div class="w-full h-full flex items-center justify-center">
        <x-validation-errors class="p-3" />
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
