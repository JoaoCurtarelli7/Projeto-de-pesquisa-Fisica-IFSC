@extends('layouts.app')

@section('titulo', 'Cadastrar Avaliacao')

@section('form')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        if(!empty(Request::route('id'))){
            $action = action('AvaliacaoController@salvar',$avaliacao->id );
        }else{
            $action = action('AvaliacaoController@salvar', 0);
        }
    @endphp
    <h3 class="h3">Formulário Avaliação</h3>
    <hr>
    <form class="form-group" action="{{ $action }}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="id"
                   value="@if(!empty(old('id'))) {{old('id') }}  @elseif (!empty($avaliacao->id)) {{ $avaliacao->id}} @endif">
            <div class="col-md-8">
                <label>Título</label>
                <input class="form-control" type="text" name="titulo"
                       value="@if(!empty(old('titulo'))) {{old('titulo') }}  @elseif (!empty($avaliacao->titulo)) {{ $avaliacao->titulo}} @endif">
            </div>
        </div>
        <form class="form-group"
              action="{{ $action }}"
              method="get">
            <div class="row">
                <div class="col-md-4">
                    <label>Turma</label><br>
                    <select class="form-control" name="turma_id">
                        @foreach ($turmas ?? '' as $item)
                            <option value="{{$item->id}}"
                                    @if (!empty($avaliacao->turma_id) && $avaliacao->turma_id == $item->id ) selected="selected" @endif
                            >{{$item->nome}} </option>
                        @endforeach
                    </select>
                    <br>
                </div>

                <div class="col-md-4">
                    <label>Disciplina</label><br>
                    <select class="form-control" name="disciplina_id">
                        @foreach ($disciplinas ?? '' as $item)
                            <option value="{{$item->id}}"
                                    @if (!empty($avaliacao->disciplina_id) && $avaliacao->disciplina_id == $item->id ) selected="selected" @endif
                            >{{$item->nome}} </option>
                        @endforeach
                    </select>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Data Início</label><br>
                    <input class="form-control" type="date" name="data_inicio"
                           value="@if(!empty(old('data_inicio'))){{old('data_inicio')}}@elseif(!empty($avaliacao->data_inicio)){{$avaliacao->data_inicio}}@endif"><br>
                </div>
                <div class="col-md-4">
                    <label>Data Fim</label><br>
                    <input class="form-control" type="date" name="data_fim"
                           value="@if(!empty(old('data_fim'))){{old('data_fim') }}@elseif(!empty($avaliacao->data_fim)){{$avaliacao->data_fim}}@endif"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label>Instruções</label><br>
                    <textarea class="form-control"
                              name="instrucoes">@if(!empty(old('instrucoes'))){{old('instrucoes')}}@elseif (!empty($avaliacao->instrucoes)){{$avaliacao->instrucoes}}@endif</textarea>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            <a href="{{url("/avaliacao")}}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Voltar</a>
        </form>
@stop
