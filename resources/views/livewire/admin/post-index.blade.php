<div class="card">

    <div class="card-header">
        <input class="form-control" wire:model.live="search"placeholder="Ingrese el nombre de un post " type="text">
    </div>

    @if ($posts->count())


        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan="2"></th>

                </thead>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tbody>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <h3>No hay Registros</h3>
        </div>

    @endif
</div>
