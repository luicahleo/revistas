
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">



<h1>Revistas index</h1>



<ul>
    @foreach ($revistas as $revista)
        <li>
            {{$revista->titulo}}
        </li>

    @endforeach
</ul>


{{$revistas->links()}}