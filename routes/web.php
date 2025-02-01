<?php

use App\Livewire\Admin\Asignacion\Asignacion;
use App\Livewire\Admin\PanelPrincipal;
use App\Livewire\Admin\Register\AdminRegister;
use App\Livewire\Admin\Register\CustomerRegister;
use App\Livewire\Admin\User\Showuser;
use App\Livewire\Admin\Publicidad\Publicidad;
use App\Livewire\Admin\Legaluscis\Legaluscis;
use App\Livewire\Admin\Asilos\Asilos;
use App\Livewire\Admin\Cortes\Cortes;
use App\Livewire\Admin\Servihuellas\Servihuellas;
use App\Livewire\Admin\Traduccion\Traduccion;
use App\Livewire\Admin\Redaccion\Redaccion;
use App\Livewire\Admin\Organigramas\Organigrama;
use App\Livewire\Admin\Organigramas\OrgranigramaBolitas;
use App\Livewire\Admin\ManejoDeDocumentos\ManejoDeDocumentos;
use App\Livewire\Admin\PermisosDeTrabajo\PermisosDeTrabajo;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('admin/admin-register', AdminRegister::class)->name('admin-register');
Route::get('admin/customer-register', CustomerRegister::class)->name('customer-register');

Route::get('admin', PanelPrincipal::class)->name('admin');
Route::get('admin/showuser', Showuser::class)->name('showuser');
Route::get('admin/publicidad', Publicidad::class)->name('publicidad');
Route::get('admin/lega-luscis', Legaluscis::class)->name('uscis');
Route::get('admin/asilos', Asilos::class)->name('asilos');
Route::get('admin/servi-huellas', Servihuellas::class)->name('servihuellas');
Route::get('admin/traduccion', Traduccion::class)->name('traduccion');
Route::get('admin/redaccion', Redaccion::class)->name('redaccion');
Route::get('admin/manejo-de-documentos', ManejoDeDocumentos::class)->name('documentos');
Route::get('admin/permisos-de-trabajo', PermisosDeTrabajo::class)->name('permisos');
Route::get('admin/cortes', Cortes::class)->name('cortes');
Route::get('admin/asignacion', Asignacion::class)->name('asignacion');
Route::get('admin/organigrama', Organigrama::class)->name('organigrama');
Route::get('admin/organigramas', OrgranigramaBolitas::class)->name('organigramas');
