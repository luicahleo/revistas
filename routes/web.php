<?php

use App\Http\Controllers\AdquisicionController;
use App\Http\Controllers\ColeccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\RevistaController;

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

Route::get('/', HomeController::class )->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('departamentos',DepartamentoController::class);

Route::resource('adquisicion',AdquisicionController::class);

Route::resource('revistas',RevistaController::class);

Route::resource('coleccion',ColeccionController::class);

Route::resource('idioma',IdiomaController::class);



