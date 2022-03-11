@extends('layouts.app')

@section('titulo', 'Avaliações')

@section('graficos')
    <h3 class="h3">Desempenho do aluno</h3><br><br>
    <div class="row">
        @if(!empty($graficosDI))
            <div class="col-6">
                {{ $graficosDI['chartTempo']->container()}}
                {{ $graficosDI['chartTempo']->script() }}
            </div>
            <div class="col-6">
                {{ $graficosDE['chartDelineamento']->container()}}
                {{ $graficosDE['chartDelineamento']->script() }}
            </div>
            <div class="col-6">
                {{ $graficosRP['chartResolucao']->container()}}
                {{ $graficosRP['chartResolucao']->script() }}
            </div>

            <div class="col-6">
                {{ $graficosAP['chartAnalise']->container()}}
                {{ $graficosAP['chartAnalise']->script() }}
            </div>
        @endif
    </div>
    <br><br>
@stop

@section('cabecalho')<br>
<h3 class="h3">Listagem de Avaliações </h3>
<div class="col-md-6">
    @if(!empty($aluno->nome))
        <h5>Aluno: <b>{{$aluno->nome}}</b></h5>
        {{-- <h5>Turma: <b>$turma->nome</b></h5>--}}
        <a class="btn btn-primary" href="{{ url('avaliacao_aluno/'. $avaliacaoAlunos[0]->avaliacao_id)}}"><i
                class="fas fa-arrow-left"></i> Voltar</a>
    @endif
</div>
@stop

@section('listagem')<br>
<table class='table'>
    <tr>
        <th>Avaliação</th>
        <th>Turma</th>
        <th>Data</th>
        <th>Nota Competencia 1</th>
        <th>Nota Compentecia 2</th>
        <th>Nota competencia 3</th>
        <th>Nota Final</th>
    </tr>
    @foreach($avaliacaoAlunos as $item)
        <tr>
            <td>{{$item->avaliacao->titulo}} </td>
            <td>{{$item->avaliacao->turma->nome}} </td>
            <td>{{ date( 'd/m/Y' , strtotime($item->data))}}</td>
            <td>{{$item->competencia1}} </td>
            <td>{{$item->competencia2}}</td>
            <td>{{$item->competencia3}}</td>
            <td>{{ number_format($item->nota_final, 2, ',', '.')}}</td>
            {{-- <td>

               <a class="btn btn-primary btn-sm" onclick=" return confirm('Remover Avaliação?');"
                  href="{{ action('AvaliacaoAlunoController@deletar', $item->id) }}">Excluir</a>
               <a class="btn btn-primary btn-sm" href="{{ action('AvaliacaoAlunoController@editar', $item->id) }}">Exibir
                   / Editar</a>


            </td> --}}
        </tr>
    @endforeach

</table>
{{$avaliacaoAlunos->links()}}

@stop
