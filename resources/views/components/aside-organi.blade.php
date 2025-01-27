<aside id="separator-sidebar" class="w-[15%] h-[89.9vh] transition-transform -translate-x-full sm:translate-x-0 text-gray-600" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto content-scroll">
        <ul class="space-y-2 font-medium">
            <div class="flex items-center text-gray-400">
                <h1 class="text-sm font-bold">Organigramas</h1>
                <div class="flex-1 border-t border-gray-400 ml-4"></div>
            </div>
            <li>
                <a href="{{ route('organigrama') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('organigrama') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-code-branch flex-shrink-0 w-5 h-5 {{ request()->routeIs('organigrama') ? 'text-gray-500 flex items-center': 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Organigrama 1</span>
                </a>
            </li>
            <li>
                <a href="{{ route('organigramas') }}" class="flex items-center p-2 rounded-lg  {{ request()->routeIs('organigramas') ? 'bg-gray-100 text-gray-600 scale-110' : 'hover:bg-gray-100 hover:scale-110 hover:text-gray-600'}} group active:text-gray-500 transition duration-500">
                    <i class="fa-solid fa-code-branch flex-shrink-0 w-5 h-5 {{ request()->routeIs('organigramas') ? 'text-gray-500 flex items-center': 'group-active:text-blue-500' }}"></i>
                    <span class="ml-1">Organigrama 2</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

