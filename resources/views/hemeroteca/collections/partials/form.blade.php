<!-- component -->
{{-- <div class="grid min-h-screen place-items-center">
    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12"> --}}
<div>

    <h1 class="text-xl font-semibold">Rellene los campos necesarios de la coleccion <span class="font-normal"></span>
    </h1>

    <div class="flex justify-between gap-3 mt-2">
        <span class="w-1/2">
            {!! Form::label('id_revista', 'idREVISTA', ['class' => 'block text-xs font-semibold text-gray-600 uppercase']) !!}
            {!! Form::text('id_revista', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner' . ($errors->has('anyo') ? ' border-red-600' : '')]) !!}
        </span>

    </div>

    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('anyo', 'año', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('anyo', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner' . ($errors->has('anyo') ? ' border-red-600' : '')]) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('volumen', 'volumen', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('volumen', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner' . ($errors->has('anyo') ? ' border-red-600' : '')]) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('ene', 'enero', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('ene', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('feb', 'Febrero', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('feb', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('mar', 'Marzo', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('mar', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('abr', 'Abril', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('abr', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('may', 'Mayo', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('may', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('jun', 'Junio', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('jun', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('jul', 'Julio', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('jul', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('ago', 'Agosto', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('ago', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('sep', 'Septiembre', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('sep', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('oct', 'Octubre', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('oct', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('nov', 'Noviembre', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('nov', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('dic', 'Diciembre', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('dic', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
    <div class="flex justify-between gap-3">
        <span class="w-1/2">
            {!! Form::label('anyo_comp', 'Año completado', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('anyo_comp', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
        <span class="w-1/2">
            {!! Form::label('observaciones', 'Observaciones', ['class' => 'block text-xs font-semibold text-gray-600 uppercase mt-2']) !!}
            {!! Form::text('observaciones', null, ['class' => 'block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner']) !!}
        </span>
    </div>
</div>

{{-- </div>
</div> --}}
