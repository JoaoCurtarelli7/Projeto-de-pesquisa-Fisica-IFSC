@extends('layouts.app')

@section('titulo', 'Notas por Habilidade')

@section('cabecalho')
<div class="col-md-6">
    <a class="btn btn-primary" href="{{ url('avaliacoes', $avaliacao->aluno_id) }}"> <i
            class="fas fa-arrow-left"></i> Voltar</a>
</div>
<br>
<br>
    <h2 style="margin-bottom:20px; textAlign: center;">Notas de <a style="color: #3490DC;">{{$avaliacao->nome_aluno}}</a></h2>
@stop

@section('listagem')<br>
@php
    function qualificacao($nota)
    {
        if ($nota >= 0 && $nota < 3 && is_numeric($nota)) {
            echo '<a style="fontSize: 20px;" class="text-primary">Não fez</a>';
        } elseif ($nota >= 3 && $nota < 7 && is_numeric($nota)) {
            echo '<a style="fontSize: 20px;" class="text-danger">Insuficiente</a>';
        } elseif ($nota >= 7 && $nota < 10 && is_numeric($nota)) {
            echo '<a style="fontSize: 20px; color: orange;">Adequado</a>';
        } elseif ($nota == 10 && is_numeric($nota)) {
            echo '<a style="fontSize: 20px;" class="text-success">Excelente</a>';
        } else {
            echo '<a style="fontSize: 20px;" class="text-secondary">Não se aplica</a>';
        }
    }
@endphp

<div>
    <div>
        <div colspan="5">
            <h3 style="fontWeight: bold">Delineamento do problema</h3>
        </div>
        <br>
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px;">1. Ler o enunciado do problema com atenção, buscando a sua compreensão</p>
      {{ qualificacao($avaliacao->habilidade1)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">2. Representar a situação-problema por desenhos, gráficos ou diagramas para melhor visualizá-la</p>
        {{ qualificacao($avaliacao->habilidade2)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">3. Listar os dados (expressando as grandezas envolvidas em notação simbólica)</p>
        {{ qualificacao($avaliacao->habilidade3)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">4. Listar a(s) grandeza(s) incógnita(s), expressando-a(s) em notação simbólica)</p>
        {{ qualificacao($avaliacao->habilidade4)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px;  padding-right: 180px;">5. Verificar se as unidades das grandezas envolvidas fazem parte de um mesmo sistema de unidades;
        em caso negativo,
        estar atento para as transformações necessárias</p>
        {{ qualificacao($avaliacao->habilidade5)}}
    </div>
    <div>
        <div colspan="5">
            <h3 style="fontWeight: bold">Resolução do problema</h3>
        </div>
        <br>
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">6. Analisar qualitativamente a situação-problema, elaborando as hipóteses necessárias</p>
        {{ qualificacao($avaliacao->habilidade6)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px;  padding-right: 180px;">7. Quantificar a situação-problema, escrevendo uma equação de definição, lei ou princípio em que esteja envolvida a grandeza incógnita e que seja adequada ao problema</p>
        {{ qualificacao($avaliacao->habilidade7)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">8. Situar e orientar o sistema de referência de forma a facilitar a resolução do problema</p>
        {{  qualificacao($avaliacao->habilidade8)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px;  padding-right: 180px;">9. Desenvolver o problema literalmente, fazendo as substituições numéricas apenas ao seu final ou ao final de cada etapa</p>
        {{ qualificacao($avaliacao->habilidade9)}}
    </div>
    <br>
    <div>
        <div colspan="5">
            <h3 style="fontWeight: bold">Análise do resultado</h3>
        </div>
        <br>
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">10. Analisar criticamente o resultado encontrado</p>
        {{  qualificacao($avaliacao->habilidade10)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">11. Registar, por escrito, as partes ou pontos chave no processo de resolução do problema</p>
        {{  qualificacao($avaliacao->habilidade11)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
    <div class="d-flex flex-row bd-highlight mb-3 justify-content-between" style="margin: 10px;">
        <p style="fontSize:17px; ">12. Considerar o problema como ponto de partida para o estudo de novas situações-problema</p>
        {{  qualificacao($avaliacao->habilidade12)}}
    </div>
    <hr style="borderWidth: 1px; backgroundColor: #DEE2E6">
</div>

@stop
