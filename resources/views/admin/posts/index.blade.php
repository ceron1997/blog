@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right" >Nuevo Post</a>
    <h1>Listado de Post</h1>
@stop

@section('content')
   @livewire('admin.PostIndex')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop