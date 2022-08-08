<div>
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito</strong> {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex flex-row justify-content-end">
            {{-- <p class="card-title ">Todos los usuarios registrados</p> --}}
            <input wire:model='search' type="search" class="form-control w-50" placeholder="Buscar">
            <a class=" btn btn-primary ml-4" href="#">Crear Usuario</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Correo electrónico</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td width="10px"><a class="btn btn-secondary"
                                    href="{{ route('admin.users.edit', $usuario) }}">Editar
                            </td>
                            <td width="10px">
                                <form method="POST" action="{{ route('admin.users.destroy', $usuario) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}

        </div>
    </div>
</div>
