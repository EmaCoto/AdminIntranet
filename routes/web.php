<?php

use App\Livewire\Admin\PanelPrincipal;
use App\Livewire\Admin\Register\Register;
use App\Livewire\Admin\User\Showuser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::get('/admin', PanelPrincipal::class)->name('admin');
Route::get('/admin/showuser', Showuser::class)->name('showuser');
Route::get('/admin/register', Register::class)->name('register');


