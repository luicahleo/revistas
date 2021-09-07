<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un nombre de rol']) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

<strong>Permisos</strong>

@error('permissions')
<br>
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>
@enderror

@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{ $permission->name }}

        </label>
    </div>
@endforeach