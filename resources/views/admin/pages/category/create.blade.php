@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Nueva categoría</div>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger btn-sm float-right">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.categories.store', 'class' => 'form-horizontal']) !!}
            @include('admin.pages.category.partials.form')
            <div class="btn-group pull-right">
                {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                {!! Form::submit('Guardar categoría', ['class' => 'btn btn-primary']) !!}
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
