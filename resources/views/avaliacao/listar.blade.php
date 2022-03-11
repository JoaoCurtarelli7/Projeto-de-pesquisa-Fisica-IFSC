@extends('layouts.app')

@section('titulo', 'Listagem de Avaliações')

@section('cabecalho')
    <h3 class="h3">Listagem de Avaliações</h3><br>

@stop


@section('listagem')

    <div class="col-md-12">
        <form action="{{ action('AvaliacaoController@pesquisar') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Pesquisar nome..." name="nome" id="">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                <div class="col-3">
                    <a href="{{ action('AvaliacaoController@cadastrar') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Cadastrar</a>
                </div>
                {{--   <div class="col-3">
                      <a href="{{ action('PDF\GeralPDFController@avaliacao') }}" class="btn btn-outline-dark">
                          <i class='fas fa-file-pdf' style="color: red;"></i> Relatório</a>

                  </div> --}}
            </div>
        </form>
        <p></p>
        <br>
        <table class='table'>
            <tr>
                <th>Título</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Ações</th>
            </tr>
            @foreach ($avaliacaos as $item)
                <tr>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->turma->nome ?? "" }}</td>
                    <td>{{ $item->disciplina->nome ?? "" }}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($item->data_inicio))}}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($item->data_fim)) }}</td>
                    <td>
                        <a class="btn btn-outline-info btn-sm mt-1" href="{{url("avaliacao_aluno/".$item->id) }}"><i
                                class='fas fa-chart-pie'
                                style="color: #2d81b8;"></i> Individuais</a>
                        <a class="btn btn-outline-info btn-sm mt-1"
                           href="{{url("/avaliacao/".$item->id."/turma/".$item->turma_id) }}"><i
                                class='fas fa-chart-bar'
                                style="color: #3e9663;"></i> Turma</a>
                        <a class="btn btn-outline-success btn-sm mt-1"
                           href=" {{ action('AvaliacaoController@editar', $item->id) }}"><i
                                class='fas fa-edit'></i></a>
                        <a class="btn btn-outline-danger btn-sm mt-1" onclick=" return confirm('Remover avaliacao?');"
                           href="{{ action('AvaliacaoController@deletar', $item->id) }}"><i
                                class='fas fa-trash'></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    {{$avaliacaos->links()}}
@stop
