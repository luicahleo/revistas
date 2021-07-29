<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Revista;
use App\Models\Coleccion;

class Fondo extends Component
{
    public function render()
    {
        $colecciones = Coleccion::all();

        //return $colecciones;

        //$id_revista = 1490;

        //$colecciones = Coleccion::where('id_revista',$id_revista)->get();

        //return $colecciones;

        //return view('livewire.fondo',compact('colecciones'));
        return view('livewire.fondo',compact('colecciones'));

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
