@extends('layouts.app')

@section('titulo', 'Cadastrar Matriculas')

@section('form')
    <h3 class="h3">Editar</h3><br>
    <form class="form-group" action="{{ action('MatriculaController@salvar', $matriculas->id) }}" method="post">
        @csrf
        <label>Matricula</label><br>
        <input class="col-sm-3 form-control" type="text" name="matricula" value="{{$matriculas->matricula}}"><br>
        <label>Curso</label><br>
        <select class="col-sm-3 form-control" name="curso_id">
            @foreach($cursos as $item)
                <option value="{{$item->id}}"
                        @if (!empty($matriculas->curso_id) && $matriculas->curso_id == $item->id ) selected="selected" @endif
                >{{$item->nome}}</option>
            @endforeach
        </select><br>

        <label>Turma</label><br>
        <select class="col-sm-3 form-control" name="turmas_id">
            @foreach($turmas as $item)
                <option value="{{$item->id}}"
                        @if (!empty($matriculas->turma_id) && $matriculas->turma_id == $item->id ) selected="selected" @endif
                >{{$item->nome}}</option>
            @endforeach
        </select><br>

        <label>Aluno</label><br>
        <select class="col-sm-3 form-control" name="aluno_id">
            @foreach($alunos as $item)
                <option value="{{$item->id}}"
                        @if (!empty($matriculas->aluno_id) && $matriculas->aluno_id == $item->id ) selected="selected" @endif
                >{{$item->nome}}</option>
            @endforeach
        </select><br>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('matriculas') }}"> <i
                class="fas fa-arrow-left"></i> Voltar</a>
    </form>
@stop
