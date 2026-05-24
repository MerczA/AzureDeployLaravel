<?php

use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ruta principal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Geovanni
|--------------------------------------------------------------------------
*/
Route::get('/porcentaje', [OperationController::class, 'indexPorcentaje'])->name('porcentaje.index');
Route::post('/porcentaje', [OperationController::class, 'calcularPorcentaje'])->name('porcentaje.calcular');

/*
|--------------------------------------------------------------------------
| Mariana
|--------------------------------------------------------------------------
*/
Route::get('/validador', [OperationController::class, 'index'])->name('validador.index');
Route::post('/validador', [OperationController::class, 'validar'])->name('validador.validar');

/*
|--------------------------------------------------------------------------
| X
|--------------------------------------------------------------------------
*/
// RUTAS SIGUIENTES AQUÍ
