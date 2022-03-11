@extends('layouts.app')

@section('titulo', 'Professores')


@section('cabecalho')
<h3 class="h3">Listagem de Professores</h3><br>
@stop


@section('listagem')
<div class="col-md-12">
    <form action="{{ action('ProfessorController@pesquisar')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
            </div>
            <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>
            <div class="col-3">
                <a href="{{ action('ProfessorController@cadastrar') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Cadastrar</a>
            </div>
        </div>
</div>
</form>
<p></p>
<br>
<table class="table table-hover" >
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Contato</th>
            <th scope="col">Titulação</th>
            <th scope="col">Formação</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professores as $item)
        <tr>
            <th scope='row'>{{ $item->id }}</th>
            <td>{{$item->nome}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->contato}}</td>
            <td>{{$item->titulacao}}</td>
            <td>{{$item->formacao}}</td>
            <td>
                <a class="btn btn-outline-info"
                    href="{{ action('PDF\GeralPDFController@professorDisciplina', $item->id) }}"><i class='fas fa-file-pdf' style="color: red;"></i> Relatório</a>
                <a class="btn btn-outline-primary"
                    href="{{ action('ProfessorDisciplinaController@index', $item->id) }}"><i class='fas fa-address-book'style="color: #38c172;"></i>  Disciplinas</a>
                <a class="btn btn-outline-success" href="{{ action('ProfessorController@editar', $item->id) }}"><i
                        class='fas fa-edit'></i></a>
                <a class="btn btn-outline-danger" onclick=" return confirm('Remover Professor?');"
                    href="{{ action('ProfessorController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$professores->links()}}

@stop
