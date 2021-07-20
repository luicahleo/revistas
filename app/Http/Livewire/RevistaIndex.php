<?php

namespace App\Http\Livewire;

use App\Models\Revista;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Idioma;

class RevistaIndex extends Component
{
    public function render()
    {

        $departamentos = Departamento::all();
        $idiomas = Idioma::all();
        $revistas = Revista::orderBy('id_revista','desc')->paginate(20);

        return view('livewire.revista-index', compact('revistas', 'departamentos','idiomas'));
    }
}
