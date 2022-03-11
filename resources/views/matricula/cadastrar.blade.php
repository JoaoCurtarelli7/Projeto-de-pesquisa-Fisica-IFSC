@extends('layouts.app')

@section('titulo', 'Cadastrar Matriculas')
@section('cabecalho')
    <h3 class="h3">Formulário Matricula</h3>
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

    <form class="form-group" action="{{ action('MatriculaController@salvar', 0) }}" method="post">
        @csrf
        <label>Matricula</label><br>
        <input class="col-sm-3 form-control" type="text" name="matricula" value="{{old('matricula') }}"><br>

            <br>
        <label>Curso</label><br>
        <select class="col-sm-3 form-control" name="curso_id">
            @foreach($cursos as $item)
                <option value="{{$item->id}}"><?php echo $item->nome ?></option>
            @endforeach
        </select><br>

        <label>Turma</label><br>
        <select class="col-sm-3 form-control" name="turma_id">
            @foreach($turmas as $item)
                <option value="{{$item->id}}"><?php echo $item->nome ?></option>
            @endforeach
        </select><br>

        <label>Aluno</label><br>
        <select class="col-sm-3 form-control" name="aluno_id">
            @foreach($alunos as $item)
                <option value="{{$item->id}}"><?php echo $item->nome ?></option>
            @endforeach
        </select><br>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('matriculas') }}"> <i
                class="fas fa-arrow-left"></i> Voltar</a>
    </form>

@stop
