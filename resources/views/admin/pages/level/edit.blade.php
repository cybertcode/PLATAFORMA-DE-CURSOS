@extends('adminlte::page')

@section('title', 'Niveles')

@section('content_header')
    <h1>Niveles</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="card-title">Editando nivel</div>
            <a href="{{ route('admin.levels.index') }}" class="btn btn-danger btn-sm float-right">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::model($level, [
                'route' => ['admin.levels.update', $level],
                'method' => 'PUT',
                'class' => 'form-horizontal',
            ]) !!}
            @include('admin.pages.level.partials.form')
            <div class="btn-group pull-right">
                {!! Form::submit('Actualizar nivel', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
