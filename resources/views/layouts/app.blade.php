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
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased overflow-hidden">
        <x-banner />

        <div class="min-h-screen bg-gradient-to-b from-[#11163D] via-[#1c2464] to-[#1c2464]">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toggles = document.querySelectorAll('[data-toggle]');
          
                toggles.forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const targetId = toggle.getAttribute('data-target');
                        const list = document.getElementById(targetId);
                        const icon = toggle.querySelector('.arrow-icon');
          
                        // Toggle visibility and apply smooth height transition
                        if (list.classList.contains('hidden')) {
                            list.classList.remove('hidden');
                            list.classList.add('visible');
                            icon.classList.add('up');
                            toggle.classList.add('active');
                        } else {
                            list.classList.add('hidden');
                            list.classList.remove('visible');
                            icon.classList.remove('up');
                            toggle.classList.remove('active');
                        }
                    });
                });
            });
        </script>
        
    </body>
</html>
