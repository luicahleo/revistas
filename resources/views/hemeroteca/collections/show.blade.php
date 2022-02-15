<x-app-layout>
    <div>
        {{-- {{$collections}} --}}
        <div class="pt-2 relative mx-auto text-gray-600">
            <ul>
                <style>
                    body {
                        background: white !important;
                    }

                </style>

                {{-- {{$collection}} --}}

                {{-- @livewire('fondo-hemeroteca', ['id_revista' => $fondos->id_revista[0]]) --}}
                {{-- @livewire('hemeroteca.fondo-hemeroteca') --}}
                {{-- <div class="ml-20">
                    <button class="m-5 p-2 pl-5 py-5  bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">
                        <a href="{{ route('hemeroteca.collections.create') }}">Crear Coleccion</a></button>
                </div> --}}

                {{-- <div class="ml-20">
                    <button wire:click="$set('open', true)" class="m-5 p-2 pl-5 py-5  bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">
                        <a href="">Crear Coleccion</a></button>
                </div> --}}
                <div>@livewire('hemeroteca.create-collection',['collection'=>$collection->coleccion_id])</div>

                <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm border-gray-600">Año
                            </th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Vol.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ene.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Feb..</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Mar.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Abr.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">May.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Jun.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Jul.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ago.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sep.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Oct.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nov.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Dic.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Obs.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID Col.</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>


                        </tr>
                    </thead>
                    <tbody class="text-gray-700">

                        @foreach ($collections as $fondo)
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4 text-white border-b  bg-gray-700">
                                    {{ $fondo->anyo }}</td>
                                <td class="w-1/3 text-left py-3 px-4 text-white border-b bg-gray-700">
                                    {{ $fondo->volumen }}</td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->ene }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->feb }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->mar }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->abr }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->may }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->jun }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->jul }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->ago }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->sep }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->oct }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->nov }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->dic }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">
                                    {{ $fondo->observaciones }}
                                </td>
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700">
                                    {{ $fondo->coleccion_id }}
                                </td>
                                

                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><a
                                        href="{{ route('hemeroteca.collections.edit', $fondo->coleccion_id) }}"
                                        class="btn btn-primary"><i class="fas fa-edit" ></i></a></a>
                                </td>
                                
                                <td class="text-left py-3 px-4 text-white border-b bg-gray-700" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                    <form action="{{ route('hemeroteca.collections.destroy', $fondo->coleccion_id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>


                                    {{-- <a href="" class="btn btn-danger">
                                        <i class="fas fa-trash">
                                            <form action=""></form>
                                        </i>
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mb-20"></div>
                <!-- fill for tailwind preview bottom overflow -->

            </ul>
        </div>

    </div>


    {{-- @livewire('hemeroteca.fondo-hemeroteca',['collection' => $collection]) --}}

</x-app-layout>
