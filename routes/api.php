<?php

use App\Http\Controllers\Api\VenditaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


//Rotte API Vendite

Route::middleware('auth:api')
    ->controller(VenditaController::class)
    ->prefix('vendite')
    ->name('vendite.')
    ->group(function () {
        Route::post('/', 'store')->name('store');
    });
