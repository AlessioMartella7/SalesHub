<?php

use App\Http\Controllers\Api\FissoController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\VenditaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Middleware\CheckToken;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Rotta per ricevere token
Route::post('/get-token', [TokenController::class, 'getToken']);

// Rotte API Vendite

Route::middleware(['auth:api', CheckToken::using('vendita:create')]) // Reinserire il middleware throttle
    ->controller(VenditaController::class)
    ->prefix('vendite')
    ->name('vendite.')
    ->group(function () {
        Route::post('/', 'store')->name('store');
    });

// Rotte API Fissi

Route::middleware(['auth:api', CheckToken::using('read')])
    ->controller(FissoController::class)
    ->prefix('fissi')
    ->name('fissi.')
    ->group(function () {
        Route::get('/', 'index')->name('api.index');
    });
