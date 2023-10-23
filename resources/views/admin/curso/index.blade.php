@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}} </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ url('admin/cursos/create') }}" role="button">Link</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Nome Curto</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Matematica</th>
                        <td>Mat-2021</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="">
                                Editar
                            </a>
                            <a type="button" class="btn btn-danger" href="{{ url('admin/categorias/delete/') }}">
                                Deletar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

