<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Coleccion;
use Livewire\Component;

class CreateCollection extends Component
{
    public $collection;
    public $open_collection = false;

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

    public function create_collection($collection)
    {
        $this->collection = $collection;

        //dd($collection);

       // $this->open_collection = true;

        Coleccion::create([
            'id_revista' => $this->collection,
            'anyo' => $this->anyo,
            'volumen' => $this->volumen,
            'ene' => $this->enero,
            'feb' => $this->febrero,
            'mar' => $this->marzo,
            'abr' => $this->abril,
            'may' => $this->mayo,
            'jun' => $this->junio,
            
        ]);

        $this->reset(['open_collection'
                    , 'id_revista'
                    , 'anyo'
                    , 'volumen'
                    , 'enero'
                    , 'febrero'
                    , 'marzo'
                    , 'abril'
                    , 'mayo'
                    , 'junio'

                
                
                ]); 

    }
}

