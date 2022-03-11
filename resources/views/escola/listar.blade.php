@extends('layouts.app')

@section('titulo', 'Escolas')

@section('cabecalho')
    <h3>Listagem de Escolas</h3>
    <br>
@stop

@section('listagem')

    <div class="col-md-12">
        <form action="{{ action('EscolaController@pesquisar')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                <div class="col-3">
                    <a href="{{ action('EscolaController@cadastrar') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Cadastrar</a>
                </div>
            </div>
        </form>
    </div>
    <p></p>
    <br>
    <table class='table'>
        <tr>
            <th>Nome</th>
            <th>CEP</th>
            <th>Telefone</th>
            <th>CNPJ</th>
            <th>Sigla</th>
            <th>Município</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>

        @foreach($escolas as $item)
            <tr>
                <td>{{$item->nome}}</td>
                <td>{{$item->cep}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->cnpj}}</td>
                <td>{{$item->sigla}}</td>
                <td>{{$item->municipios->nome}}</td>
                <td>{{$item->tipo}}</td>
                <td>
                    <a class="btn btn-outline-success" href="{{ action('EscolaController@editar', $item->id) }}"><i
                            class='fas fa-edit'></i></a>
                    <a class="btn btn-outline-danger" onclick=" return confirm('Remover Escola?');"
                       href="{{ action('EscolaController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">{{ $escolas->links() }}</div>
@stop
