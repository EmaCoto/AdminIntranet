<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hurus') }}</title>

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('img/favicon.webp') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- FullCalendar CSS -->
        <link rel="stylesheet" href="https://lottie.host/56473283-3a82-4839-aa5a-b818f03b63c6/5dzOWXPXpa.lottie">

        <!-- Scripts -->     
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
            /* Estilos del loader */
            #preloader {
                position: fixed;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.9);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
            }
            .spinner {
                border: 5px solid #ccc;
                border-top: 5px solid #007bff;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Loader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>

        <x-banner />

        <div class="bg-[#F1F3F5]">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gradient-to-b from-[#152B59] to-[#2973B2] shadow hidden md:block">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class=" flex justify-center">
                {{ $slot }}
            </main>
            
            <footer class="items-center bg-[#F1F3F5]">
                <!-- Logo -->
                <div class="bg-gradient-to-b from-[#152B59] to-[#2973B2] shrink-0 flex flex-col items-center mx-auto py-4">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                    <p class="flex items-center h-full text-xl font-bold text-[#D4B26A] uppercase italic text-center">"somos personas ayudando personas"</p>
                </div>
                <p class="flex justify-center text-sm bg-gradient-to-b from-[#2973B2] to-[#152B59] text-white py-1">© 2025 Hurus | Todos los derechos reservados.</span>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toggles = document.querySelectorAll('[data-toggle]');
            
                toggles.forEach(toggle => {
                    toggle.addEventListener('click', (event) => {
                        event.stopPropagation(); // Evita que el evento cierre otros niveles
            
                        const targetId = toggle.getAttribute('data-target');
                        const list = document.getElementById(targetId);
                        const icon = toggle.querySelector('.arrow-icon');
            
                        const isCurrentlyVisible = !list.classList.contains('hidden');
            
                        // Si ya está visible, lo cerramos
                        if (isCurrentlyVisible) {
                            closeMenu(list);
                            return;
                        }
            
                        // Cerramos solo los menús del mismo nivel
                        const parentUl = toggle.closest("ul");
                        closeMenusAtLevel(parentUl);
            
                        // Abrimos el nuevo menú
                        list.classList.remove('hidden');
                        icon?.classList.add('up');
                        toggle.classList.add('active');
                    });
                });
            
                // Función para cerrar un menú y sus submenús
                function closeMenu(menu) {
                    menu.classList.add('hidden');
                    const toggleButton = document.querySelector(`[data-target="${menu.id}"]`);
                    toggleButton?.classList.remove('active');
                    toggleButton?.querySelector('.arrow-icon')?.classList.remove('up');
            
                    // Cierra también los submenús dentro de este
                    menu.querySelectorAll("ul").forEach(subMenu => closeMenu(subMenu));
                }
            
                // Cierra solo los menús del mismo nivel sin afectar subniveles abiertos
                function closeMenusAtLevel(parentUl) {
                    parentUl.querySelectorAll("ul").forEach(menu => {
                        closeMenu(menu);
                    });
                }
            
                // Cerrar solo los menús desplegables al hacer clic fuera, pero NO el aside
                document.addEventListener('click', (event) => {
                    const aside = document.querySelector('aside'); // Ajusta este selector según tu estructura
                    if (!aside.contains(event.target)) {
                        document.querySelectorAll('.ul-nav ul').forEach(menu => closeMenu(menu));
                    }
                });
            });
        </script>

        <script>
            // Oculta el loader cuando la página se ha cargado
            window.onload = function() {
                document.getElementById("preloader").style.display = "none";
            };

            // Muestra el loader antes de cambiar de página
            window.addEventListener("beforeunload", function() {
                document.getElementById("preloader").style.display = "flex";
            });
        </script>
        
    </body>
</html>