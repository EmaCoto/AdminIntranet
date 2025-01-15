<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error | 404</title>

    <link rel="icon" href="{{ asset('img/logo_ims.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body>
    <div class="w-full min-h-screen relative">
        <img src="{{ asset('img/404_error.png') }}" alt="" class="bg-cover bg-center w-full h-[100vh]">
        <p class="absolute top-5 text-center w-full "> <span class="p-2 px-8 rounded-2xl text-[#B23B3B] text-7xl font-extrabold uppercase">Página no encontrada</span> </p>
        <div class="absolute bottom-9 text-center w-full flex justify-center gap-3">
            <a href="/" class="p-2 px-8 bg-[#B23B3B] bg-opacity-90 rounded-2xl text-white text-3xl font-extrabold uppercase hover:scale-105 duration-300 ease-in-out"> <i class="fa-solid fa-arrow-turn-down rotate-90 mr-5 items-center h-full"></i>Volver</a>
        </div>

    </div>
    
    @livewireScripts
</body>
</html>