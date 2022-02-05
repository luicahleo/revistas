<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Coleccion;
use Livewire\Component;

class FondoHemeroteca extends Component
{

    public $collection;

    public $open_create_collection = false;


    public function render()
    {

        //dd($this->collection);

        $fondosHemeroteca = Coleccion::where('id_revista', $this->collection)->get();
        

        //dd($this->collection);
        //dd($fondosHemeroteca);


        return view('livewire.hemeroteca.fondo-hemeroteca');
    }

    // public function create(Coleccion $collection)
    // {

    //     $this->collection = $collection;
    //     $this->open_create_collection = true;
    // }
    public function create()
    {
        // $this->open_create_collection = false;

        $this->open_create_collection = true;
    }
}
