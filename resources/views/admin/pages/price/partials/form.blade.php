<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre de precio') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Ingrese precio',
    ]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
    <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        {!! Form::label('value', 'Valor') !!}
        {!! Form::text('value', null, [
            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
            'placeholder' => 'Valor',
        ]) !!}
        <small class="text-danger">{{ $errors->first('value') }}</small>
    </div>
</div>
