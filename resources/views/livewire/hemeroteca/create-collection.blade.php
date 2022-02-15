<div>
    <div>

        {{-- {{ $collections }} --}}
        {{-- {{$revista}} --}}
        <div class="container">
            <button wire:click="$set('open_collection', true)"
                class="m-5 p-2 py-5  bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">
                Crear Coleccion para la revista con id: {{ $collection }} <br>
            <span class="text-xl text-bold">{{$revista->titulo}}</span></button>
                <br>
            <button class="m-5 p-2 py-5  bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">
                <a href="{{ route('hemeroteca.revistas.index') }}"><i class="fa fa-arrow-circle-left"> Volver </i> </a>

            </button>
        </div>

        <x-jet-dialog-modal wire:model="open_collection">
            <x-slot name="title">
                <h1 class="text-xl font-semibold">Rellene los campos necesarios para la coleccion <span
                        class="font-normal"></span>
                </h1>
            </x-slot>
            <x-slot name="content">

                @include('hemeroteca.collections.partials.form_modal_collection')

            </x-slot>
            <x-slot name="footer">

                <x-jet-secondary-button wire:click="$set('open_collection', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="create_collection({{ $collection }})">
                    Crear coleccion
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

    </div>

</div>
