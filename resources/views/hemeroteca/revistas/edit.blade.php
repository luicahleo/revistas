<x-app-layout>

    <div class="container py-8 grid grid-cols-5">

        <aside>
            <h1 class="font-bold text-lg mb-4 pl-5">
                Edicion de la revista
            </h1>

            <ul class="text-sm text-gray-600 pl-5">
                <li class="leading-7 mb-1 border-1-4 border-indigo-400 pl-2"> <a href=""> Informacion de la revista </a>
                </li>
                <li class="leading-7 mb-1 border-1-4 border-transparent pl-2"><a href=""> Informacion de Departamento
                    </a> </li>
                <li class="leading-7 mb-1 border-1-4 border-transparent pl-2"><a href=""> Materia </a> </li>
                <li class="leading-7 mb-1 border-1-4 border-transparent pl-2"><a href=""> ISSN </a> </li>
            </ul>
        </aside>

        <div class="col-span-4 card">
            <div class="card-body bg-gray-200">
                <h1 class="text-2xl font-bold"> INFORMACION DE LA REVISTA</h1>
                <hr class="mt-2 mb-6 ">

                {!! Form::model($revista, ['route' => ['hemeroteca.revistas.update', $revista], 'method' => 'put']) !!}
               
                @include('hemeroteca.revistas.partials.form')

                <div class="flex justify-center">
                    {!! Form::submit('Actualizar revista', ['class' => 'mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
                </div>
                {!! Form::close() !!}


            </div>

        </div>

    </div>

</x-app-layout>
