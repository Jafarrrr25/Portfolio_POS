<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\BranchAuthController;
use App\Models\branch;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return inertia::render('auth/BranchLogin');
    })->name('login');
    Route::post('/login', [AuthController::class,'login'])->name('branch.login');
});

// Route Login 
Route::middleware('auth:branch')->group(function() {
    Route::get('/', fn() =>
    inertia('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Role admin 
Route::middleware('auth:pegawai')->group(function () {
    Route::get('admin/dashboard', fn() =>
    inertia('dashboard'))->name('admin.dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);
});

require __DIR__.'/settings.php';
