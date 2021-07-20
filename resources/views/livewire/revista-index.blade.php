<div>

    <div class="bg-gray-200 py-4 mb-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todas las revistas
            </button>


            <!-- component dropdown departamentos -->
            <div class="relative mr-4" x-data="{ open: false}">

                <button
                    class=" bg-white shadow block h-12 rounded-lg overflow-hidden focus:outline-none px-4 text-gray-700 "
                    x-on:click="open = true">
                    <i class="far fa-object-group mr-2"></i>
                    Departamentos
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>

                {{-- Dropdown body --}}
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl " x-show=" open "
                    x-on:click.away="open=false">

                    @foreach ($departamentos as $departamento)
                        <a 
                            class="trasition-colors curation-200 block px-4 py-2 text-normal rounded hover:bg-blue-500 hover:text-white" 
                            wire:click="$set('departamento_id',{{$departamento->id}})" 
                            x-on:click="open = false">
                            {{$departamento->departamento}}
                        </a>

                    @endforeach




                </div>
            </div>

            <!-- component dropdown idiomas -->
            <div class="relative" x-data="{ open: false}">

                <button
                    class=" bg-white shadow block h-12 rounded-lg overflow-hidden focus:outline-none px-4 text-gray-700 "
                    x-on:click="open = true">
                    <i class="fas fa-language text-sm mr-2 "></i>
                    Idiomas
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>

                {{-- Dropdown body --}}
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl " x-show=" open "
                    x-on:click.away="open=false">
                    @foreach ($idiomas as $idioma)
                        <a 
                            class="trasition-colors curation-200 block px-4 py-2 text-normal rounded hover:bg-blue-500 hover:text-white" 
                            wire:click="$set('idioma_id',{{$idioma->id_idioma}})" 
                            x-on:click="open = false">{{$idioma->idioma}}
                        </a>

                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-8">
        <ul>
            @foreach ($revistas as $revista)
                <li>
                    <a href="{{ route('revistas.show', $revista->id_revista) }}">{{ $revista->titulo }}</a>
                </li>

            @endforeach
        </ul>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8 ">
        {{ $revistas->links() }}


    </div>




</div>
