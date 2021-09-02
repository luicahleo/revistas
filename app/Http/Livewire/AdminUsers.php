<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

//para usar la paginacion de livewire
use Livewire\WithPagination;

class AdminUsers extends Component
{
    //esta linea es necesaria para la paginacion con livewire
    use WithPagination;

    //para que la paginacion la use con Bootstrap
    protected $paginationTheme = "bootstrap";

    //propiedad para sincronizar lo que escriba en el buscador 
    public $search;    

    
    public function render()
    {
        //para la paginacion
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(8);


        return view('livewire.admin-users', compact('users'));
    }

    /**
     * Metodo para que el buscador busque desde la pagina 1 hacia adelante
     * limpiamos la propiedad page de WithPagination
     */
    public function limpiar_page(){
        $this->reset('page');
    }
}
