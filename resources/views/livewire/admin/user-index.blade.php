<div>
    <div class="card">

        <div class="card-header">

            <input type="text" wire:model.live="search" class="form-control"
                placeholder="Ingrese el nombre o correo del usuario">
        </div>
        @if ($users->count())
            <div class="card-body">



                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</a></td>
                                <td width="10px"><a class="btn btn-primary btn:sm"
                                        href="{{ route('admin.users.edit', $user) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <h3>No hay Registros</h3>
            </div>
        @endif
    </div>
</div>
