@extends('layouts.app')

@section('titulo', 'Cadastrar Turmas')
@section('cabecalho')
    <h3 class="h3">Formulário Turma</h3>
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

    <form class="form-group" action="{{ action('TurmaController@salvar', 0) }}" method="post">
        @csrf
        <label>Nome</label><br>
        <input class="col-sm-3 form-control" type="text" name="nome" value="{{old('nome') }}"><br>
        <label>Curso</label><br>
        <select class="col-sm-3 form-control" name="curso_id">
            @foreach($cursos as $item)
                <option value="{{$item->id}}"><?php echo $item->nome ?></option>
            @endforeach
        </select><br>
        <label>Turno</label><br>
        <input class="col-sm-3 form-control" type="text" name="turno" value="{{old('turno') }}"><br>
        <label>Série</label><br>
        <input class="col-sm-3 form-control" type="text" name="serie" value="{{old('serie') }}"><br>
        <label>Sigla</label><br>
        <input class="col-sm-3 form-control" type="text" name="sigla" value="{{old('sigla') }}"><br>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('turmas') }}"> <i
                class="fas fa-arrow-left"></i> Voltar</a>
    </form>

@stop
