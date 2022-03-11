@extends('layouts.app')

@section('titulo', 'Cursos')


@section('cabecalho')
    <h3 class="h3">Listagem de Cursos</h3><br>

@stop


@section('listagem')

    <div class="col-md-12">
        <form action="{{ action('CursoController@pesquisar') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                <div class="col-3">
                    <a href="{{ action('CursoController@cadastrar') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Cadastrar</a>
                </div>
                <div class="col-3">
                    <a href="{{ action('PDF\GeralPDFController@curso') }}" class="btn btn-outline-dark">
                        <i class='fas fa-file-pdf' style="color: red;"></i> Relatório</a>
                </div>
            </div>
        </form>
        <p></p>
        <br>
        <table class='table'>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Escola</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Ações</th>
            </tr>
            @foreach ($cursos as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->tipo ?? "" }}</td>
                    <td>{{ $item->escola->nome?? "" }}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($item->data_inicio))}}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($item->data_fim)) }}</td>
                    <td>
                        <a class="btn btn-outline-success"
                        href="{{ action('CursoDisciplinaController@listar', $item->id) }}"><i
                             class='fas fa-edit'></i> Detalhe</a>
                        <a class="btn btn-outline-success" href="{{ action('CursoController@editar', $item->id) }}"><i
                                class='fas fa-edit'></i></a>
                        <a class="btn btn-outline-danger" onclick=" return confirm('Remover curso?');"
                           href="{{ action('CursoController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    {{$cursos->links()}}
@stop
