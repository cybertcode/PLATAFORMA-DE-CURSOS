@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Administración de Usuario</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito</strong> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <p class="card-title ">Asignando rol</p>
            <a class="float-right btn btn-danger" href="{{ route('admin.users.index') }}">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::model($usuario, [
                'route' => ['admin.users.update', $usuario],
                'method' => 'PUT',
                'class' => 'form-horizontal',
            ]) !!}
            {{-- Incluimos el formulario --}}
            @include('admin.pages.user.partials.form')
            <hr>
            <div class="btn-group pull-right">
                {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
