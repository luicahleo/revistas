<x-app-layout>

    {{-- Portada --}}
    <section class="bg-gray-200 py-12">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="w-full mx-auto md:w-3/4 lg:w-1/2">

                <h1 class="text-center text-gray-800 font-extrabold text-3xl">{{ $revista->titulo }}</h1>

                <!-- Tabla -->
                <div>
                    <table
                        class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-blue-500">

                        <tr class="text-left border-b-2 border-indigo-300">
                            <th class="px-4 py-3 font-bold text-2xl">Titulo</th>
                            <th class="px-4 py-3 font-bold text-2xl">Editor</th>
                            <th class="px-4 py-3 font-bold text-2xl">Materia</th>
                            <th class="px-4 py-3 font-bold text-2xl">Pais</th>
                        </tr>

                        <tr class="border-b border-indigo-400">
                            <td class="px-4 py-3 text-gray-300">{{ $revista->titulo }}</td>
                            <td class="px-4 py-3 text-gray-300">{{ $revista->editor }}</td>
                            <td class="px-4 py-3 text-gray-300">{{ $revista->materia }}</td>
                            <td class="px-4 py-3 text-gray-300">{{ $revista->pais_origen }}</td>
                            
                        </tr>

                    </table>

                    <!-- gradient design -->
                </div>
                <div class="mb-20"></div>
                <!-- fill for tailwind preview bottom overflow -->

            </div>
        </div>
    </section>



</x-app-layout>
