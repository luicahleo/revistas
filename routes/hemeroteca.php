<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hemeroteca\RevistaController;

Route::redirect('', 'hemeroteca/revistas');

//Route::get('revistas',HemerotecaRevistas::class)->middleware('can:Leer revistas')->names('revistas');

Route::resource('revistas', RevistaController::class)->names('revistas');