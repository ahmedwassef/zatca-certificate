<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
