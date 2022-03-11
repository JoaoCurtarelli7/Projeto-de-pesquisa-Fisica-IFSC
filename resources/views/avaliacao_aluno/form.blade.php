@extends('layouts.app')

@section('titulo', 'Cadastrar Avaliação Aluno')

@section('form')
    <!-- <style>
    .grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto ;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}
</style> -->
    @php
        // $avaliacaoId = Request::route('id'); //get id URL
         $avaliacaoAlunoId = Request::route('avaliacao_id'); //get id URL
    @endphp
    <div class="container mt-4">
        <h3 class="h3">Formulário de Avaliação</h3>
        <div class="row">
            <div class="col-md-5">
                <h4 class="h4">Avaliação: <b>{{$avaliacao->titulo}}</b> - Turma: <b>{{$turma->nome}}</b></h4>
            </div>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{url('avaliacao_aluno/'.$avaliacaoAlunoId)}}"> <i
                    class="fas fa-arrow-left"></i> Voltar</a>
        </div>
        <hr>
        <br>
        <form class="form-group" action="{{-- action('AvaliacaoAlunoController@cadastrar', $aluno->id) --}}"
              method="GET"
              style="text-align:center">
            <input type="hidden" name="id"
                   value="@if(!empty($avaliacaoAluno->id)){{$avaliacaoAluno->id}}@else{{0}}@endif">
            <input type="hidden" name="avaliacao_id"
                   value="@if(isset($avaliacaoAlunoId)){{$avaliacaoAlunoId}}@elseif(!empty($avaliacaoAluno->avaliacao_id)){{$avaliacaoAluno->avaliacao_id}}@endif">
            <div class="row">
                <div class="col-md-4">
                    <label><b>Aluno</b></label>
                    <select class="form-control" name="aluno_id">
                        <option value =''disabled selected>Selecionar</option>
                        @foreach ($alunos ?? '' as $item)
                            <option value="{{$item->id}}"
                                    @if(isset($_REQUEST["aluno_id"]) && $_REQUEST["aluno_id"] == $item->id)selected="selected"
                                    @elseif (!empty($avaliacaoAluno->aluno_id) && $avaliacaoAluno->aluno_id == $item->id ) selected="selected" @endif
                            >{{$item->nome}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <div class="form-check" style="text-align:center">
                        <h5>Tipo de Resolução</h5>
                        <div class="custom-control custom-radio">
                            <input type="radio" required="required" id="customRadio_tipo_resolucao01"
                                   name="tipo_resolucao"
                                   value="PAPEL"
                                   @if(isset($_REQUEST["tipo_resolucao"]) && $_REQUEST["tipo_resolucao"] == "PAPEL") {{'checked'}}  @elseif (!empty($avaliacaoAluno->tipo_resolucao) && $avaliacaoAluno->tipo_resolucao == 'PAPEL') {{'checked'}} @endif
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadio_tipo_resolucao01">em Papel</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" required="required" id="customRadio_tipo_resolucao02"
                                   name="tipo_resolucao"
                                   value="VIDEO"
                                   @if(isset($_REQUEST["tipo_resolucao"]) && $_REQUEST["tipo_resolucao"] == "VIDEO") {{'checked'}}  @elseif (!empty($avaliacaoAluno->tipo_resolucao) && $avaliacaoAluno->tipo_resolucao == 'VIDEO') {{'checked'}} @endif
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadio_tipo_resolucao02">em Vídeo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width:100%;">
                <div class="table-primary">
                    <div>
                        <h3>Delineamento do problema</h3>
                    </div>
                </div>
                <div class="grid-container" style="display: grid;
                        grid-template-columns: auto auto auto auto auto;
                        grid-gap: 10px;
                        background-color: white;
                        padding: 10px;">

                    <div class="item1" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">
                        Ler o enunciado do
                        problema com atenção, buscando a sua compreensão
                    </div>
                    <div class="item2" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Representar a situação-problema por desenhos, gráficos ou diagramas para
                        melhor visualizá-la
                    </div>
                    <div class="item3" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Listar os dados (expressando as grandezas envolvidas em notação simbólica)
                    </div>
                    <div class="item4" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Listar a(s) grandeza(s) incógnita(s), expressando-a(s) em notação simbólica)
                    </div>
                    <div class="item5" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Verificar se as unidades das grandezas envolvidas fazem parte de um mesmo
                        sistema de unidades;
                        em
                        caso negativo, estar atento para as transformações necessárias
                    </div>
                </div>
                <div>
                    <div class="grid-container" style="display: grid;
                        grid-template-columns: auto auto auto auto auto ;
                        grid-gap: 10px;
                        background-color: white;
                        padding: 10px;">

                        <div style="display: flex; justify-content: center;">

                            <div class="form-check" style="text-align:justify;" name="1" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">
                                <div class="custom-control custom-radio">
                                    <input type="radio" required="required" id="customRadio1" name="1" value="na"
                                           @if(isset($_REQUEST["1"]) && $_REQUEST["1"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade1) && $avaliacaoAluno->habilidade1 == 'na') {{'checked'}} @endif
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1"><a
                                            style="fontSize: 16px;"
                                            class="text-secondary">Não
                                            se aplica</a></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" required="required" id="customRadio2" name="1" value="0"
                                           @if(isset($_REQUEST["1"]) && $_REQUEST["1"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade1) && $avaliacaoAluno->habilidade1 == '0') {{'checked'}} @endif
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2"><a
                                            style="fontSize: 16px;"
                                            class="text-primary">Não
                                            fez</a></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" required="required" id="customRadio3" name="1" value="3"
                                           @if(isset($_REQUEST["1"]) && $_REQUEST["1"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade1) && $avaliacaoAluno->habilidade1 == '3') {{'checked'}} @endif
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3"><a
                                            style="fontSize: 16px;"
                                            class="text-danger">Insuficiente</a></label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" required="required" id="customRadio4" name="1" value="7"
                                           @if(isset($_REQUEST["1"]) && $_REQUEST["1"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade1) && $avaliacaoAluno->habilidade1 == '7') {{'checked'}} @endif
                                           {{-- isset($_REQUEST["1"]) && $_REQUEST["1"] == "7" ? 'checked' : '' --}}
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4"><a
                                            style="fontSize: 16px; color: orange;">Adequado</a></label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" required="required" id="customRadio5" name="1" value="10"
                                           @if(isset($_REQUEST["1"]) && $_REQUEST["1"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade1) && $avaliacaoAluno->habilidade1 == '10') {{'checked'}} @endif
                                           {{-- isset($_REQUEST["1"]) && $_REQUEST["1"] == "10" ? 'checked' : '' --}}
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio5"><a
                                            style="fontSize: 16px;"
                                            class="text-success">Excelente</a></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify;" name="2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio6" name="2"
                                               value="na"
                                               @if(isset($_REQUEST["2"]) && $_REQUEST["2"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade2) && $avaliacaoAluno->habilidade2 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio6"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio7" name="2" value="0"
                                               @if(isset($_REQUEST["2"]) && $_REQUEST["2"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade2) && $avaliacaoAluno->habilidade2 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio7"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio8" name="2" value="3"
                                               @if(isset($_REQUEST["2"]) && $_REQUEST["2"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade2) && $avaliacaoAluno->habilidade2 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio8"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio9" name="2" value="7"
                                               @if(isset($_REQUEST["2"]) && $_REQUEST["2"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade2) && $avaliacaoAluno->habilidade2 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio9"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio10" name="2"
                                               value="10"
                                               @if(isset($_REQUEST["2"]) && $_REQUEST["2"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade2) && $avaliacaoAluno->habilidade2 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio10"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio11" name="3"
                                               value="na"
                                               @if(isset($_REQUEST["3"]) && $_REQUEST["3"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade3) && $avaliacaoAluno->habilidade3 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio11"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio12" name="3"
                                               value="0"
                                               @if(isset($_REQUEST["3"]) && $_REQUEST["3"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade3) && $avaliacaoAluno->habilidade3 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio12"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio13" name="3"
                                               value="3"
                                               @if(isset($_REQUEST["3"]) && $_REQUEST["3"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade3) && $avaliacaoAluno->habilidade3 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio13"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio14" name="3"
                                               value="7"
                                               @if(isset($_REQUEST["3"]) && $_REQUEST["3"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade3) && $avaliacaoAluno->habilidade3 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio14"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio15" name="3"
                                               value="10"
                                               @if(isset($_REQUEST["3"]) && $_REQUEST["3"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade3) && $avaliacaoAluno->habilidade3 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio15"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="4">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio16" name="4"
                                               value="na"
                                               @if(isset($_REQUEST["4"]) && $_REQUEST["4"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade4) && $avaliacaoAluno->habilidade4 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio16"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio17" name="4"
                                               value="0"
                                               @if(isset($_REQUEST["4"]) && $_REQUEST["4"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade4) && $avaliacaoAluno->habilidade4 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio17"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio18" name="4"
                                               value="3"
                                               @if(isset($_REQUEST["4"]) && $_REQUEST["4"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade4) && $avaliacaoAluno->habilidade4 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio18"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio19" name="4"
                                               value="7"
                                               @if(isset($_REQUEST["4"]) && $_REQUEST["4"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade4) && $avaliacaoAluno->habilidade4 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio19"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio20" name="4"
                                               value="10"
                                               @if(isset($_REQUEST["4"]) && $_REQUEST["4"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade4) && $avaliacaoAluno->habilidade4 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio20"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="5">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio21" name="5"
                                               value="na"
                                               @if(isset($_REQUEST["5"]) && $_REQUEST["5"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade5) && $avaliacaoAluno->habilidade5 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio21"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio22" name="5"
                                               value="0"
                                               @if(isset($_REQUEST["5"]) && $_REQUEST["5"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade5) && $avaliacaoAluno->habilidade5 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio22"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio23" name="5"
                                               value="3"
                                               @if(isset($_REQUEST["5"]) && $_REQUEST["5"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade5) && $avaliacaoAluno->habilidade5 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio23"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio24" name="5"
                                               value="7"
                                               @if(isset($_REQUEST["5"]) && $_REQUEST["5"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade5) && $avaliacaoAluno->habilidade5 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio24"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio25" name="5"
                                               value="10"
                                               @if(isset($_REQUEST["5"]) && $_REQUEST["5"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade5) && $avaliacaoAluno->habilidade5 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio25"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" table-primary">
                        <div colspan="5">
                            <h3>Resolução do problema</h3>
                        </div>
                    </div>
                    <div class="grid-container" style="display: grid;
                        grid-template-columns: auto auto auto auto;
                        grid-gap: 10px;
                        background-color: white;
                        padding: 10px;">
                        <div style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Analisar qualitativamente a situação-problema, elaborando as hipóteses
                            necessárias
                        </div>
                        <div style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Quantificar a situação-problema, escrevendo uma equação de definição, lei ou
                            princípio em que
                            esteja
                            envolvida a grandeza incógnita e que seja adequada ao problema
                        </div>
                        <div style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Situar e orientar o sistema de referência de forma a facilitar a resolução do
                            problema
                        </div>
                        <div style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Desenvolver o problema literalmente, fazendo as substituições numéricas
                            apenas ao seu final ou
                            ao
                            final de cada etapa
                        </div>
                    </div>


                    <div class="grid-container" style="display: grid;
                        grid-template-columns: auto auto auto auto;
                        grid-gap: 10px;
                        background-color: white;
                        padding: 10px;">
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify;" name="6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio26" name="6"
                                               value="na"
                                               @if(isset($_REQUEST["6"]) && $_REQUEST["6"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade6) && $avaliacaoAluno->habilidade6 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio26"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio27" name="6"
                                               value="0"
                                               @if(isset($_REQUEST["6"]) && $_REQUEST["6"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade6) && $avaliacaoAluno->habilidade6 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio27"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio28" name="6"
                                               value="3"
                                               @if(isset($_REQUEST["6"]) && $_REQUEST["6"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade6) && $avaliacaoAluno->habilidade6 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio28"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio29" name="6"
                                               value="7"
                                               @if(isset($_REQUEST["6"]) && $_REQUEST["6"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade6) && $avaliacaoAluno->habilidade6 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio29"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio30" name="6"
                                               value="10"
                                               @if(isset($_REQUEST["6"]) && $_REQUEST["6"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade6) && $avaliacaoAluno->habilidade6 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio30"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="7">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio31" name="7"
                                               value="na"
                                               @if(isset($_REQUEST["7"]) && $_REQUEST["7"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade7) && $avaliacaoAluno->habilidade7 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio31"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio32" name="7"
                                               value="0"
                                               @if(isset($_REQUEST["7"]) && $_REQUEST["7"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade7) && $avaliacaoAluno->habilidade7 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio32"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio33" name="7"
                                               value="3"
                                               @if(isset($_REQUEST["7"]) && $_REQUEST["7"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade7) && $avaliacaoAluno->habilidade7 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio33"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio34" name="7"
                                               value="7"
                                               @if(isset($_REQUEST["7"]) && $_REQUEST["7"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade7) && $avaliacaoAluno->habilidade7 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio34"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio35" name="7"
                                               value="10"
                                               @if(isset($_REQUEST["7"]) && $_REQUEST["7"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade7) && $avaliacaoAluno->habilidade7 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio35"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="8">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio36" name="8"
                                               value="na"
                                               @if(isset($_REQUEST["8"]) && $_REQUEST["8"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade8) && $avaliacaoAluno->habilidade8 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio36"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio37" name="8"
                                               value="0"
                                               @if(isset($_REQUEST["8"]) && $_REQUEST["8"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade8) && $avaliacaoAluno->habilidade8 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio37"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio38" name="8"
                                               value="3"
                                               @if(isset($_REQUEST["8"]) && $_REQUEST["8"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade8) && $avaliacaoAluno->habilidade8 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio38"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio39" name="8"
                                               value="7"
                                               @if(isset($_REQUEST["8"]) && $_REQUEST["8"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade8) && $avaliacaoAluno->habilidade8 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio39"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio40" name="8"
                                               value="10"
                                               @if(isset($_REQUEST["8"]) && $_REQUEST["8"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade8) && $avaliacaoAluno->habilidade8 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio40"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio41" name="9"
                                               value="na"
                                               @if(isset($_REQUEST["9"]) && $_REQUEST["9"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade9) && $avaliacaoAluno->habilidade9 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio41"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio42" name="9"
                                               value="0"
                                               @if(isset($_REQUEST["9"]) && $_REQUEST["9"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade9) && $avaliacaoAluno->habilidade9 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio42"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio43" name="9"
                                               value="3"
                                               @if(isset($_REQUEST["9"]) && $_REQUEST["9"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade9) && $avaliacaoAluno->habilidade9 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio43"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio44" name="9"
                                               value="7"
                                               @if(isset($_REQUEST["9"]) && $_REQUEST["9"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade9) && $avaliacaoAluno->habilidade9 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio44"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio45" name="9"
                                               value="10"
                                               @if(isset($_REQUEST["9"]) && $_REQUEST["9"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade9) && $avaliacaoAluno->habilidade9 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio45"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="table-primary">
                        <div colspan="5">
                            <h3>Análise do resultado</h3>
                        </div>
                    </div>
                    <div class="col-md-12" style="display: grid;
                        grid-template-columns: auto auto auto;
                        grid-gap: 10px;
                        background-color: white;
                        padding: 10px;">
                        <div class="col-md-6" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        margin-left: 88px;
                        font-size: 18px;">Analisar criticamente o resultado encontrado
                        </div>
                        <div class="col-md-6" style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Registar, por escrito, as partes ou pontos chave no processo de resolução do
                            problema
                        </div>
                        {{--
                        <div style="background-color: white;
                        text-align: center;
                        padding: 10px 0;
                        font-size: 18px;">Considerar o problema como ponto de partida para o estudo de novas
                            situações-problema
                        </div>
                        --}}
                    </div>
                    <div class="grid-container" style="display: grid;
                        grid-template-columns: auto auto auto;
                        grid-gap: 10px;
                        background-color: white;
                        padding: 10px;">
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="10">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio46" name="10"
                                               value="na"
                                               @if(isset($_REQUEST["10"]) && $_REQUEST["10"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade10) && $avaliacaoAluno->habilidade10 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio46"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se
                                                aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio47" name="10"
                                               value="0"
                                               @if(isset($_REQUEST["10"]) && $_REQUEST["10"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade10) && $avaliacaoAluno->habilidade10 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio47"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio48" name="10"
                                               value="3"
                                               @if(isset($_REQUEST["10"]) && $_REQUEST["10"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade10) && $avaliacaoAluno->habilidade10 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio48"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio49" name="10"
                                               value="7"
                                               @if(isset($_REQUEST["10"]) && $_REQUEST["10"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade10) && $avaliacaoAluno->habilidade10 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio49"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio50" name="10"
                                               value="10"
                                               @if(isset($_REQUEST["10"]) && $_REQUEST["10"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade10) && $avaliacaoAluno->habilidade10 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio50"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: center;">
                                <div class="form-check" style="text-align:justify" name="11">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio51" name="11"
                                               value="na"
                                               @if(isset($_REQUEST["11"]) && $_REQUEST["11"] == "na") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade11) && $avaliacaoAluno->habilidade11 == 'na') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio51"><a
                                                style="fontSize: 16px;" class="text-secondary">Não se aplica</a></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio52" name="11"
                                               value="0"
                                               @if(isset($_REQUEST["11"]) && $_REQUEST["11"] == "0") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade11) && $avaliacaoAluno->habilidade11 == '0') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio52"><a
                                                style="fontSize: 16px;" class="text-primary">Não fez</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio53" name="11"
                                               value="3"
                                               @if(isset($_REQUEST["11"]) && $_REQUEST["11"] == "3") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade11) && $avaliacaoAluno->habilidade11 == '3') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio53"><a
                                                style="fontSize: 16px;" class="text-danger">Insuficiente</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio54" name="11"
                                               value="7"
                                               @if(isset($_REQUEST["11"]) && $_REQUEST["11"] == "7") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade11) && $avaliacaoAluno->habilidade11 == '7') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio54"><a
                                                style="fontSize: 16px; color: orange;">Adequado</a></label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" required="required" id="customRadio55" name="11"
                                               value="10"
                                               @if(isset($_REQUEST["11"]) && $_REQUEST["11"] == "10") {{'checked'}}  @elseif (!empty($avaliacaoAluno->habilidade11) && $avaliacaoAluno->habilidade11 == '10') {{'checked'}} @endif
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio55"><a
                                                style="fontSize: 16px;" class="text-success">Excelente</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" name="confirmar" value="Calcular Notas" class="btn btn-outline-info">
        </form>
        <hr>
        @php
            $competencia1 = null;
            $competencia2 = null;
            $competencia3 = null;
            $data =[];
            $data['tipo_resolucao'] = (string) "";
            $d = (int) 0;
            $r = (int) 0;
            $a = (int) 0;
            $nota = (string) "";

            if (!empty(request('confirmar'))) {

                $data = $_REQUEST;
                $delineamento = array_slice($data, 4, 5);
                $resolucao = array_slice($data, 9, 4);
                $analise = array_slice($data, 13, 2);

                foreach ($delineamento as $item => $value) {
                    if (is_numeric($value)) {
                     $delineamento[$item] = $value;
                     $d++;
                    } else {
                     $delineamento[$item] = 0;
                    }
                }

                foreach ($resolucao as $item => $value) {
                    if (is_numeric($value)) {
                      $resolucao[$item] = $value;
                      $r++;
                    } else {
                     $resolucao[$item] = 0;
                    }
                }
                foreach ($analise as $item => $value) {
                    if (is_numeric($value)) {
                        $analise[$item] = $value;
                        $a++;
                    } else {
                        $analise[$item] = 0;
                    }
                }

                if ($d == "0" or $r == "0" or $a == "0") {
                    echo "<script> alert('Selecione ao menos uma habilidade para avaliar por competência'); </script>";
                } else {
                    $d = 10 / $d;
                    $r = 10 / $r;
                    $a = 10 / $a;

                    echo"Competencia 01"."<br>";
                   // var_dump($delineamento);

                    foreach ($delineamento as $key => $item) {
                        echo ((int)$key+1). " - ". $item."<br>";
                        $item = $item * $d;
                        $competencia1 += $item;
                    }
                    echo"Competencia 02"."<br>";
                    //var_dump($resolucao);
                    foreach ($resolucao as $key =>$item) {
                        echo ((int)$key+1). " - ". $item."<br>";
                        $item = $item * $r;
                        $competencia2 += $item;
                    }
                    echo"Competencia 03"."<br>";
                    //var_dump($analise);
                    foreach ($analise as $key =>$item) {
                        echo ((int)$key+1). " - ". $item."<br>";
                        $item = $item * $a;
                        $competencia3 += $item;
                    }

                    echo"Soma dos pesos: ". ($d+$r+$a);
                  $nota = (($competencia1 + $competencia2 + $competencia3)) / 3;

                }
            } elseif (!empty($avaliacaoAluno)){

                $data["id"] = $avaliacaoAluno["id"];
                $data["avaliacao_id"] = $avaliacaoAluno["avaliacao_id"];
                $data["tipo_resolucao"] = $avaliacaoAluno["tipo_resolucao"];
                $data["1"] = $avaliacaoAluno["habilidade1"];
                $data["2"] = $avaliacaoAluno["habilidade2"];
                $data["3"] = $avaliacaoAluno["habilidade3"];
                $data["4"] = $avaliacaoAluno["habilidade4"];
                $data["5"] = $avaliacaoAluno["habilidade5"];
                $data["6"] = $avaliacaoAluno["habilidade6"];
                $data["7"] = $avaliacaoAluno["habilidade7"];
                $data["8"] = $avaliacaoAluno["habilidade8"];
                $data["9"] = $avaliacaoAluno["habilidade9"];
                $data["10"] = $avaliacaoAluno["habilidade10"];
                $data["11"] = $avaliacaoAluno["habilidade11"];
               // $data["12"]=$avaliacaoAluno["habilidade12"];
                $competencia1 = $avaliacaoAluno["competencia1"];
                $competencia2 = $avaliacaoAluno["competencia2"];
                $competencia3 = $avaliacaoAluno["competencia3"];
                $nota = $avaliacaoAluno["nota_final"];
            }
            echo "<div style='text-align:justify'>";
            echo "<br>";
            echo "<h3><b>Tipo de resolução:</b> <span style='color:#3490dc'>". $data['tipo_resolucao']." </span></h3>";
            echo "<h3><b>Nota da competência 1:</b> <span style='color:#3490dc'>". round($competencia1,2)."</span> - Peso: <span style='color:#3490dc'>". round($d,2) ."</span></h3>";
            echo "<h3><b>Nota da competência 2:</b> <span style='color:#3490dc'>". round($competencia2,2)."</span> - Peso: <span style='color:#3490dc'>". round($r,2) ."</span></h3>";
            echo "<h3><b>Nota da competência 3:</b> <span style='color:#3490dc'>". round($competencia3,2)."</span> - Peso: <span style='color:#3490dc'>". round($a,2) ."</span> </h3>";
            echo "<h3 style='text-align:justify'><b>Nota final :</b> <span style='color:#3490dc'>".round($nota,2)." </span></h3>";
            echo "</div>";
        @endphp
        @php
            if (!empty($_REQUEST['confirmar'])) {
        @endphp
        <form style='text-align:center'
              action="{{ action('AvaliacaoAlunoController@salvar', empty($avaliacaoAluno) ? 0 : $avaliacaoAluno->id) }}"
              method="post">
            @csrf
            <input type="hidden" name="error" value="0">
            <input type="hidden" name="id" value="{{!empty($data['id']) ? $data['id'] : 0}}">
            <input type="hidden" name="avaliacao_id" value="{{$data['avaliacao_id']}}">
            <input type="hidden" name="aluno_id" value="{{$data['aluno_id']}}">
            <input type="hidden" name="habilidade1" value="{{$data[1]}}">
            <input type="hidden" name="habilidade2" value="{{$data[2]}}">
            <input type="hidden" name="habilidade3" value="{{$data[3]}}">
            <input type="hidden" name="habilidade4" value="{{$data[4]}}">
            <input type="hidden" name="habilidade5" value="{{$data[5]}}">
            <input type="hidden" name="habilidade6" value="{{$data[6]}}">
            <input type="hidden" name="habilidade7" value="{{$data[7]}}">
            <input type="hidden" name="habilidade8" value="{{$data[8]}}">
            <input type="hidden" name="habilidade9" value="{{$data[9]}}">
            <input type="hidden" name="habilidade10" value="{{$data[10]}}">
            <input type="hidden" name="habilidade11" value="{{$data[11]}}">
            {{-- <input type="hidden" name="habilidade12" value="{{$data[12]}}"> --}}
            <input type="hidden" name="competencia1" value="{{$competencia1}}">
            <input type="hidden" name="competencia2" value="{{$competencia2}}">
            <input type="hidden" name="competencia3" value="{{$competencia3}}">
            <input type="hidden" name="nota_final" value="{{$nota}}">
            <input type="hidden" name="tipo_resolucao" value="{{$data['tipo_resolucao']}}">
            <input type="hidden" name="data" value="{{date("Y/m/d")}}">
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                <a class="btn btn-primary" href="{{url('avaliacao_aluno/'.$avaliacaoAlunoId) }}"> <i
                        class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </form>
        @php
            }
        @endphp
    </div>
@stop
