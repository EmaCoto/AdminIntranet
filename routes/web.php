<?php

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
use App\Livewire\Admin\Departamentos\CustomerService;
use App\Livewire\Admin\Departamentos\DireccionLegal;
use App\Livewire\Admin\Departamentos\Finanzas;
use App\Livewire\Admin\Departamentos\Gerencia;
use App\Livewire\Admin\Departamentos\GestionHumana;
use App\Livewire\Admin\Departamentos\Interventoria;
use App\Livewire\Admin\Departamentos\LegalUscis;
use App\Livewire\Admin\Departamentos\ManejoDocumentos;
use App\Livewire\Admin\Departamentos\MisAbogados;
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
});


Route::get('/register', function () {return view('register');})->name('register');
Route::get('/proximamente', function () {return view('proximamente');})->name('proximamente');
Route::get('admin/admin-register', AdminRegister::class)->name('admin-register');
Route::get('admin/customer-register', CustomerRegister::class)->name('customer-register');

// Departamentos
Route::get('admin/showuser', Showuser::class)->name('showuser');
Route::get('admin/Acuerdos', Acuerdos::class)->name('Acuerdos');
Route::get('admin/AgentesComerciales', AgentesComerciales::class)->name('AgentesComerciales');
Route::get('admin/AlianzaComercialLegal', AlianzaComercialLegal::class)->name('AlianzaComercialLegal');
Route::get('admin/Asilo', Asilo::class)->name('Asilo');
Route::get('admin/BajoZero', BajoZero::class)->name('BajoZero');
Route::get('admin/Contabilidad', Contabilidad::class)->name('Contabilidad');
Route::get('admin/Cortes', Cortes::class)->name('Cortes');
Route::get('admin/Crecer', Crecer::class)->name('Crecer');
Route::get('admin/CustomerService', CustomerService::class)->name('CustomerService');
Route::get('admin/DireccionLegal', DireccionLegal::class)->name('DireccionLegal');
Route::get('admin/Finanzas', Finanzas::class)->name('Finanzas');
Route::get('admin/GerenciaAdministrativa', Gerencia::class)->name('Gerencia');
Route::get('admin/GestionHumana', GestionHumana::class)->name('GestionHumana');
Route::get('admin/Interventoria', Interventoria::class)->name('Interventoria');
Route::get('admin/Uscis', LegalUscis::class)->name('LegalUscis');
Route::get('admin/ManejoDocumentos', ManejoDocumentos::class)->name('ManejoDocumentos');
Route::get('admin/MisAbogados', MisAbogados::class)->name('MisAbogados');
Route::get('admin/Pal', Pal::class)->name('Pal');
Route::get('admin/Patty8A', Patty::class)->name('Patty8A');
Route::get('admin/PermisosTrabajo', PermisosTrabajo::class)->name('PermisosTrabajo');
Route::get('admin/Publicidad', Publicidad::class)->name('Publicidad');
Route::get('admin/Redaccion', Redaccion::class)->name('Redaccion');
Route::get('admin/RevisionEnsambleAsilo', RevisionEnsambleAsilo::class)->name('RevisionEnsambleAsilo');
Route::get('admin/RevisionEnsambleUscis', RevisionEnsambleUscis::class)->name('RevisionEnsambleUscis');
Route::get('admin/VentasPermisosTrabajo', VentasPermisosTrabajo::class)->name('VentasPermisosTrabajo');
Route::get('admin/SeguimientoAsilo', SeguimientoAsilo::class)->name('SeguimientoAsilo');
Route::get('admin/SeguimientoUscis', SeguimientoUscis::class)->name('SeguimientoUscis');
Route::get('admin/ServiHuella', ServiHuella::class)->name('ServiHuella');
Route::get('admin/Sistemas', Sistemas::class)->name('Sistemas');
Route::get('admin/Traduccion', Traduccion::class)->name('Traduccion');
Route::get('admin/VentasIms', VentasIms::class)->name('VentasIms');
Route::get('admin/VentasPermisosTrabajo', VentasPermisosTrabajo::class)->name('VentasPermisosTrabajo');
Route::get('admin/DeleteUser', DeleteUser::class)->name('DeleteUser');

// Organigramas
Route::get('admin/organigrama', Organigrama::class)->name('organigrama');
Route::get('admin/organigramas', OrgranigramaBolitas::class)->name('organigramas');
Route::get('admin/organigrama/publicidad', OrganiPublicidad::class)->name('OrganiPublicidad');

//limpiar caché
Route::get('/limpiar', function() {
    Artisan::call('optimize:clear');
    return 'Caché limpiada con éxito';
});

