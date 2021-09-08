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
                <div class="mb-4">
                    {!! Form::label('titulo', 'Titulo de la revista') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}

                </div>

                <div class="grid grid-cols-3  gap-4 mb-4">

                    <div>
                        {!! Form::label('acronimo_GLAS', 'Registro de pedido') !!}
                        {!! Form::text('acronimo_GLAS', $revista->acronimo_GLAS, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                    <div>
                        {!! Form::label('periodicidad', 'Periodicidad') !!}
                        {!! Form::text('periodicidad', $revista->periodicidad, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                    <div>
                        {!! Form::label('pais_origen', 'Pais') !!}
                        {!! Form::text('pais_origen', $revista->pais_origen, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                    <div>
                        {!! Form::label('idioma', 'Idioma') !!}
                        {!! Form::text('idioma', $revista->idioma, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>

                    <div>
                        {!! Form::label('ISSN', 'ISSN impreso') !!}
                        {!! Form::text('ISSN', $revista->ISSN, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                    <div>
                        {!! Form::label('ISSN_version_e', 'ISSN Electronico') !!}
                        {!! Form::text('ISSN_version_e', $revista->ISSN_version_e, ['class' => 'form-input block mt-1 rounded-lg']) !!}
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
                        {!! Form::text('id_responsable', $revista->id_responsable, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>

                    <div>
                        {!! Form::label('depositada_en', 'Depositada En:') !!}
                        {!! Form::text('depositada_en', $revista->depositada_en, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                </div>

                <div class="grid grid-cols-3 mb-4">
                    <div>
                        {!! Form::label('departamento', 'Departamento') !!}
                        {!! Form::text('departamento', $revista->departamento, ['class' => 'form-input block mt-1 rounded-lg w-3/4']) !!}
                    </div>

                    <div>
                        {!! Form::label('catedra', 'Catedra') !!}
                        {!! Form::text('catedra', $revista->catedra, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                    <div>
                        {!! Form::label('localizacion', 'Depositada En:') !!}
                        {!! Form::text('localizacion', $revista->localizacion, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>

                </div>

                <div class="grid grid-cols-2 mb-4">
                    <div>
                        {!! Form::label('estanteria', 'Estanteria') !!}
                        {!! Form::text('estanteria', $revista->estanteria, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>

                    <div>
                        {!! Form::label('adquisicion', 'Medio de adquisicion') !!}
                        {!! Form::text('adquisicion', $revista->adquisicion, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                </div>

                <div class="grid grid-cols-4 mb-4">
                    <div>
                        FIXME::aqui se tiene que arregla rel checkbox
                        {!! Form::checkbox('suscripcion_papel', $revista->suscripcion_papel, null, ['class' => 'text-indigo-500 w-8 h-8 mr-2 focus:ring-indigo-400 focus:ring-opacity-25 border border-gray-300 rounded']) !!}
                        {{ $revista->suscripcion_papel }}


                    </div>
                    <div>
                        {!! Form::label('anyo_papel', 'Periodo') !!}
                        {!! Form::text('anyo_papel', $revista->anyo_papel, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>

                    <div>
                        {!! Form::label('anyo_electronico', 'Periodo') !!}
                        {!! Form::text('anyo_electronico', $revista->anyo_electronico, ['class' => 'form-input block mt-1 rounded-lg']) !!}
                    </div>
                </div>
                {!! Form::close() !!}


            </div>

        </div>

    </div>

</x-app-layout>
