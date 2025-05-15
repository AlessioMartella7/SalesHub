<?php

use App\Http\Controllers\FissoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rotte Fissi
Route::middleware('auth')->prefix('fissi')->controller(FissoController::class)->name('fissi.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/import', 'importForm')->name('import.form');
    Route::post('/import', 'import')->name('import');
    Route::get('/{fisso}', 'show')->name('show');
});

require __DIR__ . '/auth.php';
