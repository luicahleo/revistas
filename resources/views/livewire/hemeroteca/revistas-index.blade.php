<div>
    <!-- component -->
    <div>
        <x-table-responsive>
            {{-- buscador --}}
            <div class="px-6 py-4 flex">
                <input wire:keydown='limpiar_page' wire:model="search"
                    class=" pl-4 w-full flex-1 shadow-sm focus:outline-none" placeholder="Ingrese nombre de revista...">
                <a class="btn btn-danger ml-2 flex-1" href="{{ route('hemeroteca.revistas.create') }}">Insertar nueva
                    revista</a>
            </div>
            @if ($revistas->count())
                <!--  tabla que muestra lista de revistas-->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                TITULO REVISTA </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                MATERIA
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                EDITOR
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ISSN
                            </th>
                            <th></th>
                            <th></th></th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($revistas as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->titulo }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $item->materia }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $item->editor }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->ISSN }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $item->ISSN }}
                                </td>
                                <td>
                                    <a href="{{ route('hemeroteca.collections.show', $item->id_revista) }}"
                                        class="btn btn-primary"><i class="fas fa-list"></i></a>
                                </td>
                                <td><a href="{{ route('hemeroteca.revistas.edit', $item) }}"
                                        class="btn btn-danger"><i class="fas fa-archive"></i></a>
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('hemeroteca.revistas.edit', $revista)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td> --}}
                                <td><a wire:click="edit_volumen({{ $item->id_revista }}) " class="btn btn-green"><i
                                            class="fas fa-edit"></i></a></td>
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

        </x-table-responsive>

        {{-- Modal edit --}}
        <x-jet-dialog-modal wire:model="open_edit">
            <x-slot name='title'>
                Editar el post
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
    </div>
</div>
