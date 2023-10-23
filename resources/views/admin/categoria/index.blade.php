@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias do Moodle</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}} </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">

            <a type="button" class="btn btn-primary" href="{{ url('admin/categorias/create') }}">
               Criar Categoria
            </a>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th >Categoria</th>
                    <th width="25%">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(json_decode($categorias) as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="{{ url('admin/categorias/' . $item->id . '/edit') }}">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a type="button" class="btn btn-danger" href="{{ url('admin/categorias/delete/'. $item->id) }}">
                                    Deletar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
