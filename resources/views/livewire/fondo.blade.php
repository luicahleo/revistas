<div class="pt-2 relative mx-auto text-gray-600">

    <h1>Este es fondo.blade.php</h1>
    


    <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
        {{-- @foreach ($this->results as $result)
            <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300 ">
                {{-- <a href="{{ route('revistas.show', $result) }}">{{ $result->titulo }}</a> --}}
            
                {{-- {{$result}} --}}
            
            {{-- </li> --}}
     

        {{-- @endforeach --}} --}}

            @foreach ($colecciones as $coleccion)
            <li>
                {{$coleccion->id_revista}}
            </li>
                
            @endforeach


    </ul>

</div>