<?php

use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ruta principal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
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
| Rafa
|--------------------------------------------------------------------------
*/
Route::get('/par-impar', [OperationController::class, 'indexParImpar']);
Route::post('/par-impar', [OperationController::class, 'verificarParImpar']);

/*
|--------------------------------------------------------------------------
| Charly
|--------------------------------------------------------------------------
*/
Route::get('/temperatura', [OperationController::class, 'indexTemperatura']);
Route::post('/temperatura', [OperationController::class, 'convertirTemperatura']);

Route::get('/seguridad', [OperationController::class, 'indexSeguridad'])->name('seguridad.index');
Route::post('/seguridad', [OperationController::class, 'auditarSeguridad'])->name('seguridad.calcular');

/*
|--------------------------------------------------------------------------
| Palindromo
|--------------------------------------------------------------------------
*/
Route::get('/palindromo', [OperationController::class, 'indexPalindromo'])->name('palindromo.index');
Route::post('/palindromo', [OperationController::class, 'verificarPalindromo'])->name('palindromo.verificar');

// RUTAS SIGUIENTES AQUÍ
