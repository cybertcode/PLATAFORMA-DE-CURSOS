@extends('adminlte::page')

@section('title', 'Observación del curso')

@section('content_header')
    <h1>Observación del curso: {{ $course->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => ['admin.courses.reject', $course]]) !!}
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {!! Form::label('body', 'Observación') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('body') }}</small>
            </div>
            <div class="btn-group pull-right">
                {!! Form::submit('Rechazar curso', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
