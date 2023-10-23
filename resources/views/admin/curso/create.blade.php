@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Criar Curso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <center><h3>Rellene Correctenemte el formulario</h3></center>
        </div>
        <div class="card-body">
            <form action="{{url('admin/cursos')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do curso</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="shortname" class="form-label">Nome Curto</label>
                    <input type="text" class="form-control" id="shortname" name="shortname">
                    @error('shortname')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Criar
                    </button>
                    <a type="button" class="btn btn-dark" href="{{ url('admin/cursos') }}">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
