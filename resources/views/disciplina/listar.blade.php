@extends('layouts.app')

@section('titulo', 'Disciplina')


@section('cabecalho')
<h3 class="h3">Listagem de Disciplinas </h3><br>

@stop


@section('listagem')

<div class="col-md-12">
    <form action="{{ action('DisciplinaController@pesquisar')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
            </div>
            <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>
            <div class="col-3">
                <a href="{{ action('DisciplinaController@cadastrar') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Cadastrar</a>
            </div>
        </div>
</div>
</form>
<p></p>
<br>
<table class='table'>
    <tr>
        <th>Nome</th>
        <th>Turno</th>
        <th>Carga Horaria</th>
        <th>Ações</th>
    </tr>

    @foreach($disciplina as $item)
    <tr>
        <td>{{$item->nome}}</td>
        <td>{{$item->turno}}</td>
        <td>{{$item->carga_hr}}</td>
        <td>
            <a class="btn btn-outline-success" href="{{ action('DisciplinaController@editar', $item->id) }}"><i
                    class='fas fa-edit'></i></a>
            <a class="btn btn-outline-danger" onclick=" return confirm('Remover Disciplina?');"
                href="{{ action('DisciplinaController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>
        </td>
    </tr>
    @endforeach

</table>
{{$disciplina->links()}}

@stop
