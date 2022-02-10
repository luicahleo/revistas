<x-app-layout>

    <div class="pt-2 relative mx-auto text-gray-600">

        <ul>
            {{-- {{ $collection }} --}}

            <div class="grid min-h-screen place-items-center">
                <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                    <h1 class="text-xl font-semibold">Rellene los campos necesarios para editar la coleccion <span
                            class="font-normal"></span></h1>
                    <form class="mt-6" action="{{route('hemeroteca.collections.update',$collection)}}" method="POST">
                        @csrf
                        @method('put')

                        <div class="flex justify-between gap-3">
                            <span class="w-1/2">
                                <label for="coleccion_id" class="block text-xs font-semibold text-gray-600 uppercase">Coleccion ID</label>
                                <input id="coleccion_id" type="text" name="coleccion_id" 
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->coleccion_id}}"/>
                            </span>
                            
                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="anyo" class="block text-xs font-semibold text-gray-600 uppercase">Año</label>
                                <input id="anyo" type="text" name="anyo" 
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->anyo}}"/>
                            </span>
                            <span class="w-1/2">
                                <label for="volumen"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Volumen</label>
                                <input id="volumen" type="text" name="volumen" 
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->volumen}}" />
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="ene"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Enero</label>
                                <input id="ene" type="text" name="ene" 
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->ene}}" />
                            </span>
                            <span class="w-1/2">
                                <label for="feb"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Febrero</label>
                                <input id="feb" type="text" name="feb"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->feb}}"/>
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="mar"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Marzo</label>
                                <input id="mar" type="text" name="mar"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->mar}}" />
                            </span>
                            <span class="w-1/2">
                                <label for="abr"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Abril</label>
                                <input id="abr" type="text" name="abr"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->abr}}"/>
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="may"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Mayo</label>
                                <input id="may" type="text" name="may"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->may}}"/>
                            </span>
                            <span class="w-1/2">
                                <label for="jun"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Junio</label>
                                <input id="jun" type="text" name="jun"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->jun}}"/>
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="jul"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Julio</label>
                                <input id="jul" type="text" name="jul"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->jul}}"/>
                            </span>
                            <span class="w-1/2">
                                <label for="ago"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Agosto</label>
                                <input id="ago" type="text" name="ago" 
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->ago}}"/>
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="sep"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Septiembre</label>
                                <input id="sep" type="text" name="sep"  sep
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->sep}}"/>
                            </span>
                            <span class="w-1/2">
                                <label for="oct"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Octubre</label>
                                <input id="oct" type="text" name="oct"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->oct}}"/>
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="nov"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Noviembre</label>
                                <input id="nov" type="text" name="nov"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->nov}}"/>
                            </span>
                            <span class="w-1/2">
                                <label for="dic"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Diciembre</label>
                                <input id="dic" type="text" name="dic"  
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->dic}}"/>
                            </span>

                        </div>
                        <div class="flex justify-between gap-3 mt-2">
                            <span class="w-1/2">
                                <label for="observaciones"
                                    class="block text-xs font-semibold text-gray-600 uppercase">Observaciones</label>
                                <input id="observaciones" type="text" name="observaciones" 
                                    
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                                     value="{{$collection->observaciones}}"/>
                            </span>
                        </div>

                        <button type="submit"
                            class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Actualizar coleccion
                        </button>

                    </form>
                </div>
            </div>

        </ul>

    </div>

</x-app-layout>
