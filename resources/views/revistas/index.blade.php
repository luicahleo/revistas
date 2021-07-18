<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">



<h1>Revistas index</h1>



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-8">




    <ul>
        @foreach ($revistas as $revista)
            <li>
                <a href="{{ route('revistas.show', $revista->id_revista) }}">{{ $revista->titulo }}</a>
            </li>

        @endforeach
    </ul>
</div>

{{ $revistas->links() }}
