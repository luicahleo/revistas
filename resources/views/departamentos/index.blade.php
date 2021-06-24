<h1>Departamentos index</h1>



<ul>
    @foreach ($departamentos as $departamento)
        <li>
            {{$departamento->departamento}}
        </li>

    @endforeach
</ul>
