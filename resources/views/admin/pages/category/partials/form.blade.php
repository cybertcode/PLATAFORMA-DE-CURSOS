<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre de categoría') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Ingrese categoría',
    ]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
