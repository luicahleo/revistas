<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('',[HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

//a las rutas resource no puedo agregar un middleware como el de arriba, asi que
// tengo que ir hasta el controlador para aplicar los filtros
Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');