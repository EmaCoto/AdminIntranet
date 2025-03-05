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
use App\Livewire\Admin\Organigramas\Organigrama;
use App\Livewire\Admin\Organigramas\OrganiPublicidad;
use App\Livewire\Admin\Organigramas\OrgranigramaBolitas;
use App\Livewire\Admin\User\DeleteUser;
use App\Livewire\BirthdayCalendar;
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

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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
        Route::get('VentasPermisosTrabajo', VentasPermisosTrabajo::class)->name('VentasPermisosTrabajo');
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
        Route::get('organigrama', Organigrama::class)->name('organigrama');
        Route::get('organigramas', OrgranigramaBolitas::class)->name('organigramas');
        Route::get('organigrama/publicidad', OrganiPublicidad::class)->name('OrganiPublicidad');

        // Cumpleaños y Vacio
        Route::get('vacio', Vacio::class)->name('vacio');
        Route::get('BirthdayCalendar', BirthdayCalendar::class)->name('BirthdayCalendar');

    });
});

// Rutas sin protección (accesibles sin autenticación)
Route::get('/register', function () { return view('register'); })->name('register');
Route::get('/proximamente', function () { return view('proximamente'); })->name('proximamente');

// Limpiar caché
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return response()->json(['message' => 'La caché se ha eliminado correctamente.']);
})->name('cache.clear');
