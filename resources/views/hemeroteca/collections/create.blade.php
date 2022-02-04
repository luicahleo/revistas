<x-app-layout>
    {{-- <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">REGISTRAR NUEVA REVISTA</h1>

                {!! Form::open(['route' => 'hemeroteca.revistas.store', 'file' => true, 'autocomplete' => 'off']) !!}
                @include('hemeroteca.revistas.partials.form')

                <div class="flex justify-center">
                    {!! Form::submit('Registrar nueva revista', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
                <hr class="mt-2 mb-6">
            </div>
        </div>
    </div> --}}

    {{$collection->coleccion_id}}



</x-app-layout>
