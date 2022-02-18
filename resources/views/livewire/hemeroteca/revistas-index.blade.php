<div>
    <!-- component -->
    <div>
        <x-table-responsive>
            {{-- buscador --}}
            <div class=" container px-6 py-4 flex grid grid-cols-4 gap-4">
                <input wire:keydown='limpiar_page' wire:model="search"
                    class=" pl-4 w-full flex-1 shadow-sm focus:outline-none col-start-1 col-span-2 " placeholder="Ingrese nombre de portada...">
                <a class="btn btn-danger ml-2 flex-1 col-end-5 col-span-1" href="{{ route('hemeroteca.revistas.create') }}">Crear nueva
                    portada</a>
            </div>
            <div class="container">

                @if ($revistas->count())
                    <!--  tabla que muestra lista de revistas-->
                    <table class="min-w-full divide-y divide-gray-200 gap-2">
                        <thead class="bg-gray-50 ">
                            <tr>
                                <th scope="col"
                                    class=" px-4 py-3  text-left text-lg font-extrabold text-gray-700 uppercase tracking-wider">
                                    TITULO REVISTA </th>
                                <th scope="col"
                                    class=" py-3 text-left text-lg font-extrabold text-gray-700 uppercase tracking-wider">
                                    MATERIA
                                </th>
                                <th scope="col"
                                    class=" py-3 text-left text-lg font-extrabold text-gray-700 uppercase tracking-wider">
                                    EDITOR
                                </th>
                                <th scope="col"
                                    class=" py-3 text-left text-lg font-extrabold text-gray-700 uppercase tracking-wider">
                                    ISSN
                                </th>
                                <th scope="col" class=" py-3 text-left text-lg font-extrabold text-gray-700 uppercase tracking-wider">            </th>
                                <th scope="col" class=" py-3 text-left text-lg font-extrabold text-gray-700 uppercase tracking-wider">             </th>
                                

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 ">
                            @foreach ($revistas as $item)
                                <tr>
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center ">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 whitespace-pre-line ">
                                                    {{ $item->titulo }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" py-4 ">
                                        <div class="text-sm text-gray-900 whitespace-pre-line">{{ $item->materia }}</div>
                                    </td>
                                    <td class=" py-4">
                                        <div class="text-sm text-gray-900 whitespace-pre-line gap-6">{{ $item->editor }}</div>
                                    </td>
                                    <td class=" py-4  text-sm text-gray-500">
                                        {{ $item->ISSN }}
                                    </td>
                                    
                                    
                                    <td><a href="{{ route('hemeroteca.revistas.edit', $item) }}"
                                        class="btn btn-green " data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Portada"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="{{ route('hemeroteca.revistas.edit', $item) }}"
                                            class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Portada"><i class="fas fa-archive"></i></a>
                                    </td>
                                    
                                        {{-- <td>
                                    <a wire:click="create_collection" class="btn btn-primary"><i
                                            class="fas fa-list"></i></a>
                                </td> --}}
                                    <td>
                                        <a href="{{ route('hemeroteca.collections.show', $item) }}"
                                            class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Colecciones de la Portada"><i class="fas fa-list"></i></a>
                                    </td>

                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('hemeroteca.revistas.edit', $revista)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td> --}}
                                    {{-- <td><a wire:click="edit_collection({{ $item->id_revista }}) "
                                            class="btn btn-green"><i class="fas fa-edit"></i></a></td> --}}
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>

                    <div class="px-6 py-4">
                        {{ $revistas->links() }}
                    </div>
                @else
                    <div class="px-6 py-4">
                        No hay ningun registro coincidente...
                    </div>

                @endif

            </div>

        </x-table-responsive>

        {{-- Modal edit --}}
        <x-jet-dialog-modal wire:model="open_edit">
            <x-slot name='title'>
                Editar coleccion
            </x-slot>

            <x-slot name='content'>

                {{-- <div class="alert alert-warning" role="alert" wire:loading wire:target='image'>
                Imagen cargando, espere hasta que se haya procesado!
            </div> --}}

                {{-- para mostrar imagenen al cargar --}}
                {{-- @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">

            @else
                <img src="{{ Storage::url($post->image) }}" alt="">

            @endif --}}


                <div class="mb-4">
                    <x-jet-label value="Titulo de la revista" />
                    <x-jet-input type="text" class="w-full" wire:model="revista.titulo" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Titulo de la materia" />
                    <x-jet-input type="text" class="w-full" wire:model="revista.materia" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Titulo del editor" />
                    <x-jet-input type="text" class="w-full" wire:model="revista.editor" />
                </div>
            </x-slot>

            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$set('open_edit', false)">Cacelar</x-jet-secondary-button>
                {{-- wire:loading.attr='disabled' wire:target='save' class="disabled:opacity-50" .... esta linea es para
            decirle que solo ejecute el metodo save
            que desabilite el boton mientras esta cargando con una opacidad del 50 % --}}
                {{-- wire:target='save, image' esto es para que desabilite cuando se graba o se esta cargando la imagen --}}
                {{-- <x-jet-danger-button wire:click='update' wire:loading.attr='disabled' wire:target='save, image' --}}
                <x-jet-danger-button class="disabled:opacity-50">
                    Actualizar
                </x-jet-danger-button>

            </x-slot>
        </x-jet-dialog-modal>
        {{-- fin modal edit --}}
        {{-- Modal create --}}
        <x-jet-dialog-modal wire:model="open_create">
            <x-slot name='title'>
                Crear coleccion
            </x-slot>

            <x-slot name='content'>

                {{-- <div class="alert alert-warning" role="alert" wire:loading wire:target='image'>
                Imagen cargando, espere hasta que se haya procesado!
            </div> --}}

                {{-- para mostrar imagenen al cargar --}}
                {{-- @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">

            @else
                <img src="{{ Storage::url($post->image) }}" alt="">

            @endif --}}


                <div class="mb-4">
                    <x-jet-label value="Titulo de la revista" />
                    <x-jet-input type="text" class="w-full" wire:model="revista.titulo" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Titulo de la materia" />
                    <x-jet-input type="text" class="w-full" wire:model="revista.materia" />
                </div>

                <div class="mb-4">
                    <x-jet-label value="Titulo del editor" />
                    <x-jet-input type="text" class="w-full" wire:model="revista.editor" />
                </div>
            </x-slot>

            <x-slot name='footer'>
                <x-jet-secondary-button wire:click="$set('open_create', false)">Cacelar</x-jet-secondary-button>
                {{-- wire:loading.attr='disabled' wire:target='save' class="disabled:opacity-50" .... esta linea es para
            decirle que solo ejecute el metodo save
            que desabilite el boton mientras esta cargando con una opacidad del 50 % --}}
                {{-- wire:target='save, image' esto es para que desabilite cuando se graba o se esta cargando la imagen --}}
                {{-- <x-jet-danger-button wire:click='update' wire:loading.attr='disabled' wire:target='save, image' --}}
                <x-jet-danger-button class="disabled:opacity-50">
                    Actualizar
                </x-jet-danger-button>

            </x-slot>
        </x-jet-dialog-modal>
        {{-- fin modal create --}}
    </div>
</div>
