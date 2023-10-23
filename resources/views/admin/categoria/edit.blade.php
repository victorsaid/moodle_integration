@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Criar Categorias do Moodle</h1>
@stop

@section('content')


    @foreach(json_decode($ecategoria) as $ecat)

    @endforeach

    <div class="card">
        <div class="card-header">
            Editar  Categoria
        </div>
        <div class="card-body">
            <form action="{{url('admin/categorias', $ecat->id)}}" method="POST">
                @csrf
                @method('PUT')



                <div class="mb-3">
                    <label for="scategoria">Selecione a Categoria Pai</label>
                    <select class="form-select" id="scategoria" name="scategoria">
                        <option value="0">Superior</option>
                        @foreach(json_decode($categorias) as $item)
                            @if($item->id == $ecat->parent)
                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="idnumber" class="form-label">ID Categoria</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{$ecat->idnumber}}">
                    @error('idnumber')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome da Categoria</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$ecat->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição Categoria</label>
                    <textarea class="form-control" id="description" name="description" value="{{$ecat->description}}">{{$ecat->description}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Salvar Mudanças
                    </button>
                    <a type="button" class="btn btn-dark" href="{{ url('admin/categorias') }}">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>


    </div>


@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('editar'); </script>
@stop
