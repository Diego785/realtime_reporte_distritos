<?php

use App\Http\Controllers\EncuestaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//--------------------------------- ENCUESTAS ------------------------------------ //
Route::get('/encuestas', [EncuestaController::class, 'showEncuestas'])->name('show-encuestas');
Route::get('/encuesta/{encuesta}', [EncuestaController::class, 'showDistritosEncuesta'])->name('show-distritos-encuesta');
