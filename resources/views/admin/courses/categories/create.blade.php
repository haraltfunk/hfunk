@extends('adminlte::page')

@section('title', 'hfunk')

@section('content_header')
    <h1>Crear nueva categoría para los cursos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoría', 'autocomplete' => 'off']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('hfunk ok!'); </script>
@stop