<?php

namespace App\Http\Livewire\Hemeroteca;

use App\Models\Revista;
use Livewire\Component;

class RevistasCurriculum extends Component
{

    public $revista;

    public function mount(Revista $revista){
        $this->revista = $revista;
    }


    public function render()
    {
        return view('livewire.hemeroteca.revistas-curriculum')->layout('layouts.hemeroteca');
    }
}
