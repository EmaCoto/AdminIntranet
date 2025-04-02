<?php

use App\Livewire\Admin\Administradores;
use App\Livewire\Admin\Departamentos\Abogados;
use App\Livewire\Admin\Departamentos\Acuerdos;
use App\Livewire\Admin\Register\AdminRegister;
use App\Livewire\Admin\Register\CustomerRegister;
use App\Livewire\Admin\User\Showuser;
use App\Livewire\Admin\Departamentos\AgentesComerciales;
use App\Livewire\Admin\Departamentos\AlianzaComercialLegal;
use App\Livewire\Admin\Departamentos\Asilo;
use App\Livewire\Admin\Departamentos\BajoZero;
use App\Livewire\Admin\Departamentos\Contabilidad;
use App\Livewire\Admin\Departamentos\Cortes;
use App\Livewire\Admin\Departamentos\Crecer;
use App\Livewire\Admin\Departamentos\Crecerhealth;
use App\Livewire\Admin\Departamentos\CustomerService;
use App\Livewire\Admin\Departamentos\DireccionLegal;
use App\Livewire\Admin\Departamentos\Finanzas;
use App\Livewire\Admin\Departamentos\Gerencia;
use App\Livewire\Admin\Departamentos\GestionHumana;
use App\Livewire\Admin\Departamentos\Innovacion;
use App\Livewire\Admin\Departamentos\Interventoria;
use App\Livewire\Admin\Departamentos\LegalUscis;
use App\Livewire\Admin\Departamentos\ManejoDocumentos;
use App\Livewire\Admin\Departamentos\MisAbogados;
use App\Livewire\Admin\Departamentos\Oficinas;
use App\Livewire\Admin\Departamentos\Pal;
use App\Livewire\Admin\Departamentos\Patty;
use App\Livewire\Admin\Departamentos\PermisosTrabajo;
use App\Livewire\Admin\Departamentos\Publicidad;
use App\Livewire\Admin\Departamentos\Redaccion;
use App\Livewire\Admin\Departamentos\RevisionEnsambleAsilo;
use App\Livewire\Admin\Departamentos\RevisionEnsambleUscis;
use App\Livewire\Admin\Departamentos\SeguimientoAsilo;
use App\Livewire\Admin\Departamentos\SeguimientoUscis;
use App\Livewire\Admin\Departamentos\ServiHuella;
use App\Livewire\Admin\Departamentos\Sistemas;
use App\Livewire\Admin\Departamentos\Traduccion;
use App\Livewire\Admin\Departamentos\VentasIms;
use App\Livewire\Admin\Departamentos\VentasPermisosTrabajo;
use App\Livewire\Admin\Organigramas\OrganiAcuerdos;
use App\Livewire\Admin\Organigramas\OrganiAgentesComerciales;
use App\Livewire\Admin\Organigramas\OrganiAlianzaComercial;
use App\Livewire\Admin\Organigramas\OrganiAsilo;
use App\Livewire\Admin\Organigramas\OrganiBajoZero;
use App\Livewire\Admin\Organigramas\OrganiContabilidad;
use App\Livewire\Admin\Organigramas\OrganiCortes;
use App\Livewire\Admin\Organigramas\OrganiCrecerTodos;
use App\Livewire\Admin\Organigramas\OrganiCustomerServices;
use App\Livewire\Admin\Organigramas\OrganiDireccionLegal;
use App\Livewire\Admin\Organigramas\OrganiFinanzas;
use App\Livewire\Admin\Organigramas\OrganiGerencia;
use App\Livewire\Admin\Organigramas\OrganiGestionHumana;
use App\Livewire\Admin\Organigramas\OrganiInnovacion;
use App\Livewire\Admin\Organigramas\OrganiInterventoria;
use App\Livewire\Admin\Organigramas\OrganiLegalUscis;
use App\Livewire\Admin\Organigramas\OrganiManejoDocumentos;
use App\Livewire\Admin\Organigramas\OrganiMisAbogados;
use App\Livewire\Admin\Organigramas\OrganiPal;
use App\Livewire\Admin\Organigramas\OrganiPermisosTrabajo;
use App\Livewire\Admin\Organigramas\OrganiPublicidad;
use App\Livewire\Admin\Organigramas\OrganiRedaccion;
use App\Livewire\Admin\Organigramas\OrganiRevisionEnsambleAsilo;
use App\Livewire\Admin\Organigramas\OrganiSeguimientoAsilo;
use App\Livewire\Admin\Organigramas\OrganiSistemas;
use App\Livewire\Admin\Organigramas\OrganiTraduccion;
use App\Livewire\Admin\Organigramas\OrganiUscisRevisionEnsamble;
use App\Livewire\Admin\Organigramas\OrganiUscisSeguimiento;
use App\Livewire\Admin\Organigramas\OrganiVentasIms;
use App\Livewire\Admin\Organigramas\OrganiVentasPermisosTrabajo;
use App\Livewire\Admin\User\DeleteUser;
use App\Livewire\BirthdayCalendar;
use App\Livewire\UltimosDias;
use App\Livewire\Vacio;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Middleware de autenticación para la ruta raíz
Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

