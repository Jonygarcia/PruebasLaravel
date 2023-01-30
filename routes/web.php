<?php

use App\Http\Controllers\NotasController;
use Illuminate\Support\Facades\Route;
use Mockery\Matcher\Not;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('notas', [NotasController::class, 'notas']);

Route::get('notas/{id?}', [NotasController::class, 'detalle'])->name('detalle');

Route::post('notas', [NotasController::class, 'crear'])->name('notas.crear');

Route::get('editar/{id}', [NotasController::class, 'editar'])->name('notas.editar');
Route::put('editar/{id}', [NotasController::class, 'actualizar'])->name('notas.actualizar');

Route::delete('eliminar/{id}', [NotasController::class, 'eliminar'])->name('notas.eliminar');