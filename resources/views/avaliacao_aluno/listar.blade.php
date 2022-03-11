@extends('layouts.app')

@section('titulo', 'Avaliações')

@section('cabecalho')<br>
<h3 class="h3">Listagem de Alunos Avaliados</h3>
<h4 class="h4">Avaliação: <b>{{$avaliacao->titulo}}</b> - Turma: <b>{{$turma->nome}}</b></h4>

<div class="col-md-12">
    <div class="form-row">
        <div class="col-4">
            <a class="btn btn-primary" href="{{ url('avaliacao') }}"> <i
                    class="fas fa-arrow-left"></i> Voltar</a>
            <a href="{{ url('avaliacao_aluno/cadastrar/avaliacao/'.Request::route('id')) }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>
</div>
@stop

@section('listagem')<br>
<table class='table'>
    <tr>
        {{--  <th>#ID</th>--}}
        <th>Aluno</th>
        <th>Data</th>
        <th>Nota Competencia 1</th>
        <th>Nota Compentecia 2</th>
        <th>Nota competencia 3</th>
        <th>Nota Final</th>
        <th>Ações</th>
    </tr>
    @forelse($avaliacaoAlunos as $item)
        <tr>
            {{--  <td>{{$item->id}} </td>--}}
            <td>{{$item->aluno->nome}}</td>
            <td>{{ date( 'd/m/Y' , strtotime($item->data))}}</td>
            <td>{{$item->competencia1}} </td>
            <td>{{$item->competencia2}}</td>
            <td>{{$item->competencia3}}</td>
            <td>{{ number_format($item->nota_final, 2, ',', '.')}}</td>
            <td>
                <a class="btn btn-outline-primary btn-sm mt-1" title="Ver desempenho do aluno de forma individual"
                   href="{{url('avaliacao_aluno/'.$item->id.'/individual/'.$item->aluno_id)}}"> <i
                        class='fas fa-chart-pie'></i>
                    Ver</a>
                <a class="btn btn-outline-success btn-sm mt-1"
                   href="{{url('avaliacao_aluno/editar/'.$item->id.'/avaliacao/'.$item->avaliacao_id) }}"
                   alt="Exibir / Editar" title="Exibir / Editar"><i
                        class='fas fa-edit'></i> </a>
                <a class="btn btn-outline-danger btn-sm mt-1" onclick=" return confirm('Remover Avaliação?');"
                   href="{{ action('AvaliacaoAlunoController@deletar', $item->id) }}" alt="Remover Avaliação"
                   title="Remover Avaliação"><i class='fas fa-trash'></i></a>
            </td>
        </tr>
    @empty
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align:center">Nenhuma avaliação realizada</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse
</table>
{{$avaliacaoAlunos->links()}}
@stop
