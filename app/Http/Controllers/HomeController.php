<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $revistas = Revista::orderBy('id_revista','desc')->get();

        return view('welcome', compact('revistas'));

    }
}
