@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito</strong> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <p class="card-title ">Editando rol</p>
            <a class="float-right btn btn-danger" href="{{ route('admin.roles.index') }}">Volver</a>
        </div>
        <div class="card-body">
            {!! Form::model($role, [
                'route' => ['admin.roles.update', $role],
                'method' => 'PUT',
                'class' => 'form-horizontal',
            ]) !!}
            {{-- Incluimos el formulario --}}
            @include('admin.pages.role.partials.form')
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
