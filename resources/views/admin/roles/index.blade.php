@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary float-right " href="{{ route('admin.roles.create') }}">Nuevo rol</a>
    <h1>Lista de roles</h1>

@stop

@section('content')
    <div class="">

        @if (session('info'))
            <div class="alert alert-success">
                <Strong class="text">{{ session('info') }}</Strong>
            </div>
        @endif
    </div>
    <div class="card">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td width="10px"><a class="btn btn-primary btn-sm"
                                href="{{ route('admin.roles.edit', $role) }}">editar</a></td>
                        <td width="10px">
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
