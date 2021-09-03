<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\HemerotecaRevistas;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'hemeroteca/revistas');

Route::get('revistas',HemerotecaRevistas::class)->middleware('can:Leer revistas')->name('revistas.index');