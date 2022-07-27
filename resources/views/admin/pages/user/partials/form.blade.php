<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'readonly' => true,
    ]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<strong>Roles</strong>
<br>
<small class="my-0 text-danger"><strong>{{ $errors->first('roles') }}</strong></small>
<br>
@foreach ($roles as $role)
    <div class="form-group">
        <div class="checkbox{{ $errors->has('roles') ? ' has-error' : '' }}">
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!} {{ $role->name }}
            </label>
        </div>
    </div>
@endforeach
