<div class="pt-2 relative mx-auto text-gray-600">

    <ul>
        {{-- <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg overflow-hidden"> --}}
        {{-- @foreach ($this->results as $result)
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300 ">
                {{-- <a href="{{ route('revistas.show', $result) }}">{{ $result->titulo }}</a> --}}

        {{-- {{$result}} --}}

        {{-- </li> --}}


        {{-- @endforeach --}}



        <!-- component -->
        <style>
            body {
                background: white !important;
            }

        </style>

        <!-- component -->

        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800 text-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm border-gray-600">Año</th>
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
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Notas</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm border-gray-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">

                @foreach ($fondos as $fondo)

                    <tr>
                        <td class="w-1/3 text-left py-3 px-4 text-white border-b  bg-gray-700">{{ $fondo->anyo }}
                        </td>
                        <td class="w-1/3 text-left py-3 px-4 text-white border-b bg-gray-700"> {{ $fondo->volumen }}
                        </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->ene }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->feb }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->mar }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->abr }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->may }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->jun }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->jul }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->ago }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->sep }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->oct }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->nov }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->dic }} </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">{{ $fondo->observaciones }}
                        </td>
                        <td class="text-left py-3 px-4 text-white border-b bg-gray-700">Acciones </td>

                    </tr>

                @endforeach

            </tbody>
        </table>
        <div class="mb-20"></div>
        <!-- fill for tailwind preview bottom overflow -->
    </ul>

</div>
