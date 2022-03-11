@extends('layouts.app')

@section('titulo', 'Responsavel')


@section('cabecalho')
<h3 class="h3">Listagem de Responsáveis</h3><br>
@stop


@section('listagem')

<div class="col-md-12">
    <form action="{{ action('ResponsavelAlunoController@pesquisar')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
            </div>
            <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>
            <div class="col-3">
                <a href="{{ action('ResponsavelAlunoController@cadastrar') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Cadastrar</a>
            </div>
        </div>
</div>
</form>
<p></p>
<br>
<table class='table'>
    <tr>
        <th>Nome Do Responsável</th>
        <th>E-Mail</th>
        <th>Contato</th>
        <th>Responsável do Aluno</th>
        <th>Ações</th>
    </tr>

    @foreach($responsaveis as $item)
    <tr>
        <td>{{$item->nome}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->contato}}</td>
        <td>{{$item->aluno->nome}}</td>
        <td>
            <a class="btn btn-outline-success" href="{{ action('ResponsavelAlunoController@editar', $item->id) }}"><i
                    class='fas fa-edit'></i></a>
            <a class="btn btn-outline-danger" onclick=" return confirm('Remover Responsavel?');"
                href="{{ action('ResponsavelAlunoController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>
        </td>
    </tr>
    @endforeach

</table>
{{$responsaveis->links()}}

@stop
