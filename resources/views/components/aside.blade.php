<aside id="separator-sidebar" class="w-[242px] h-[100vh] transition-transform -translate-x-full sm:translate-x-0 z-20 border rounded-t-lg ml-10 -mt-12 bg-white" aria-label="Sidebar">
    <div class="h-full p-1 overflow-y-auto content-scroll">
        <div class="my-6">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="flex flex-col items-center text-center">
                <div class="flex text-sm border-2 rounded-full focus:outline-none focus:border-gray-300 transition p-1 border-[#152B59] border-dashed">
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

        <div class="py-1 px-1">
            <span class="uppercase text-slate-400 text-xs font-bold">Métricas</span>
        </div>

        <!-- Inicio -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('dashboard') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-column w-5 h-5"></i>
                        <span class="ml-3">Estadísticas</span>
                    </a>
                </li>
            </ul>
        </section>


        <div class="py-1 px-1">
            <span class="uppercase text-slate-400 text-xs font-bold">Colaboradores</span>
        </div>

        {{-- últimos colaboradores --}}
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('UltimosDias') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('UltimosDias') ? 'active' : '' }}">
                        <i class="fa-regular fa-circle-user w-5 h-5"></i>
                        <span class="ml-3">Compañeros nuevos</span>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Areas -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <button data-toggle="menu" data-target="departamentos-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                        <span class="flex items-center">
                            <i class="fa-regular fa-building w-5 h-5"></i>
                            <span class="ml-3">Áreas</span>
                        </span>
                        <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                    </button>
                    <ul id="departamentos-list" class="hidden ml-5 py-1">
                        {{-- all --}}
                        <li class="ul-nav">
                            <a href="{{ route('showuser') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('showuser') ? 'active' : '' }}">
                                <i class="fa-regular fa-user w-5 h-5"></i>
                                <span class="ml-3">Todos</span>
                            </a>
                        </li>

                        {{-- Administrativa --}}
                        <li>
                            <button data-toggle="menu" data-target="administrativa-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-regular fa-folder-open w-5 h-5"></i>
                                    <span class="ml-3">Administrativa</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="administrativa-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('Gerencia') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Gerencia') ? 'active' : '' }}">Gerencia</a></li>
                                <li><a href="{{ route('GestionHumana') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('GestionHumana') ? 'active' : '' }}">Gestión Humana</a></li>
                                <li><a href="{{ route('Sistemas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Sistemas') ? 'active' : '' }}">Sistemas</a></li>
                                <li><a href="{{ route('Contabilidad') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Contabilidad') ? 'active' : '' }}">Contabilidad</a></li>
                                <li><a href="{{ route('Innovacion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Innovacion') ? 'active' : '' }}">Innovacion</a></li>
                            </ul>
                        </li>
                        {{-- Legal --}}
                        <li>
                            <button data-toggle="menu" data-target="legal-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-solid fa-scale-balanced w-5 h-5"></i>
                                    <span class="ml-3">Legal</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="legal-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('DireccionLegal') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('DireccionLegal') ? 'active' : '' }}">Dirección Legal</a></li>
                                <li><a href="{{ route('Abogados') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Abogados') ? 'active' : '' }}">Dirección Abogados</a></li>
                                <li><a href="{{ route('Asilo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Asilo') ? 'active' : '' }}">Asilo</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('RevisionEnsambleAsilo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('RevisionEnsambleAsilo') ? 'active' : '' }} truncate w-full block">Revisión y Ensamble de Asilo</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Revisión y Ensamble de Asilo</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('SeguimientoAsilo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('SeguimientoAsilo') ? 'active' : '' }}">Seguimiento de Asilo</a></li>
                                <li><a href="{{ route('Redaccion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Redaccion') ? 'active' : '' }}">Redacción</a></li>
                                <li><a href="{{ route('LegalUscis') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('LegalUscis') ? 'active' : '' }}">USCIS</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('RevisionEnsambleUscis') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('RevisionEnsambleUscis') ? 'active' : '' }} truncate w-full block">Revisión y Ensamble de USCIS</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Revisión y Ensamble de USCIS</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('SeguimientoUscis') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('SeguimientoUscis') ? 'active' : '' }} truncate w-full block">Seguimiento de USCIS</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Seguimiento de USCIS</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('Cortes') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Cortes') ? 'active' : '' }}">Cortes</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('ManejoDocumentos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('ManejoDocumentos') ? 'active' : '' }} truncate w-full block">Manejo de Documentos</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Manejo de Documentos</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('AlianzaComercialLegal') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('AlianzaComercialLegal') ? 'active' : '' }} truncate w-full block">Alianza Comercial y Legal</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Alianza Comercial y Legal</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('Traduccion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Traduccion') ? 'active' : '' }}">Traducción</a></li>
                                <li><a href="{{ route('CustomerService') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('CustomerService') ? 'active' : '' }}">Customer Services</a></li>
                                <li><a href="{{ route('PermisosTrabajo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('PermisosTrabajo') ? 'active' : '' }}">Permisos de Trabajo</a></li>
                            </ul>
                        </li>
                        {{-- Comercial --}}
                        <li>
                            <button data-toggle="menu" data-target="comercial-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-regular fa-handshake w-5 h-5"></i>
                                    <span class="ml-3">Comercial</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="comercial-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('Publicidad') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Publicidad') ? 'active' : '' }}">Publicidad</a></li>
                                <li><a href="{{ route('AgentesComerciales') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('AgentesComerciales') ? 'active' : '' }}">Agentes Comerciales</a></li>
                                <li><a href="{{ route('VentasIms') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('VentasIms') ? 'active' : '' }}">Ventas IMS</a></li>
                                <li><a href="{{ route('Interventoria') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Interventoria') ? 'active' : '' }}">Interventoría</a></li>
                                <li><a href="{{ route('Acuerdos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Acuerdos') ? 'active' : '' }}">Acuerdos</a></li>
                                <li><a href="{{ route('Finanzas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Finanzas') ? 'active' : '' }}">Finanzas</a></li>
                                <li><a href="{{ route('Oficinas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Oficinas') ? 'active' : '' }}">Oficinas USA</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('VentasPermisosTrabajo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('VentasPermisosTrabajo') ? 'active' : '' }} truncate w-full block">Ventas de Permisos de Trabajo</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Ventas de Permisos de Trabajo</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- Marcas Aliadas --}}
                        <li>
                            <button data-toggle="menu" data-target="marcas-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-brands fa-ubuntu w-5 h-5"></i>
                                    <span class="ml-3">Marcas Aliadas</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="marcas-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('Pal') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Pal') ? 'active' : '' }}">PAL</a></li>
                                <li><a href="{{ route('Crecerhealth') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Crecerhealth') ? 'active' : '' }}">Crecer Health</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('MisAbogados') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('MisAbogados') ? 'active' : '' }} truncate w-full block">Mis Abogados USA</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Mis Abogados USA</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('ServiHuella') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('ServiHuella') ? 'active' : '' }} truncate w-full block">Servi Huellas</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Servi Huella</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('Patty8A') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Patty8A') ? 'active' : '' }}">Patty 8A</a></li>
                                <li><a href="{{ route('Crecer') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('Crecer') ? 'active' : '' }}">Crecer Todos</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>

        <!-- Depurados -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('DeleteUser') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('DeleteUser') ? 'active' : '' }}">
                        <i class="fa-solid fa-ban w-5 h-5"></i>
                        <span class="ml-3">Depurados</span>
                    </a>
                </li>
            </ul>
        </section>

        <div class="py-1 px-1">
            <span class="uppercase text-slate-400 text-xs font-bold">Nuevos colaboradores</span>
        </div>

        <!-- Solicitudes de Gmail -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li class="relative group">
                    <a href="{{ route('solicitud-gmail') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('solicitud-gmail') ? 'active' : '' }}">
                        <i class="fa-regular fa-id-card w-5 h-5"></i>
                        <span class="ml-3">Solicitudes de Gmail</span>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Nuevo Registro -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('customer-register') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('customer-register') ? 'active' : '' }}">
                        <i class="fa-solid fa-arrow-right-to-bracket w-5 h-5"></i>
                        <span class="ml-3">Registrar</span>
                    </a>
                </li>
            </ul>
        </section>

        {{-- Registro Incompleto --}}
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('vacio') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('vacio') ? 'active' : '' }}">
                        <i class="fa-regular fa-address-card w-5 h-5"></i>
                        <span class="ml-3">Registros Incompletos</span>
                    </a>
                </li>
            </ul>
        </section>

        <div class="py-1 px-1">
            <span class="uppercase text-slate-400 text-xs font-bold">Herramientas</span>
        </div>

        <!-- Organigramas -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <button data-toggle="menu" data-target="organigrama-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                        <span class="flex items-center">
                            <i class="fa-solid fa-network-wired w-5 h-5"></i>
                            <span class="ml-3">Organigramas</span>
                        </span>
                        <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                    </button>
                    <ul id="organigrama-list" class="hidden ml-5 py-1">

                        {{-- Administrativa --}}
                        <li>
                            <button data-toggle="menu" data-target="og-administrativa-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-regular fa-folder-open w-5 h-5"></i>
                                    <span class="ml-3">Administrativa</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="og-administrativa-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('OrganiGerencia') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiGerencia') ? 'active' : '' }}">Gerencia</a></li>
                                <li><a href="{{ route('OrganiGestionHumana') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiGestionHumana') ? 'active' : '' }}">Gestión Humana</a></li>
                                <li><a href="{{ route('OrganiSistemas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiSistemas') ? 'active' : '' }}">Sistemas</a></li>
                                <li><a href="{{ route('OrganiContabilidad') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiContabilidad') ? 'active' : '' }}">Contabilidad</a></li>
                                <li><a href="{{ route('OrganiInnovacion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiInnovacion') ? 'active' : '' }}">Innovación</a></li>
                            </ul>
                        </li>
                        {{-- Legal --}}
                        <li>
                            <button data-toggle="menu" data-target="og-legal-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-solid fa-scale-balanced w-5 h-5"></i>
                                    <span class="ml-3">Legal</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="og-legal-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('OrganiDireccionLegal') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiDireccionLegal') ? 'active' : '' }}">Dirección Legal</a></li>
                                <li><a href="{{ route('OrganiAsilo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiAsilo') ? 'active' : '' }}">Asilo</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiRevisionEnsambleAsilo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiRevisionEnsambleAsilo') ? 'active' : '' }} truncate w-full block">Revisión y Ensamble de Asilo</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Revisión y Ensamble de Asilo</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('OrganiSeguimientoAsilo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiSeguimientoAsilo') ? 'active' : '' }}">Seguimiento de Asilo</a></li>
                                <li><a href="{{ route('OrganiRedaccion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiRedaccion') ? 'active' : '' }}">Redacción</a></li>
                                <li><a href="{{ route('OrganiLegalUscis') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiLegalUscis') ? 'active' : '' }}">USCIS</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiUscisRevisionEnsamble') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiUscisRevisionEnsamble') ? 'active' : '' }} truncate w-full block">Revisión y Ensamble de USCIS</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Revisión y Ensamble de USCIS</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiUscisSeguimiento') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiUscisSeguimiento') ? 'active' : '' }} truncate w-full block">Seguimiento de USCIS</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Seguimiento de USCIS</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('OrganiCortes') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiCortes') ? 'active' : '' }}">Cortes</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiManejoDocumentos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiManejoDocumentos') ? 'active' : '' }} truncate w-full block">Manejo de Documentos</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Manejo de Documentos</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiAlianzaComercial') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiAlianzaComercial') ? 'active' : '' }} truncate w-full block">Alianza Comercial y Legal</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Alianza Comercial y Legal</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('OrganiTraduccion') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiTraduccion') ? 'active' : '' }}">Traducción</a></li>
                                <li><a href="{{ route('OrganiCustomerServices') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiCustomerServices') ? 'active' : '' }}">Customer Services</a></li>
                                <li><a href="{{ route('OrganiPermisosTrabajo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiPermisosTrabajo') ? 'active' : '' }}">Permisos de Trabajo</a></li>
                            </ul>
                        </li>
                        {{-- Comercial --}}
                        <li>
                            <button data-toggle="menu" data-target="og-comercial-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-regular fa-handshake w-5 h-5"></i>
                                    <span class="ml-3">Comercial</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="og-comercial-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('OrganiPublicidad') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiPublicidad') ? 'active' : '' }}">Publicidad</a></li>
                                <li><a href="{{ route('OrganiAgentesComerciales') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiAgentesComerciales') ? 'active' : '' }}">Agentes Comerciales</a></li>
                                <li><a href="{{ route('OrganiVentasIms') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiVentasIms') ? 'active' : '' }}">Ventas IMS</a></li>
                                <li><a href="{{ route('OrganiInterventoria') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiInterventoria') ? 'active' : '' }}">Interventoría</a></li>
                                <li><a href="{{ route('OrganiAcuerdos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiAcuerdos') ? 'active' : '' }}">Acuerdos</a></li>
                                <li><a href="{{ route('OrganiFinanzas') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiFinanzas') ? 'active' : '' }}">Finanzas</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiVentasPermisosTrabajo') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiVentasPermisosTrabajo') ? 'active' : '' }} truncate w-full block">Ventas de Permisos de Trabajo</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Ventas de Permisos de Trabajo</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        {{-- Marcas Aliadas --}}
                        <li>
                            <button data-toggle="menu" data-target="og-marcas-listas" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full">
                                <span class="flex items-center">
                                    <i class="fa-brands fa-ubuntu w-5 h-5"></i>
                                    <span class="ml-3">Marcas Aliadas</span>
                                </span>
                                <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                            </button>
                            <ul id="og-marcas-listas" class="hidden py-1 ul-nav">
                                <li><a href="{{ route('OrganiPal') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiPal') ? 'active' : '' }}">PAL</a></li>
                                <li>
                                    <div class="relative group w-full max-w-[250px]">
                                        <a href="{{ route('OrganiMisAbogados') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiMisAbogados') ? 'active' : '' }} truncate w-full block">Mis Abogados USA</a>
                                        <!-- Tooltip -->
                                        <span class="absolute left-1/2 -translate-x-1/2 bottom-full mb-1 w-max max-w-xs bg-gray-800 text-white text-xs rounded-md px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200">Mis Abogados USA</span>
                                    </div>
                                </li>
                                <li><a href="{{ route('proximamente') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('proximamente') ? 'active' : '' }}">Patty 8A</a></li>
                                <li><a href="{{ route('OrganiCrecerTodos') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiCrecerTodos') ? 'active' : '' }}">Crecer Todos</a></li>
                                <li><a href="{{ route('OrganiBajoZero') }}" id="nav-link" class="p-2 rounded-md pl-10 {{ request()->routeIs('OrganiBajoZero') ? 'active' : '' }}">Bajo Zero</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>

        <!-- Cumpleaños -->
        <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('BirthdayCalendar') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('BirthdayCalendar') ? 'active' : '' }}">
                        <i class="fa-regular fa-calendar w-5 h-5"></i>
                        <span class="ml-3">Cumpleaños</span>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Reportes -->
        {{-- <section class="mb-1">
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
                    <li><a href="{{ route('proximamente') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Sales report</a></li>
                    <li><a href="{{ route('proximamente') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Leads report</a></li>
                    <li><a href="{{ route('proximamente') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Projects report</a></li>
                    <li><a href="{{ route('proximamente') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Timesheets report</a></li>
                </ul>
            </ul>
        </section> --}}

                <!-- projects -->
        {{-- <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                <button data-toggle="menu" data-target="projects-list" id="button-link" class="flex items-center justify-between p-2 rounded-md w-full ">
                    <span class="flex items-center">
                        <img src="{{ asset('img/icon/briefcase.svg') }}" alt="" class="w-5 h-5">
                        <span class="ml-3">Compañeros nuevos</span>
                    </span>
                    <i class="fa-solid fa-chevron-down arrow-icon text-xs"></i>
                </button>
                </li>
                <ul id="projects-list" class="hidden py-1 ul-nav">
                    <li><a href="{{ route('vacio') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Projects</a></li>
                    <li><a href="{{ route('Ultimosochodias') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Projects view</a></li>
                    <li><a href="{{ route('proximamente') }}" id="nav-link" class="p-2 rounded-md pl-10 cursor-no-drop {{ request()->routeIs('#') ? 'active' : '' }}">Projects create</a></li>
                </ul>
            </ul>
        </section> --}}

                <!-- Administradores -->
        {{-- <section class="mb-1">
            <ul class="font-medium ul-nav">
                <li>
                    <a href="{{ route('Administradores') }}" id="nav-link" class="flex items-center p-2 rounded-md {{ request()->routeIs('Administradores') ? 'active' : '' }}">
                        <i class="fa-regular fa-address-card"></i>
                        <span class="ml-3">Administradores</span>
                    </a>
                </li>
            </ul>
        </section> --}}
    </div>
</aside>
