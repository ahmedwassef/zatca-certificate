<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZatcaController;

Route::get('/', function () {
    return redirect('/zatca');
});

// ZATCA Routes
Route::prefix('zatca')->middleware(['auth'])->group(function () {
    // Display ZATCA setup form
    Route::get('/ ', [ZatcaController::class, 'showForm'])->name('zatca.form');

    // API endpoints for ZATCA operations
    Route::post('/generate-csr', [ZatcaController::class, 'generateCsr'])->name('zatca.generate-csr');
    Route::post('/send-csr', [ZatcaController::class, 'sendCsr'])->name('zatca.send-csr');

    // Status and file management
    Route::get('/status', [ZatcaController::class, 'showStatus'])->name('zatca.status');
    Route::get('/download/{type}', [ZatcaController::class, 'downloadFile'])->name('zatca.download')
        ->where('type', 'private-key|csr');
});
