<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Revista;
use App\Models\Coleccion;

class Fondo extends Component
{

    //public $id_revista;

    public $id_revista;


    public function render()
    {
       
        $fondos = Coleccion::where('id_revista',$this->id_revista)->orderBy('anyo','desc')->get();

        return view('livewire.fondo',compact('fondos'));

    }
    public function getResultsProperty()
    {

        //$revista = new Revista();
        //$id_revista = $revista->id_revista;

        // return $revista;
        // return view('revistas.show',compact('revista'));

        // return Coleccion::where('id_revista',)->take(10)->get();
    }
}
