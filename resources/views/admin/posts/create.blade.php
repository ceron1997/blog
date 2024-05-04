@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del curso']) !!}

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el slug del curso',
                    'readonly',
                ]) !!}

                @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="from-group">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="from-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach
                @error('tags')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="from-group">
                <p class="font-weight-bold">Estado</p>

                <label class="mr-2">
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <label class="mr-2">
                    {!! Form::radio('status', 2, true) !!}
                    Publicado
                </label>

                @error('status')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">
                {!! Form::label('extract', 'Extracto') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                @error('extract')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Cuerpo del post ') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                @error('body')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop


@section('js')
    {{-- plugin de slug  --}}
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js') }}"></script>
    {{-- libreria de texto enriquecido  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        // activar el plugin de slug en este input
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-',
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        // funcion de texto enriquecido 
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
