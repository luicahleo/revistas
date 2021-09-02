<div>

    {{-- buscador --}}



    {{-- tabla muestra usuarios --}}
    <div class="card">
        {{-- buscador --}}
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre">
        </div>

        {{-- si existe algun registro en la coleccion, entonces muestra la tabla--}}
        @if ($users->count()) 

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- para la paginacion --}}
            <div class="card-footer">
                {{ $users->links() }}
            </div>

            @else
            <div class="card-body">
                <strong>No hay registros...</strong>
            </div>
        @endif

    </div>
</div>
