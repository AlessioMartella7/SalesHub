<?php

use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\VenditaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Middleware\CheckToken;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


// Rotte API Vendite

Route::middleware(['auth:api', CheckToken::using('vendita:create')]) // Reinserire il middleware throttle
    ->controller(VenditaController::class)
    ->prefix('vendite')
    ->name('vendite.')
    ->group(function () {
        Route::post('/', 'store')->name('store');
    });

// Rotta per ricevere token

Route::post('/get-token',[TokenController::class, 'getToken']);
