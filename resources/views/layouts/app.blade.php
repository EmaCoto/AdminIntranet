<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hurus') }}</title>

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('img/logo_ims.webp') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="bg-[#F1F3F5]">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gradient-to-b from-[#152B59] to-[#2973B2] shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/@panzoom/panzoom@4.0.0/dist/panzoom.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const organigramaContainer = document.querySelector('.organigrama-container');
                const panzoomInstance = Panzoom(organigramaContainer, {
                    maxScale: 3, // Zoom máximo
                    minScale: 0.5, // Zoom mínimo
                    contain: 'outside' // Permite desplazarse fuera del contenedor
                });

                // Permitir el zoom con la rueda del mouse
                organigramaContainer.parentElement.addEventListener('wheel', panzoomInstance.zoomWithWheel);
            });
        </script>

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
        
    </body>
</html>