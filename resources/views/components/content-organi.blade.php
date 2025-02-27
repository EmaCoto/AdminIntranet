<div class="flex w-full bg-[#fafbfd]">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="text-white leading-tight px-64 flex p-5">
                <span class="mr-1">Bienvenido:</span>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
            </div>

            <x-limpiar-cache />
        </div>
    </x-slot>

    <x-aside />

    <div class="w-[85%] p-2 border-l">
        <div class="h-[80vh] w-full rounded-lg border relative flex justify-center items-center bg-white overflow-hidden bg-cover bg-center p-10" style="background-image: url('{{ asset('img/cuadricula.webp') }}');">

            <!-- Controles de Zoom -->
            <div class="absolute top-4 left-4 z-50 bg-white p-2 rounded-lg shadow-md flex gap-2">
                <button id="zoom-in" class="px-3 py-1 bg-[#152B59] text-white rounded"><i class="fa-solid fa-plus"></i></button>
                <button id="zoom-out" class="px-3 py-1 bg-[#B23B3B] text-white rounded"><i class="fa-solid fa-minus"></i></button>
                <button id="reset" class="px-3 py-1 bg-gray-500 text-white rounded"><i class="fa-solid fa-arrows-spin"></i></button>
            </div>

            <!-- Contenedor PANZOOM (sin scroll y centrado) -->
            <div id="panzoom-container" class="relative w-full h-full overflow-hidden cursor-grab">
                <div id="panzoom-content" class="absolute w-[3000px] h-[2000px] flex justify-center items-center">
                    <div id="organigram" class="scale-1">
                        {{ $slot }} <!-- Aquí va el organigrama -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Script de Panzoom -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const panzoomElement = document.getElementById("panzoom-content");
        const organigram = document.getElementById("organigram");
        const container = document.getElementById("panzoom-container");

        if (!panzoomElement || !container || !organigram) return;

        // **Ajustar dinámicamente el tamaño del panzoom-content al contenido real**
        function adjustPanzoomSize() {
            panzoomElement.style.width = `${organigram.offsetWidth + 100}px`; // Un poco más grande para margen
            panzoomElement.style.height = `${organigram.offsetHeight + 100}px`;
        }

        // **Llamamos a la función antes de iniciar Panzoom**
        adjustPanzoomSize();

        // **Centramos el organigrama en la vista**
        const startX = (container.clientWidth - panzoomElement.clientWidth) / 2;
        const startY = (container.clientHeight - panzoomElement.clientHeight) / 2;
        panzoomElement.style.transform = `translate(${startX}px, ${startY}px) scale(1)`;

        const panzoom = Panzoom(panzoomElement, {
            maxScale: 1,
            minScale: 0.6,
            startScale: 0.5,
            startX: startX,
            startY: startY,
            bounds: false, // Permite moverse libremente sin límites artificiales
            boundsPadding: 0,
            setTransform: (elem, { scale, x, y }) => {
                elem.style.transform = `translate(${x}px, ${y}px) scale(${scale})`;
            }
        });

        // **Bloqueamos el scroll dentro del contenedor**
        container.style.overflow = "hidden";

        // **Permitir zoom con la rueda del mouse**
        container.addEventListener("wheel", (event) => {
            event.preventDefault(); // Evita el scroll en la página
            panzoom.zoomWithWheel(event);
        });

        // **Botones de control**
        document.getElementById("zoom-in").addEventListener("click", () => panzoom.zoomIn());
        document.getElementById("zoom-out").addEventListener("click", () => panzoom.zoomOut());
        document.getElementById("reset").addEventListener("click", () => {
            panzoom.reset();
            adjustPanzoomSize(); // Asegurar que se ajuste de nuevo tras el reset
            panzoomElement.style.transform = `translate(${startX}px, ${startY}px) scale(1)`;
        });

        // **Arrastrar con el mouse sin restricciones**
        let isDragging = false;
        let lastX, lastY;

        container.addEventListener("mousedown", (e) => {
            isDragging = true;
            lastX = e.clientX;
            lastY = e.clientY;
            container.style.cursor = "grabbing";
        });

        document.addEventListener("mousemove", (e) => {
            if (!isDragging) return;
            const dx = e.clientX - lastX;
            const dy = e.clientY - lastY;
            panzoom.pan(dx, dy);
            lastX = e.clientX;
            lastY = e.clientY;
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
            container.style.cursor = "grab";
        });

        // **Reajustar tamaño dinámico si el contenido cambia**
        window.addEventListener("resize", adjustPanzoomSize);
    });
</script>
