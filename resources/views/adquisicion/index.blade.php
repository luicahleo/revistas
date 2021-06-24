<h1>Adquisiciones index</h1>



<ul>
    @foreach ($adquisiciones as $adquisicion)
        <li>
            {{$adquisicion->adquisicion}}
        </li>

    @endforeach
</ul>
