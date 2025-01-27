<aside id="separator-sidebar" class="w-[15%] h-[89.9vh] transition-transform -translate-x-full sm:translate-x-0 text-white" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto content-scroll">
        <ul class="space-y-2 font-medium">
            <div class="flex items-center text-gray-400">
                <h1 class="text-sm font-bold">Nuevo Registro</h1>
                <div class="flex-1 border-t border-gray-400 ml-4"></div>
            </div>
            <li>
                <a href="{{ route('register') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('register') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-arrow-right-to-bracket flex-shrink-0 w-5 h-5 {{ request()->routeIs('register') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Registrar</span>
                </a>
            </li>
            <div class="flex items-center text-gray-400">
                <h1 class="text-sm font-bold">Departamentos</h1>
                <div class="flex-1 border-t border-gray-400 ml-4"></div>
            </div>
            <li>
                <a href="{{ route('showuser') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('showuser') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-user-group flex-shrink-0 w-5 h-5 {{ request()->routeIs('showuser') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Todos</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('publicidad') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('publicidad') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-bullhorn flex-shrink-0 w-5 h-5 {{ request()->routeIs('publicidad') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Publicidad</span>
                </a>
            </li>
            <li>
                <a href="{{ route('uscis') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('uscis') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-scale-balanced flex-shrink-0 w-5 h-5 {{ request()->routeIs('uscis') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Legal USCIS</span>
                </a>
            </li>
            <li>
                <a href="{{ route('asilos') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('asilos') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-house-chimney-user flex-shrink-0 w-5 h-5 {{ request()->routeIs('asilos') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Asilos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('servihuellas') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('servihuellas') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-fingerprint flex-shrink-0 w-5 h-5 {{ request()->routeIs('servihuellas') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Servi Huellas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('traduccion') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('traduccion') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-language flex-shrink-0 w-5 h-5 {{ request()->routeIs('traduccion') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Traduccion</span>
                </a>
            </li>
            <li>
                <a href="{{ route('redaccion') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('redaccion') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-pen-nib flex-shrink-0 w-5 h-5 {{ request()->routeIs('redaccion') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Redaccion</span>
                </a>
            </li>
            <li>
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Manejo de documentos
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a href="{{ route('documentos') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('documentos') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-regular fa-folder-open flex-shrink-0 w-5 h-5 {{ request()->routeIs('documentos') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Documentos</span>
                </a>
            </li>
            <li>
                <div id="tooltip-default-2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Permisos de Trabajo
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a href="{{ route('permisos') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('permisos') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-regular fa-calendar-check flex-shrink-0 w-5 h-5 {{ request()->routeIs('permisos') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Permisos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cortes') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('cortes') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-gavel flex-shrink-0 w-5 h-5 {{ request()->routeIs('cortes') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Cortes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('asignacion') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('asignacion') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-thumbtack flex-shrink-0 w-5 h-5 {{ request()->routeIs('asignacion') ? 'text-gray-500 flex items-center' : 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Asignacion</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

