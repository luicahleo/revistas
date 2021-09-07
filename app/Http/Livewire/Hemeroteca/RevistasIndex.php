<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Revista;
use Livewire\Component;

//para que la paginacion sea dinamica
use Livewire\WithPagination;

class RevistasIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $revistas = Revista::where('titulo', 'LIKE', '%' . $this->search . '%')
                            ->orderBy('id_revista','desc')
                            ->paginate(8);
                            

        //return $revistas;


        return view('livewire.hemeroteca.revistas-index',compact('revistas'));
    }


    //para empezar a buscar desde la pagina 1
    public function limpiar_page(){
        $this->reset('page');
    }
}
