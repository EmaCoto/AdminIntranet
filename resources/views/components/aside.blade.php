<aside id="separator-sidebar" class="w-[18%] transition-transform -translate-x-full sm:translate-x-0 z-20 border rounded-t-lg ml-10 -mt-12 bg-white" aria-label="Sidebar">
    <div class="h-full p-1 overflow-y-auto content-scroll">
        <div class="my-6">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="flex flex-col items-center text-center">
                <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition p-1 border-[#152B59] border-dashed">
                    @if (Auth::user()->profile_photo_path)
                    <img class="h-14 w-14 rounded-full object-cover" src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                    @else
                    <img class="h-14 w-14 rounded-full object-cover" src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> 
                    @endif
                </div>
                <p class="text-slate-500 mt-2 text-sm">{{ Auth::user()->name }}</p>
                <p class="text-slate-700 font-bold text-sm">Panel Administrativo</p>
            </div>
            @endif
        </div>

        <div class="py-3 px-1">
            <span class="uppercase text-slate-400 text-xs font-bold">Navegación</span>
        </div>
        
        <!-- Nuevo Registro -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('register') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('register') ? 'active' : '' }}">
                        <i class="fa-solid fa-arrow-right-to-bracket w-5 h-5"></i>
                        <span class="ml-3">Registrar</span>
                    </a>
                </li>
            </ul>
        </section>
  
      <!-- Departamentos -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="department-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <i class="fa-regular fa-building w-5 h-5"></i>
                        <span class="ml-3">Departamentos</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="department-list" class="hidden py-1 ul-nav">
                    <li><a href="{{ route('showuser') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('showuser') ? 'active' : '' }}">Todos</a></li>
                    <li><a href="{{ route('publicidad') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('publicidad') ? 'active' : '' }}">Publicidad</a></li>
                    <li><a href="{{ route('uscis') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('uscis') ? 'active' : '' }}">Legal USCIS</a></li>
                    <li><a href="{{ route('asilos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('asilos') ? 'active' : '' }}">Asilos</a></li>
                    <li><a href="{{ route('servihuellas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('servihuellas') ? 'active' : '' }}">Servi Huellas</a></li>
                    <li><a href="{{ route('traduccion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('traduccion') ? 'active' : '' }}">Traducción</a></li>
                    <li><a href="{{ route('redaccion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('redaccion') ? 'active' : '' }}">Redaccion</a></li>
                    <li><a href="{{ route('documentos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('documentos') ? 'active' : '' }}">Manejo de documentos</a></li>
                    <li><a href="{{ route('permisos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('permisos') ? 'active' : '' }}">Permisos de trbajo</a></li>
                    <li><a href="{{ route('cortes') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('cortes') ? 'active' : '' }}">Cortes</a></li>
                    <li><a href="{{ route('asignacion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('asignacion') ? 'active' : '' }}">Asignación</a></li>
                </ul>
            </ul>
        </section>

        <!-- Organigramas -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="organigramas-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <img src="{{ asset('img/icon/git-merge.svg') }}" alt="" class="w-5 h-5">
                        <span class="ml-3">Organigramas</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="organigramas-list" class="hidden py-1 ul-nav">
                    <li><a href="{{ route('organigrama') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('organigrama') ? 'active' : '' }}">Organigrama 1</a></li>
                    <li><a href="{{ route('organigramas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('organigramas') ? 'active' : '' }}">Organigrama 2</a></li>
                </ul>
            </ul>
        </section>

        <!-- Reportes -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="report-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <img src="{{ asset('img/icon/cast.svg') }}" alt="" class="w-5 h-5">
                        <span class="ml-3">Report</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="report-list" class="hidden py-1 ul-nav">
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Sales report</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Leads report</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Projects report</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Timesheets report</a></li>
                </ul>
            </ul>
        </section>

        <!-- Aplicaciones -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="aplication-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <i class="fa-regular fa-paper-plane w-5 h-5"></i>
                        <span class="ml-3">Applications</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="aplication-list" class="hidden py-1 ul-nav">
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Email</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Tasks</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Notes</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">storage</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Calendar</a></li>
                </ul>
            </ul>
        </section>

        <!-- Payment -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="payment-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <i class="fa-solid fa-dollar-sign w-5 h-5"></i>
                        <span class="ml-3">Payment</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="payment-list" class="hidden py-1 ul-nav">
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Payment</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Invoice view</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Invoice create</a></li>
                </ul>
            </ul>
        </section>

        <!-- Cliente -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="customer-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <img src="{{ asset('img/icon/users.svg') }}" alt="" class="w-5 h-5">
                        <span class="ml-3">Customer</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="customer-list" class="hidden py-1 ul-nav">
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Customer</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Customer view</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Customer create</a></li>
                </ul>
            </ul>
        </section>

        <!-- Leads -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="leads-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <img src="{{ asset('img/icon/alert-circle.svg') }}" alt="" class="w-5 h-5">
                        <span class="ml-3">Leads</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="leads-list" class="hidden py-1 ul-nav">
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Leads</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Leads view</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Leads create</a></li>
                </ul>
            </ul>
        </section>

        <!-- projects -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="projects-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <img src="{{ asset('img/icon/briefcase.svg') }}" alt="" class="w-5 h-5">
                        <span class="ml-3">Projects</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="projects-list" class="hidden py-1 ul-nav">
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Projects</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Projects view</a></li>
                    <li><a href="#" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('#') ? 'active' : '' }}">Projects create</a></li>
                </ul>
            </ul>
        </section>
    </div>
</aside>