<aside id="separator-sidebar" class="w-[15%] h-[89.9vh] transition-transform -translate-x-full sm:translate-x-0 text-white" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto content-scroll">
        <ul class="space-y-2 font-medium">
            <div class="flex items-center text-gray-400">
                <h1 class="text-sm font-bold">Nuevo Registro</h1>
                <div class="flex-1 border-t border-gray-400 ml-4"></div>
            </div>
            <li>
                <a href="{{ route('register') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-arrow-right-to-bracket flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Registrar</span>
                </a>
            </li>
            <div class="flex items-center text-gray-400">
                <h1 class="text-sm font-bold">Departamentos</h1>
                <div class="flex-1 border-t border-gray-400 ml-4"></div>
            </div>
            <li>
                <a href="{{ route('showuser') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-user-group flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Todos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('publicidad') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-bullhorn flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Publicidad</span>
                </a>
            </li>
            <li>
                <a href="{{ route('uscis') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-scale-balanced flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Legal USCIS</span>
                </a>
            </li>
            <li>
                <a href="{{ route('asilos') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-house-chimney-user flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Asilos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('servihuellas') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-fingerprint flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Servi Huellas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('traduccion') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-language flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Traducción</span>
                </a>
            </li>
            <li>
                <a href="{{ route('redaccion') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-pen-nib flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Redacción</span>
                </a>
            </li>
            <li>
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Manejo de documentos
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a href="{{ route('documentos') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-regular fa-folder-open flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Documentos</span>
                    <i class="fa-regular fa-circle-question text-xs w-full text-right" data-tooltip-target="tooltip-default"></i>
                </a>
            </li>
            <li>
                <div id="tooltip-default-2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Permisos de Trabajo
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a href="{{ route('permisos') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-regular fa-calendar-check flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Permisos</span>
                    <i class="fa-regular fa-circle-question text-xs w-full text-right" data-tooltip-target="tooltip-default-2"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('cortes') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-gavel flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Cortes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('asignacion') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 group active:text-blue-500 hover:scale-110 transition duration-500 hover:text-gray-600">
                    <i class="fa-solid fa-thumbtack flex-shrink-0 w-5 h-5 group-active:text-blue-500"></i>
                    <span class="ml-1">Asignación</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

