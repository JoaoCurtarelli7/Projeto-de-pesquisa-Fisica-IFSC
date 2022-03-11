@extends('layouts.app')

@section('titulo', 'Alunos')

@section('cabecalho')
<h3 class="h3">Listagem Alunos Turma - {{$alunos->nome_turma}}</h3><hr><br>

<p></p>
<div class="col-12">
    <form action="{{ action('AlunoController@pesquisar')}}" method="post">
        <div class="form-row">
            @csrf
            <input type="hidden" name="turma_id"
                value="{{ !empty(Request::route('id'))? Request::route('id'): $alunos->turma_id}}">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
            </div>
            <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i> Pesquisar</button>
            <div class="col-3">
                <a class="btn btn-success"
                    href="{{ action('AlunoController@cadastrar',  !empty(Request::route('id'))? Request::route('id'): $alunos->turma_id)}}">
                    <i class="fas fa-plus-circle"></i> Cadastrar</a>
                <a class="btn btn-primary" href="{{ url('turmas') }}"> <i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
    </form>
</div>

@stop

@section('listagem')<br>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Email</th>
            <th scope="col">Contato</th>
            <th scope="col">Responsável</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alunos as $item)
        <tr>
            <th scope='row'>{{$item->id}}</th>
            <td>{{$item->nome}}</td>
            <td>{{$item->matricula}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->contato}}</td>
            <td>{{$item->contato_responsaveis}}</td>
            <td>
                <a class="btn btn-outline-primary btn-sm mt-1"
                    href="{{ action('AvaliacaoAlunoController@cadastrar', $item->id) }}"
                    title="Avaliar o aluno de forma forma individual"> <i class='fas fa-comment-medical'></i>
                    Avaliar</a>
                <a class="btn btn-outline-primary btn-sm mt-1" title="Ver desempenho do aluno de forma individual"
                    href="{{ action('AvaliacaoAlunoController@listar', $item->id) }}"> <i class='fas fa-chart-pie'></i>
                    Ver</a>
                <a class="btn btn-outline-success" href="{{ action('AlunoController@editar', $item->id) }}"
                    title="Editar"><i class='fas fa-edit'></i></a>
                <a class="btn btn-outline-danger" onclick=" return confirm('Remover Aluno?');"
                    href="{{ action('AlunoController@deletar', $item->id) }}" title="Deletar"><i
                        class='fas fa-trash'></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$alunos->links()}}

@stop
