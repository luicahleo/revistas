<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Coleccion;
use App\Models\Revista;
use Livewire\Component;

class CreateCollection extends Component
{
    public $collection;
    public $open_collection = false;

    public  $id_revista,
            $anyo,
            $volumen,
            $ene,
            $feb,
            $mar,
            $abr,
            $may,
            $jun,
            $jul,
            $ago,
            $sep,
            $oct,
            $nov,
            $dic,
            $observaciones;


    public function mount($collection)
    {
        $this->collection = $collection;
    }

    protected $rules = [
        'anyo' => 'required'
    ];



    public function render()
    {

        $collections = Coleccion::where('id_revista', $this->collection)->get();
        $revista = Revista::find($this->collection);
        //dd($revista);

        return view('livewire.hemeroteca.create-collection', compact('collections', 'revista'));
    }

    public function create_collection($collection)
    {
        $this->validate();


        $this->collection = $collection;

        //dd($collection);

       // $this->open_collection = true;

        Coleccion::create([
            'id_revista' => $this->collection,
            'anyo' => $this->anyo,
            'volumen' => $this->volumen,
            'ene' => $this->ene,
            'feb' => $this->feb,
            'mar' => $this->mar,
            'abr' => $this->abr,
            'may' => $this->may,
            'jun' => $this->jun,
            'jul' => $this->jul,
            'ago' => $this->ago,
            'sep' => $this->sep,
            'oct' => $this->oct,
            'nov' => $this->nov,
            'dic' => $this->dic,
            'observaciones' => $this->observaciones,

            
        ]);

        $this->reset(['open_collection'
                    , 'id_revista'
                    , 'anyo'
                    , 'volumen'
                    , 'ene'
                    , 'feb'
                    , 'mar'
                    , 'abr'
                    , 'may'
                    , 'jun'
                    , 'jul'
                    , 'ago'
                    , 'sep'
                    , 'oct'
                    , 'nov'
                    , 'dic'
                    , 'observaciones'

                
                
                ]); 

                $this->emit('alert', 'Presione "OK" y refresque la pagina ');

    }

}
