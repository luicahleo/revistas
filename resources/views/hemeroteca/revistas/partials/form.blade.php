<div class="mb-4">
    {!! Form::label('titulo', 'Titulo de la revista') !!}
    {!! Form::text('titulo', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

</div>

<div class="grid grid-cols-3  gap-4 mb-4">

    <div>
        {!! Form::label('acronimo_GLAS', 'Registro de pedido') !!}
        {!! Form::text('acronimo_GLAS',null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('periodicidad', 'Periodicidad') !!}
        {!! Form::text('periodicidad', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('pais_origen', 'Pais') !!}
        {!! Form::text('pais_origen', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('idioma', 'Idioma') !!}
        {!! Form::text('idioma', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>

    <div>
        {!! Form::label('ISSN', 'ISSN impreso') !!}
        {!! Form::text('ISSN', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('ISSN_version_e', 'ISSN Electronico') !!}
        {!! Form::text('ISSN_version_e', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
</div>

<div class="mb-4">
    {!! Form::label('editor', 'Editor') !!}
    {!! Form::text('editor', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

</div>
<div class="mb-4">
    {!! Form::label('materia', 'Materia') !!}
    {!! Form::text('materia', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

</div>
<div class="mb-4">
    {!! Form::label('direccion_url', 'URL') !!}
    {!! Form::text('direccion_url', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

</div>

<div class="grid grid-cols-2 mb-4">
    <div>
        {!! Form::label('id_responsable', 'Unidad solicitante') !!}
        {!! Form::text('id_responsable', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>

    <div>
        {!! Form::label('depositada_en', 'Depositada En:') !!}
        {!! Form::text('depositada_en', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
</div>

<div class="grid grid-cols-3 mb-4">
    <div>
        {!! Form::label('departamento', 'Departamento') !!}
        {!! Form::text('departamento', null, ['class' => 'form-input block mt-1 rounded-lg w-3/4']) !!}
    </div>

    <div>
        {!! Form::label('catedra', 'Catedra') !!}
        {!! Form::text('catedra', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('localizacion', 'Localizacion: ') !!}
        {!! Form::text('localizacion', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>

</div>

<div class="grid grid-cols-2 mb-4">
    <div>
        {!! Form::label('estanteria', 'Estanteria') !!}
        {!! Form::text('estanteria', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>

    <div>
        {!! Form::label('adquisicion', 'Medio de adquisicion') !!}
        {!! Form::text('adquisicion', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
</div>

<div class="grid grid-cols-4 mb-4">
    <div>
        {!! Form::label('suscripcion_papel', 'Suscripcion papel', ['class' => 'inline-flex items-center']) !!}
        {!! Form::checkbox('suscripcion_papel', null, null, ['class' => 'mt-2 ml-8 flex text-indigo-500 w-8 h-8 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded']) !!}
    </div>
    <div>
        {!! Form::label('anyo_papel', 'Periodo papel') !!}
        {!! Form::text('anyo_papel', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('suscripcion_papel', 'Suscripcion Electronica', ['class' => 'inline-flex items-center']) !!}
        {!! Form::checkbox('suscripcion_papel', null, null, ['class' => 'mt-2 ml-8 flex text-indigo-500 w-8 h-8 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded']) !!}
    </div>
    <div>
        {!! Form::label('anyo_electronico', 'Periodo electronica') !!}
        {!! Form::text('anyo_electronico', null, ['class' => 'form-input block mt-1 rounded-lg']) !!}
    </div>
</div>

<div class="mb-4">
    {!! Form::label('fondos', 'Fondos') !!}
    {!! Form::text('fondos', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

</div>
<div class="grid grid-cols-3 mb-4">
    <div>
        {!! Form::label('web', 'Disponible de web', ['class' => 'inline-flex items-center']) !!}
        {!! Form::checkbox('web', null, null, ['class' => 'mt-2 ml-8 flex text-indigo-500 w-8 h-8 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded']) !!}
    </div>
    <div>
        {!! Form::label('indices_en_web', 'Indices en web', ['class' => 'inline-flex items-center']) !!}
        {!! Form::checkbox('indices_en_web', null, null, ['class' => 'mt-2 ml-8 flex text-indigo-500 w-8 h-8 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded']) !!}
    </div>
    <div>
        {!! Form::label('full_text_en_web', 'Texto completo en web', ['class' => 'inline-flex items-center']) !!}
        {!! Form::checkbox('full_text_en_web', null, null, ['class' => 'mt-2 ml-8 flex text-indigo-500 w-8 h-8 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded']) !!}
    </div>
</div>
<div class="mb-4">
    {!! Form::label('revista_electronica', 'Acceso Electronico 1') !!}
    {!! Form::text('revista_electronica', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

</div>
<div class="mb-4">
    {!! Form::label('revista_electronica2', 'Acceso Electronico 2') !!}
    {!! Form::text('revista_electronica2', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
</div>
