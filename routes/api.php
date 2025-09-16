<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZatcaController;


Route::post('/zatca/generate-csr', [ZatcaController::class, 'generateCsr']);
Route::post('/zatca/send-csr', [ZatcaController::class, 'sendCsr']);
