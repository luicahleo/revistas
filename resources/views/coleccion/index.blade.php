<h1>Coleccion index</h1>



<ul>
    @foreach ($colecciones as $coleccion)
        <li>
            {{$coleccion->id_revista}}
        </li>

    @endforeach
</ul>
