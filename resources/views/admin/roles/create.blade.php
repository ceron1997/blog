@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    <div class="card">
        
        {!! Form::open(['route' => 'admin.roles.store']) !!}
        
                @include('admin.roles.components.form')
            {!! Form::submit('crear rol', ['class' => 'btn btn-primary  ']) !!}

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
