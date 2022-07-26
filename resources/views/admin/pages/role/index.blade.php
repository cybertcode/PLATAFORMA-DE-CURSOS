@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito</strong> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <p class="card-title ">Lista de roles</p>
            <a class="float-right btn btn-primary" href="{{ route('admin.roles.create') }}">Crear rol</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px"><a class="btn btn-secondary"
                                    href="{{ route('admin.roles.edit', $role) }}">Editar
                            </td>
                            <td width="10px">
                                <form method="POST" action="{{ route('admin.roles.destroy', $role) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">Sin roles</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
