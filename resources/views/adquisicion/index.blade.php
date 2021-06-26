<h1>Adquisiciones index</h1>



<ul>
    @foreach ($adquisiciones as $adquisicion)
        <li>
            {{$adquisicion->adquisicion}}
        </li>

    @endforeach
</ul>


<div class="pt-2 relative mx-auto text-gray-600">
    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus-outline-none"
    type="search" name="search" placeholder="Search">

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
        type="submit">
        Buscar
    </button>

</div>