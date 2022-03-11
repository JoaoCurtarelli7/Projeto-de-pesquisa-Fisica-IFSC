@extends('layouts.app')

@section('titulo', 'Cadastrar Responsável')

@section('form')
<h3 class="h3">Formulário Responsável</h3><br>
<form class="form-group" action="{{ action('ResponsavelAlunoController@salvar', 0) }}" method="post">
    @csrf
    <label>Nome</label><br>
    <input class="col-sm-3 form-control" type="text" name="nome" required><br>
    <label>Email</label><br>
    <input class="col-sm-3 form-control" type="email" name="email" required><br>
    <label>Contato</label><br>
    <input class="col-sm-3 form-control" type="text" name="contato" required><br>
    <label>Responsável do Aluno</label><br>
    <select class="col-sm-3 form-control" name="resp_id">
        @foreach($alunos as $item)
        <option value="{{$item->id}}"><?php echo $item->nome ?></option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
    <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('responsavel') }}"> <i
            class="fas fa-arrow-left"></i> Voltar</a>
</form>



@stop
