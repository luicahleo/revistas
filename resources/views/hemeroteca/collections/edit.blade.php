<x-app-layout>

    <div class="pt-2 relative mx-auto text-gray-600">

        <ul>
            {{ $collection }}

            {{-- @livewire('fondo', ['id_revista' => $fondos->id_revista[0]])
        <div class="ml-20">
            <button class="m-5 p-2 pl-5 py-5  bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">
                <a href="{{route('hemeroteca.collections.edit', $collection)}}">Agregar a la coleccion</a></button>
        </div> --}}

            <!-- component -->
            <div class="grid min-h-screen place-items-center">
                <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                    <h1 class="text-xl font-semibold">Rellene los campos necesarios de la coleccion <span class="font-normal"></span></h1>
                    <form class="mt-6">
                        <div class="flex justify-between gap-3">
                            <span class="w-1/2">
                                <label for="anyo"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Año</label>
                                <input id="anyo" type="text" name="anyo" placeholder="año"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="volumen"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Volumen</label>
                                <input id="volumen" type="text" name="volumen" placeholder="volumen"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="ene"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Enero</label>
                                <input id="ene" type="text" name="ene" placeholder="ene"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="feb"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Febrero</label>
                                <input id="feb" type="text" name="feb" placeholder="feb"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="mar"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Marzo</label>
                                <input id="mar" type="text" name="mar" placeholder="mar"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="abr"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Abril</label>
                                <input id="abr" type="text" name="abr" placeholder="abr"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="may"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Mayo</label>
                                <input id="may" type="text" name="may" placeholder="may"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="jun"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Junio</label>
                                <input id="jun" type="text" name="jun" placeholder="jun"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="jul"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Julio</label>
                                <input id="jul" type="text" name="jul" placeholder="jul"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="ago"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Agosto</label>
                                <input id="ago" type="text" name="ago" placeholder="ago"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="sep"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Septiembre</label>
                                <input id="sep" type="text" name="sep" placeholder="sep"
                                    autocomplete="given-name"sep
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="oct"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Octubre</label>
                                <input id="oct" type="text" name="oct" placeholder="oct"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="nov"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Noviembre</label>
                                <input id="nov" type="text" name="nov" placeholder="nov"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            <span class="w-1/2">
                                <label for="dic"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Diciembre</label>
                                <input id="dic" type="text" name="dic" placeholder="dic"
                                    autocomplete="family-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="observaciones"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Observaciones</label>
                                <input id="observaciones" type="text" name="observaciones" placeholder="observaciones"
                                    autocomplete="given-name"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                    required />
                            </span>
                        </div>
                        
                        <button type="submit"
                            class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Agregar Volumen
                        </button>
                        
                    </form>
                </div>
            </div>

        </ul>

    </div>

</x-app-layout>
