<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Coleccion;
use Livewire\Component;

class CreateCollection extends Component
{
    public $collection;
    public $open_collection = true;

    public  $id_revista,
            $anyo,
            $volumen,
            $enero,
            $febrero,
            $marzo,
            $abril,
            $mayo,
            $junio;

    public function mount($collection)
    {
        $this->collection = $collection;
    }

    public function render()
    {

        $collections = Coleccion::where('id_revista', $this->collection)->get();

        return view('livewire.hemeroteca.create-collection', compact('collections'));
    }

    public function create_collection($open)
    {
        $this->open = $open;

    }
}
