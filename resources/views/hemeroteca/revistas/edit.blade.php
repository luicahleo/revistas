<x-hemeroteca-layout>

{{-- creamos slot con combre para pasar la variable $revista a la plantilla hemeroteca.blade.php , pero solo pasaremos el id de la revista --}}
    <x-slot name="revista">
        {{ $revista->id_revista}}
    </x-slot>



    <h1 class="text-2xl font-bold"> INFORMACION DE LA REVISTA</h1>
    <hr class="mt-2 mb-6 ">

    {!! Form::model($revista, ['route' => ['hemeroteca.revistas.update', $revista], 'method' => 'put']) !!}

    @include('hemeroteca.revistas.partials.form')

    <div class="flex justify-center">
        {!! Form::submit('Actualizar revista', ['class' => 'mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer']) !!}
    </div>
    {!! Form::close() !!}


</x-hemeroteca-layout>
