<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\BranchAuthController;
use App\Models\branch;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\Admin\Menu\MenuKategoriController;
use App\Http\Controllers\MenuKategoriController as ControllersMenuKategoriController;
use App\Http\Controllers\Admin\Menu\ProdukController;

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
Route::middleware('auth:pegawai')->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() =>
    inertia('dashboard'))->name('admin.dashboard');

    Route::get('/menu', fn () =>
    inertia('admin/Menu/produk/index'))->name('menu.index');
    Route::resource('produk', ProdukController::class)->only(['index', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

require __DIR__.'/settings.php';
