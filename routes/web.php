<?php


use App\Livewire\Admin\PanelPrincipal;
use App\Livewire\Admin\Register\AdminRegister;
use App\Livewire\Admin\Register\CustomerRegister;
use App\Livewire\Admin\User\Showuser;
use App\Livewire\Admin\Asilos\Asilos;
use App\Livewire\Admin\Departamentos\Asilo;
use App\Livewire\Admin\Organigramas\Organigrama;
use App\Livewire\Admin\Organigramas\OrgranigramaBolitas;
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
Route::get('admin/asilo', Asilo::class)->name('asilo');
Route::get('admin/organigrama', Organigrama::class)->name('organigrama');
Route::get('admin/organigramas', OrgranigramaBolitas::class)->name('organigramas');
