@extends('layouts.app')

@section('cabecalho')
    <h3 class="h3">Listagem de Turmas</h3><br>
@stop

@section('listagem')

    <div class="col-md-12">
        <form action="{{ action('TurmaController@pesquisar')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                <div class="col-3">
                    <a href="{{ action('TurmaController@cadastrar') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Cadastrar</a>
                </div>
            </div>
        </form>
    </div>
    <p></p>
    <br>

    <table class='table'>
        <tr>
            <th>Curso</th>
            <th>Nome</th>
            <th>Turno</th>
            <th>Série</th>
            <th>Sigla</th>
            <th>Ações</th>
        </tr>

        @foreach($turmas as $item)
            <tr>
                <td>{{$item->curso->nome}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->turno}}</td>
                <td>{{$item->serie}}</td>
                <td>{{$item->sigla}}</td>
                <td>
                    {{--<a class="btn btn-outline-info" href="{{url("alunoturma/".$item->id) }}"><i class='fas fa-address-book'
                            style="color: #38c172;"></i> Detalhes</a>
                    --}}
                    <a class="btn btn-outline-success" href="{{ action('TurmaController@editar', $item->id) }}"><i
                            class='fas fa-edit'></i></a>
                    <a class="btn btn-outline-danger" onclick=" return confirm('Remover Turma?');"
                       href="{{ action('TurmaController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>

                </td>
            </tr>
        @endforeach

    </table>
    {{$turmas->links()}}

@stop
