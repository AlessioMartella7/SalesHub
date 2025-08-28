<?php

use App\Http\Controllers\VenditaController;
use App\Http\Controllers\FissoController;
use App\Http\Controllers\OffertaEnergiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotte Fissi
Route::middleware('auth')->prefix('fissi')->controller(FissoController::class)->name('fissi.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/import', 'importForm')->name('import.form');
    Route::post('/import', 'import')->name('import');
    Route::get('/{fisso}', 'show')->name('show');
});

// Rotte Energia
Route::middleware('auth')->prefix('energia')->controller(OffertaEnergiaController::class)->name('energia.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/import', 'import')->name('import');
    Route::get('/{energia}', 'show')->name('show');
});

// Rotte Vendite

Route::middleware('auth')->controller(VenditaController::class)
    ->prefix('vendite')
    ->name('vendite.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('storeTest');
        Route::get('/{vendita}', 'show')->name('show');
    });

require __DIR__ . '/auth.php';
