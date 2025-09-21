<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ZatcaController;

// ZATCA Routes
Route::middleware(['auth'])->group(function () {
    // Display ZATCA setup form
    Route::get('/ ', [\App\Http\Controllers\ZatcaController::class, 'showForm'])->name('zatca.form');

    // API endpoints for ZATCA operations
    Route::post('/generate-csr', [\App\Http\Controllers\ZatcaController::class, 'generateCsr'])->name('zatca.generate-csr');
    Route::post('/send-csr', [\App\Http\Controllers\ZatcaController::class, 'sendCsr'])->name('zatca.send-csr');
    // Status and file management
    Route::get('/status', [\App\Http\Controllers\ZatcaController::class, 'showStatus'])->name('zatca.status');
    Route::get('/download/{type}', [\App\Http\Controllers\ZatcaController::class, 'downloadFile'])->name('zatca.download')
        ->where('type', 'private-key|csr');
});



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
