<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<strong>Permisos</strong>
<br>
<small class="my-0 text-danger"><strong>{{ $errors->first('permissions') }}</strong></small>
<br>
@foreach ($permissions as $permission)
    <div class="form-group">
        <div class="checkbox{{ $errors->has('permissions') ? ' has-error' : '' }}">
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['id' => 'permissions', 'class' => 'mr-1']) !!} {{ $permission->name }}
            </label>
        </div>
    </div>
@endforeach
