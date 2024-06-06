@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Rol</h1>
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

        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

        @include('admin.roles.components.form')
        {!! Form::submit('actualizar rol', ['class' => 'btn btn-primary  ']) !!}

        {!! Form::close() !!}
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
