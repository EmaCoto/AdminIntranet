<x-app-layout>
    <x-content class="overflow-hidden p-8 mx-auto">
            
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
                    <p class="text-sm text-gray-600 mt-1">Edita la información del colaborador y agrega su correo electrónico corporativo (Gmail).</p>
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
                    <p class="text-sm text-gray-600 mt-1">Crea al usuario en la Intranet y lo elimina de la tabla<br><a href="{{ route('customer-register') }}" class="hover:text-red-600 text-red-800 underline">¿Cómo registro en intranet?</a></p>
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

        <div>
            <h2 class="text-2xl font-semibold text-center text-[#152B59] uppercase">¡Genera solicitudes!</h2>
            <p class="text-center px-10">Este espacio está destinado para asignar un correo a los nuevos colaboradores de la compañía, facilitando su integración y comunicación desde el primer día.</p>            
        </div>
        <livewire:ingreso-nuevo-table />
    </x-content>
</x-app-layout>