@extends('layouts.app')

@section('titulo', 'Cadastrar Cursos')

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
            $action = action('CursoController@salvar',$curso->id );
        }else{
            $action = action('CursoController@salvar', 0);
        }
    @endphp
    <h3 class="h3">Formulário Curso</h3>
    <hr>
    <form class="form-group" action="{{ $action }}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="id"
                   value="@if(!empty(old('id'))) {{old('id') }}  @elseif (!empty($curso->id)) {{ $curso->id}} @endif">
            <div class="col-md-4">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome"
                       value="@if(!empty(old('nome'))) {{old('nome') }}  @elseif (!empty($curso->nome)) {{ $curso->nome}} @endif">
            </div>
            <div class="col-md-4">
                <label>Escolas</label><br>
                <select class="form-control" name="escola_id">
                    @foreach ($escolas ?? '' as $item)
                        <option value="{{$item->id}}"
                                @if (!empty($curso->escola_id) && $curso->escola_id == $item->id ) selected="selected" @endif
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
                       value="@if(!empty(old('data_inicio'))){{old('data_inicio')}}@elseif(!empty($curso->data_inicio)){{$curso->data_inicio}}@endif"><br>
            </div>
            <div class="col-md-4">
                <label>Data Fim</label><br>
                <input class="form-control" type="date" name="data_fim"
                       value="@if(!empty(old('data_fim'))){{old('data_fim') }}@elseif(!empty($curso->data_fim)){{$curso->data_fim}}@endif"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Tipo</label><br>
                <select class="form-control" name="tipo">
                    <option @if(!empty(old('tipo')) && old('tipo') === 'GRADUACAO') selected
                            @elseif (!empty($curso->tipo) && old('tipo') === 'GRADUACAO') selected
                            @endif value="GRADUAÇÃO">GRADUAÇÃO
                    </option>
                    <option @if(!empty(old('tipo')) && old('tipo') === 'MEDIO') selected
                            @elseif (!empty($curso->tipo) && $curso->tipo === 'MEDIO') selected
                            @endif value="MÉDIO">MÉDIO
                    </option>
                    <option @if(!empty(old('tipo')) && old('tipo') === 'Federal') selected
                            @elseif (!empty($curso->tipo) && $curso->tipo === 'Federal') selected
                            @endif value="FIC">FIC
                    </option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a href="{{url("/cursos")}}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Voltar</a>
    </form>
@stop
