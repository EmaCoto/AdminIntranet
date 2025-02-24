<div>
    <button id="clearCacheButton" class="bg-white text-center w-48 rounded-2xl h-10 relative text-black text-xs font-semibold group items-center">
        <!-- Contenedor del ícono con efecto hover -->
        <span class="bg-[#2973B2] rounded-xl h-8 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500">
            <i class="fa-solid fa-broom text-white"></i>
        </span>
    
        <!-- Texto del botón -->
        <p class="translate-x-2">Limpiar memoria</p>
    
        <script>
            document.getElementById('clearCacheButton').addEventListener('click', function(){
                fetch("{{ route('cache.clear') }}")
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title: "¡Éxito!",
                            text: data.message,
                            icon: "success",
                            confirmButtonText: "OK",
                            timer: 3000,
                            timerProgressBar: true
                        });
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo limpiar la caché",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    });
            });
        </script>
    </button>
</div>