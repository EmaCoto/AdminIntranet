<div class="flex w-full bg-[#11163D]">
    <x-aside />
    <div class="w-[85%] p-2 border-l border-gray-200">
        <x-search-admin />

        <div class="overflow-hidden h-[100vh] rounded-lg border border-gray-200">
            <div class="overflow-y-scroll h-full custom-scroll">
                {{ $slot }}
            </div>
        </div>
    </div>
    <style>
        .custom-scroll {
            scrollbar-width: thin; /* Firefox */
            scrollbar-color: transparent transparent; /* Firefox */
        }

        /* Para navegadores WebKit (Chrome, Safari) */
        .custom-scroll::-webkit-scrollbar {
            width: 0; /* Ocultar la barra de desplazamiento */
            background: transparent; /* Fondo transparente */
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent; /* Fondo transparente para el track */
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background-color: transparent; /* Color transparente para el thumb */
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background-color: transparent; /* Color transparente al pasar el ratón (opcional) */
        }
    </style>
</div>


