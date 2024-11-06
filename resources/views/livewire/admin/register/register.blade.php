<x-content>
    <h1 class="font-extrabold text-center text-gray-50 uppercase text-4xl mt-3">¿Quiéres hacer un nuevo registro?</h1>
    <div class="flex items-center">
        <div class="flex-grow border-t border-gray-300"></div>
        <span class="mx-4 text-xl font-bold text-[#B33031]">Elige el formulario</span>
        <div class="flex-grow border-t border-gray-300"></div>
    </div>

    <div class="h-[80%] items-center mx-auto justify-center">
        <div class="grid grid-cols-2">
            <div class="relative duration-300 m-10 mx-auto group border-sky-900 border-4  overflow-hidden rounded-2xl h-64 w-80 bg-white p-5 flex flex-col items-start gap-3 shadow-xl hover:shadow-gray-700 hover:-translate-y-1">
                <div class="text-[#B33031]">
                  <p class="text-2xl font-bold">Administrador</p>
                </div>
                <a href="{{ route('admin-register') }}" class="duration-300 hover:bg-gray-50 hover:border hover:border-[#B33031] hover:text-[#B33031] bg-[#B33031] font-semibold text-white px-3 py-2 flex items-center gap-3 rounded-lg">Registrar
                    <i class="fa-solid fa-user-plus"></i>
                </a>
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="group-hover:scale-125 duration-500 absolute -bottom-0.5 -right-24 w-48 h-48 z-10 -my-2  fill-gray-50 stroke-sky-900"><path stroke-width="5" stroke-miterlimit="10" d="M 50.4 51 C 40.5 49.1 40 46 40 44 v -1.2 a 18.9 18.9 0 0 0 5.7 -8.8 h 0.1 c 3 0 3.8 -6.3 3.8 -7.3 s 0.1 -4.7 -3 -4.7 C 53 4 30 0 22.3 6 c -5.4 0 -5.9 8 -3.9 16 c -3.1 0 -3 3.8 -3 4.7 s 0.7 7.3 3.8 7.3 c 1 3.6 2.3 6.9 4.7 9 v 1.2 c 0 2 0.5 5 -9.5 6.8 S 2 62 2 62 h 60 a 14.6 14.6 0 0 0 -11.6 -11 z" data-name="layer1"></path></svg>
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="group-hover:scale-125 duration-200 absolute -bottom-0.5 -right-24 w-48 h-48 z-10 -my-2  fill-gray-50 stroke-sky-700"><path stroke-width="2" stroke-miterlimit="10" d="M 50.4 51 C 40.5 49.1 40 46 40 44 v -1.2 a 18.9 18.9 0 0 0 5.7 -8.8 h 0.1 c 3 0 3.8 -6.3 3.8 -7.3 s 0.1 -4.7 -3 -4.7 C 53 4 30 0 22.3 6 c -5.4 0 -5.9 8 -3.9 16 c -3.1 0 -3 3.8 -3 4.7 s 0.7 7.3 3.8 7.3 c 1 3.6 2.3 6.9 4.7 9 v 1.2 c 0 2 0.5 5 -9.5 6.8 S 2 62 2 62 h 60 a 14.6 14.6 0 0 0 -11.6 -11 z" data-name="layer1"></path></svg>
            </div>
            <div class="relative duration-300 m-10 mx-auto group border-sky-900 border-4  overflow-hidden rounded-2xl h-64 w-80 bg-white p-5 flex flex-col items-start gap-3 shadow-xl hover:shadow-gray-700 hover:-translate-y-1">
                <div class="text-[#B33031] w-full text-right">
                  <p class="text-2xl font-bold">Empleado</p>
                </div>
                <div class="flex justify-end w-full">
                    <a href="{{ route('customer-register') }}" class="duration-300 hover:bg-gray-50 hover:border hover:border-[#B33031] hover:text-[#B33031] bg-[#B33031] font-semibold text-white px-3 py-2 flex items-center gap-3 rounded-lg">Registrar
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                </div>
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="group-hover:scale-125 duration-500 absolute -bottom-0.5 -left-24 w-48 h-48 z-10 -my-2  fill-gray-50 stroke-sky-900"><path stroke-width="5" stroke-miterlimit="10" d="M 50.4 51 C 40.5 49.1 40 46 40 44 v -1.2 a 18.9 18.9 0 0 0 5.7 -8.8 h 0.1 c 3 0 3.8 -6.3 3.8 -7.3 s 0.1 -4.7 -3 -4.7 C 53 4 30 0 22.3 6 c -5.4 0 -5.9 8 -3.9 16 c -3.1 0 -3 3.8 -3 4.7 s 0.7 7.3 3.8 7.3 c 1 3.6 2.3 6.9 4.7 9 v 1.2 c 0 2 0.5 5 -9.5 6.8 S 2 62 2 62 h 60 a 14.6 14.6 0 0 0 -11.6 -11 z" data-name="layer1"></path></svg>
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="group-hover:scale-125 duration-200 absolute -bottom-0.5 -left-24 w-48 h-48 z-10 -my-2  fill-gray-50 stroke-sky-700"><path stroke-width="2" stroke-miterlimit="10" d="M 50.4 51 C 40.5 49.1 40 46 40 44 v -1.2 a 18.9 18.9 0 0 0 5.7 -8.8 h 0.1 c 3 0 3.8 -6.3 3.8 -7.3 s 0.1 -4.7 -3 -4.7 C 53 4 30 0 22.3 6 c -5.4 0 -5.9 8 -3.9 16 c -3.1 0 -3 3.8 -3 4.7 s 0.7 7.3 3.8 7.3 c 1 3.6 2.3 6.9 4.7 9 v 1.2 c 0 2 0.5 5 -9.5 6.8 S 2 62 2 62 h 60 a 14.6 14.6 0 0 0 -11.6 -11 z" data-name="layer1"></path></svg>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="h-full flex flex-col text-center text-gray-50 px-10">
                <h2 class="font-bold text-2xl">Agregar Administrador a la Plataforma</h2>
                <p class="text-gray-400">"Añade un perfil de administrador. Completa los datos necesarios para activar el acceso y permisos en el sistema."</p>
            </div>
            <div class="h-full flex flex-col text-center text-gray-50 px-10">
                <h2 class="font-bold text-2xl">Registrar Nuevo Empleado</h2>
                <p class="text-gray-400">"Introduce los datos necesarios para añadir un nuevo empleado a la empresa y facilitar su acceso al sistema."</p>
            </div>
        </div>
    </div>
</x-content>
