<?php

namespace App\Http\Livewire;

use App\Models\Revista;
use Livewire\Component;

class RevistaIndex extends Component
{
    public function render()
    {

        $revistas = Revista::orderBy('id_revista','desc')->paginate(20);

        return view('livewire.revista-index', compact('revistas'));
    }
}
