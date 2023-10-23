@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Deletar Categorias do Moodle</h1>
@stop

@section('content')


    @foreach(json_decode($ecategoria) as $ecat)

    @endforeach

    <div class="card">
        <div class="card-header">
            Editar  Categoria
        </div>
        <div class="card-body">
            <form action="{{url('admin/categorias/remove', $ecat->id)}}" method="POST">
                @csrf

                @if($contador != 1 or $contadorCurso !=0)
                    <h3>Esta categoria tem subcategorias ou cursos</h3>
                    <div class="mb-3">
                        <label for="scategoria">Selecione uma opção</label>
                        <select class="form-select" id="scategoria" name="recursive">
                            <option value="#">Selecione</option>
                            <option value="0">Mover conteudo para outra categoria</option>
                            <option value="1">Eliminar todo conteudo</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scategoria">Escolher categoria para mover conteudo</label>
                        <select class="form-select" id="scategoria" name="newparent">
                            <option value="0">Superior</option>
                            @foreach(json_decode($categorias) as $item)
                                @php $valor=false; @endphp
                                @foreach(json_decode($subcategoria) as $item2)
                                    @if($item->id == $item2->id)
                                        @php $valor=true; @endphp
                                    @endif
                                @endforeach
                                @if($valor == false)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                @else
                    <input name="recursive" type="hidden" value="1">
                    <input name="newparent" type="hidden" value="0">

                    <h3>Esta categoria não tem conteúdo</h3>


                @endif

                <button type="submit" class="btn btn-success">
                    Deletar categoria
                </button>
                <a type="button" class="btn btn-dark" href="{{ url('admin/categorias') }}">
                    Cancelar
                </a>


            </form>
        </div>


    </div>


@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('deletar'); </script>

@stop
