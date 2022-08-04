@extends('adminlte::page')

@section('title', 'Precios')

@section('content_header')
    <h1>Precios</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="card-title">Editando precio</div>
            <a href="{{ route('admin.prices.index') }}" class="btn btn-danger btn-sm float-right">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::model($price, [
                'route' => ['admin.prices.update', $price],
                'method' => 'PUT',
                'class' => 'form-horizontal',
            ]) !!}
            @include('admin.pages.price.partials.form')
            <div class="btn-group pull-right">
                {!! Form::submit('Actualizar precio', ['class' => 'btn btn-primary']) !!}
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
