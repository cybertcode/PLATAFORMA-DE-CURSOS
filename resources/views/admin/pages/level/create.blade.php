@extends('adminlte::page')

@section('title', 'Nivel')

@section('content_header')
    <h1>Niveles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Nuevo nivel</div>
            <a href="{{ route('admin.levels.index') }}" class="btn btn-danger btn-sm float-right">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.levels.store', 'class' => 'form-horizontal']) !!}
            @include('admin.pages.level.partials.form')
            <div class="btn-group pull-right">
                {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                {!! Form::submit('Guardar nivel', ['class' => 'btn btn-primary']) !!}
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
