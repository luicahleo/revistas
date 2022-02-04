<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Coleccion;
use Livewire\Component;

class FondoHemeroteca extends Component
{

    public $collection;




    public function render()
    {

        //dd($this->collection);

        $fondosHemeroteca = Coleccion::where('id_revista', $this->collection)->get();
        

        //dd($this->collection);
        //dd($fondosHemeroteca);


        return view('livewire.hemeroteca.fondo-hemeroteca', compact('fondosHemeroteca',$this->collection));
    }
}
