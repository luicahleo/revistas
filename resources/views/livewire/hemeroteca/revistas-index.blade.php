<div>
    <!-- component -->
    <div>
        <x-table-responsive>
            {{-- buscador --}}
            <div class="px-6 py-4 flex">
                <input wire:keydown='limpiar_page' wire:model="search" class=" pl-4 w-full flex-1 shadow-sm focus:outline-none" placeholder="Ingrese nombre de revista...">
                <a class="btn btn-danger ml-2 flex-1" href="{{route('hemeroteca.revistas.create')}}">Insertar nueva revista</a>
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
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($revistas as $revista)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $revista->titulo }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $revista->materia }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $revista->editor }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $revista->ISSN }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('hemeroteca.revistas.edit', $revista)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                </td>
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
    </div>
</div>
