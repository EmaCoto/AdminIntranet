<?php

use App\Livewire\Admin\PanelPrincipal;
use App\Livewire\Admin\Register\AdminRegister;
use App\Livewire\Admin\Register\CustomerRegister;
use App\Livewire\Admin\Register\Register;
use App\Livewire\Admin\User\Showuser;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::get('admin', PanelPrincipal::class)->name('admin');
Route::get('admin/showuser', Showuser::class)->name('showuser');

Route::get('admin/register', Register::class)->name('register');
Route::get('admin/admin-register', AdminRegister::class)->name('admin-register');
Route::get('admin/customer-register', CustomerRegister::class)->name('customer-register');