// Agrupar rutas protegidas con middleware de autenticación
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/solicitud-gmail', function () {return view('solicitud-gmail');})->name('solicitud-gmail');

    // Departamentos
    Route::prefix('admin')->group(function () {
        Route::get('showuser', Showuser::class)->name('showuser');
        Route::get('admin-register', AdminRegister::class)->name('admin-register');
        Route::get('customer-register', CustomerRegister::class)->name('customer-register');

        // Departamentos
        Route::get('Acuerdos', Acuerdos::class)->name('Acuerdos');
        Route::get('AgentesComerciales', AgentesComerciales::class)->name('AgentesComerciales');
        Route::get('AlianzaComercialLegal', AlianzaComercialLegal::class)->name('AlianzaComercialLegal');
        Route::get('Asilo', Asilo::class)->name('Asilo');
        Route::get('BajoZero', BajoZero::class)->name('BajoZero');
        Route::get('Contabilidad', Contabilidad::class)->name('Contabilidad');
        Route::get('Cortes', Cortes::class)->name('Cortes');
        Route::get('Crecer', Crecer::class)->name('Crecer');
        Route::get('CustomerService', CustomerService::class)->name('CustomerService');
        Route::get('DireccionLegal', DireccionLegal::class)->name('DireccionLegal');
        Route::get('Finanzas', Finanzas::class)->name('Finanzas');
        Route::get('GerenciaAdministrativa', Gerencia::class)->name('Gerencia');
        Route::get('GestionHumana', GestionHumana::class)->name('GestionHumana');
        Route::get('Interventoria', Interventoria::class)->name('Interventoria');
        Route::get('Uscis', LegalUscis::class)->name('LegalUscis');
        Route::get('ManejoDocumentos', ManejoDocumentos::class)->name('ManejoDocumentos');
        Route::get('MisAbogados', MisAbogados::class)->name('MisAbogados');
        Route::get('Pal', Pal::class)->name('Pal');
        Route::get('Patty8A', Patty::class)->name('Patty8A');
        Route::get('PermisosTrabajo', PermisosTrabajo::class)->name('PermisosTrabajo');
        Route::get('Publicidad', Publicidad::class)->name('Publicidad');
        Route::get('Redaccion', Redaccion::class)->name('Redaccion');
        Route::get('RevisionEnsambleAsilo', RevisionEnsambleAsilo::class)->name('RevisionEnsambleAsilo');
        Route::get('RevisionEnsambleUscis', RevisionEnsambleUscis::class)->name('RevisionEnsambleUscis');
        Route::get('SeguimientoAsilo', SeguimientoAsilo::class)->name('SeguimientoAsilo');
        Route::get('SeguimientoUscis', SeguimientoUscis::class)->name('SeguimientoUscis');
        Route::get('ServiHuella', ServiHuella::class)->name('ServiHuella');
        Route::get('Sistemas', Sistemas::class)->name('Sistemas');
        Route::get('Traduccion', Traduccion::class)->name('Traduccion');
        Route::get('VentasIms', VentasIms::class)->name('VentasIms');
        Route::get('VentasPermisosTrabajo', VentasPermisosTrabajo::class)->name('VentasPermisosTrabajo');
        Route::get('Innovacion', Innovacion::class)->name('Innovacion');
        Route::get('Oficinas', Oficinas::class)->name('Oficinas');
        Route::get('Abogados', Abogados::class)->name('Abogados');
        Route::get('Crecerhealth', Crecerhealth::class)->name('Crecerhealth');
        Route::get('DeleteUser', DeleteUser::class)->name('DeleteUser');
        Route::get('Administradores', Administradores::class)->name('Administradores');

        // Organigramas
        Route::get('organigrama/publicidad', OrganiPublicidad::class)->name('OrganiPublicidad');
        Route::get('organigrama/sistemas', OrganiSistemas::class)->name('OrganiSistemas');
        Route::get('organigrama/gestionhumana', OrganiGestionHumana::class)->name('OrganiGestionHumana');
        Route::get('organigrama/contabilidad', OrganiContabilidad::class)->name('OrganiContabilidad');
        Route::get('organigrama/gerencia', OrganiGerencia::class)->name('OrganiGerencia');
        Route::get('organigrama/direccionlegal', OrganiDireccionLegal::class)->name('OrganiDireccionLegal');
        Route::get('organigrama/asilo', OrganiAsilo::class)->name('OrganiAsilo');
        Route::get('organigrama/revisionyensambleasilo', OrganiRevisionEnsambleAsilo::class)->name('OrganiRevisionEnsambleAsilo');
        Route::get('organigrama/seguimientoasilo', OrganiSeguimientoAsilo::class)->name('OrganiSeguimientoAsilo');
        Route::get('organigrama/redaccion', OrganiRedaccion::class)->name('OrganiRedaccion');
        Route::get('organigrama/legaluscis', OrganiLegalUscis::class)->name('OrganiLegalUscis');
        Route::get('organigrama/uscisrevisionensamble', OrganiUscisRevisionEnsamble::class)->name('OrganiUscisRevisionEnsamble');
        Route::get('organigrama/uscisseguimiento', OrganiUscisSeguimiento::class)->name('OrganiUscisSeguimiento');
        Route::get('organigrama/innovacion', OrganiInnovacion::class)->name('OrganiInnovacion');
        Route::get('organigrama/cortes', OrganiCortes::class)->name('OrganiCortes');
        Route::get('organigrama/manejodocumentos', OrganiManejoDocumentos::class)->name('OrganiManejoDocumentos');
        Route::get('organigrama/alianzacomercial', OrganiAlianzaComercial::class)->name('OrganiAlianzaComercial');
        Route::get('organigrama/traduccion', OrganiTraduccion::class)->name('OrganiTraduccion');
        Route::get('organigrama/customerservices', OrganiCustomerServices::class)->name('OrganiCustomerServices');
        Route::get('organigrama/permisostrabajo', OrganiPermisosTrabajo::class)->name('OrganiPermisosTrabajo');
        Route::get('organigrama/agentescomerciales', OrganiAgentesComerciales::class)->name('OrganiAgentesComerciales');
        Route::get('organigrama/ventasims', OrganiVentasIms::class)->name('OrganiVentasIms');
        Route::get('organigrama/interventoria', OrganiInterventoria::class)->name('OrganiInterventoria');
        Route::get('organigrama/Acuerdos', OrganiAcuerdos::class)->name('OrganiAcuerdos');
        Route::get('organigrama/finanzas', OrganiFinanzas::class)->name('OrganiFinanzas');
        Route::get('organigrama/Ventaspermisostrabajo', OrganiVentasPermisosTrabajo::class)->name('OrganiVentasPermisosTrabajo');
        Route::get('organigrama/pal', OrganiPal::class)->name('OrganiPal');
        Route::get('organigrama/misabogados', OrganiMisAbogados::class)->name('OrganiMisAbogados');
        Route::get('organigrama/Crecertodos', OrganiCrecerTodos::class)->name('OrganiCrecerTodos');
        Route::get('organigrama/bajozero', OrganiBajoZero::class)->name('OrganiBajoZero');

        // Cumpleaños y Vacio
        Route::get('campos-de-usuarios-vacios', Vacio::class)->name('vacio');
        Route::get('BirthdayCalendar', BirthdayCalendar::class)->name('BirthdayCalendar');
        Route::get('UltimosDias', UltimosDias::class)->name('UltimosDias');

    });
});

// Rutas sin protección (accesibles sin autenticación)
// Route::get('/register', function () { return view('register'); })->name('register');
Route::get('/proximamente', function () { return view('proximamente'); })->name('proximamente');

// Limpiar caché
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return response()->json(['message' => 'La caché se ha eliminado correctamente.']);
})->name('cache.clear');
