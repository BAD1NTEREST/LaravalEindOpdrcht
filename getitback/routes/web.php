<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminRidesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RitController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\OptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/book-ride', function () {
        return view('book-ride');
    })->name('book-ride');

    Route::post('/rides', [RitController::class, 'store'])->name('rides.store');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/options', [OptionController::class, 'index'])->name('admin.options.index');
    Route::post('/admin/options', [OptionController::class, 'update'])->name('admin.options.update');

    Route::get('/admin/rides', [AdminRidesController::class, 'index'])->name('admin.rides.index');
    Route::put('/admin/rides/{ride}', [AdminRidesController::class, 'update'])->name('admin.rides.update');
});

require __DIR__.'/auth.php';
