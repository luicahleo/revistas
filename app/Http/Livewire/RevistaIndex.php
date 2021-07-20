<?php

namespace App\Http\Livewire;

use App\Models\Revista;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Idioma;

use Livewire\WithPagination;

class RevistaIndex extends Component
{

    use WithPagination;

    public $departamento_id;
    public $idioma_id; 




    public function render()
    {

        $departamentos = Departamento::all();
        $idiomas = Idioma::all();

        $revistas = Revista::orderBy('id_revista','desc')->paginate(20);

        //TODO, revisar esta parte para los filtros
        // $revistas = Revista::where('coleccion',1)
        //                           ->departamento($this->departamento_id)
        //                           ->idioma($this->idioma_id)
        //                           ->latest('id_revista')
        //                           ->paginate(8);

        // $revistas = Revista::where('coleccion',1)
        //                     ->departamento($this->departamento_id)
        //                     ->idioma($this->idioma_id)
        //                     ->latest('id_revista')
        //                     ->paginate(8);


        return view('livewire.revista-index', compact('revistas', 'departamentos','idiomas'));
    }
}
