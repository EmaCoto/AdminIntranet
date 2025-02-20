<div class="flex w-full bg-[#fafbfd]">
    <x-slot name="header">
        <div class="text-white leading-tight px-56 flex">
            <span class="mr-1">Bienvenido:</span>
            <p class="font-semibold">{{ Auth::user()->name }}</p>
        </div>
    </x-slot>

    <x-aside />

    <div class="w-[85%] p-2 border-l">
        <div class="h-[80vh] w-full rounded-lg border relative flex justify-center items-center bg-white overflow-hidden">

            <!-- Controles de Zoom -->
            <div class="absolute top-4 left-4 z-50 bg-white p-2 rounded-lg shadow-md flex gap-2">
                <button id="zoom-in" class="px-3 py-1 bg-blue-500 text-white rounded">+</button>
                <button id="zoom-out" class="px-3 py-1 bg-red-500 text-white rounded">-</button>
                <button id="reset" class="px-3 py-1 bg-gray-500 text-white rounded">Reset</button>
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

        // Iniciar con el organigrama centrado
        const startX = (container.clientWidth - organigram.clientWidth) / 1;
        const startY = (container.clientHeight - organigram.clientHeight) / 1;
        panzoomElement.style.transform = `translate(${startX}px, ${startY}px) scale(100)`;

        const panzoom = Panzoom(panzoomElement, {
            maxScale: 3,
            minScale: 0.3,
            startScale: 1,
            startX: startX,
            startY: startY,
            contain: "outside",
            setTransform: (elem, { scale, x, y }) => {
                elem.style.transform = `translate(${x}px, ${y}px) scale(${scale})`;
            }
        });


        // Bloquear el scroll dentro del contenedor
        container.style.overflow = "hidden";

        // Permitir zoom con la rueda del mouse
        container.addEventListener("wheel", panzoom.zoomWithWheel);

        // Botones de control
        document.getElementById("zoom-in").addEventListener("click", () => panzoom.zoomIn());
        document.getElementById("zoom-out").addEventListener("click", () => panzoom.zoomOut());
        document.getElementById("reset").addEventListener("click", () => {
            panzoom.reset();
            panzoomElement.style.transform = `translate(${startX}px, ${startY}px) scale(1)`;
        });

        // Arrastrar con el mouse sin scroll
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
    });
</script>
