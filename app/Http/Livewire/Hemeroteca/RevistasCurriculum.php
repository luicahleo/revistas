<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Revista;
use Livewire\Component;

class RevistasCurriculum extends Component
{

    // definimos propiedad
    public $revista;

    // metodo
    public function mount(Revista $revista){
        // asignamos el valor instanciado al valor de la propiedad del modelo 
        $this->revista = $revista;
    }


    public function render()
    {
        // C41
        return view('livewire.hemeroteca.revistas-curriculum')->layout('layouts.hemeroteca');
    }
}


