<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('rumahsakit.index');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('rumahsakit', RumahSakitController::class);
    Route::resource('rumah-sakit', RumahSakitController::class);
    Route::get('/rumah-sakit/{id}', [RumahSakitController::class, 'show'])->name('rumah-sakit.show');
    Route::resource('pasien', PasienController::class);
    Route::get('/filter-pasien/{id}', [PasienController::class, 'filterByRumahSakit']);
});
