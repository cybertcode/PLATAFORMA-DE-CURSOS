@extends('adminlte::page')

@section('title', 'Precio')

@section('content_header')
    <h1>Precios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Nuevo precio</div>
            <a href="{{ route('admin.prices.index') }}" class="btn btn-danger btn-sm float-right">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.prices.store', 'class' => 'form-horizontal']) !!}
            @include('admin.pages.price.partials.form')
            <div class="btn-group pull-right">
                {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                {!! Form::submit('Guardar Precio', ['class' => 'btn btn-primary']) !!}
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
