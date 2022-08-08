@extends('adminlte::page')

@section('title', 'Precios')

@section('content_header')
    <h1>Precios</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="card-title">Lista de precios</p>
            <a href="{{ route('admin.prices.create') }}" class="btn btn-primary btn-sm float-right">Nuevo precio</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{ $price->id }}</td>
                            <td>{{ $price->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.prices.edit', $price) }}">editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.prices.destroy', $price) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $prices->links('vendor.pagination.bootstrap-5') }}
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
