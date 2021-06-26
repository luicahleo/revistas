<?php

namespace App\Http\Livewire;

use App\Models\Revista;
use Livewire\Component;

class Search extends Component
{

    public $search;


    public function render()
    {

        return view('livewire.search');
    }


    public function getResultsProperty(){
        return Revista::where('titulo', 'LIKE', '%' . $this->search . '%')->take(10)->get();
    }
}
