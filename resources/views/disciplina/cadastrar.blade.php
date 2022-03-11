@extends('layouts.app')

@section('titulo', 'Cadastrar Disciplina')
@section('cabecalho')
<h3 class="h3">Formulário Disciplina</h3>
<hr>
@stop
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

    <form class="form-group" action="{{ action('DisciplinaController@salvar', 0) }}" method="post">
        @csrf
        <div class="col-md-4">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" value="{{ old('nome') }}">
        </div><br>
        <div class="col-md-4">
            <label>Turno</label><br>
            <select class=" form-control" name="turno" value="turno" value="{{ old('turno') }}">
                <option>Escolha o Turno</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
                <option value="Noturno">Noturno</option>
                <option value="Integral">Integral</option>
            </select>
        </div><br>
        <div class="col-md-4">
            <label>Carga Horária</label><br>
            <input class=" form-control" type="text" name="carga_hr" value="{{ old('carga_hr') }}">
        </div><br>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('disciplina') }}"> <i
                class="fas fa-arrow-left"></i> Voltar</a>
    </form>



@stop
