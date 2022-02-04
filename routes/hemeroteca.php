<?php

use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\Hemeroteca\ColletionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hemeroteca\RevistaController;
use App\Http\Livewire\Hemeroteca\RevistasCurriculum;

Route::redirect('', 'hemeroteca/revistas');

//Route::get('revistas',HemerotecaRevistas::class)->middleware('can:Leer revistas')->names('revistas');

Route::resource('revistas', RevistaController::class)->names('revistas');

Route::get('revistas/{revista}/curriculum', RevistasCurriculum::class)->name('revistas.curriculum');

Route::resource('collections', ColletionController::class)->names('collections');
