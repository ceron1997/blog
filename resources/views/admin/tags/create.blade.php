@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store']) !!}
      @include('admin/tags/partials/form')
        {!! Form::submit('Crear etiqueda', ['Class' => 'btn btn-primary']) !!}
        {!! Form::close([]) !!}

    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-',
        });
    </script>
@endsection