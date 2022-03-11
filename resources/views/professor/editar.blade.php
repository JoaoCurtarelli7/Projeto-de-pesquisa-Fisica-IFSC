@extends('layouts.app')

@section('titulo', 'Cadastrar Professores')

@section('form')
<h3 class="h3">Editar</h3><br>

<form class="form-group" action="{{ action('ProfessorController@salvar', $professores->id) }}" method="post">
    @csrf
    <label>Nome</label><br>
    <input class="col-sm-3 form-control" type="text" name="nome" value="{{ $professores->nome }}"><br>
    <label>Email</label><br>
    <input class="col-sm-3 form-control" type="email" name="email" value="{{ $professores->email }}"><br>
    <label>Contato</label><br>
    <input class="col-sm-3 form-control" type="text" name="contato" value="{{ $professores->contato }}"><br>
    <label>Área</label><br>
    <select class="col-sm-3 form-control" name="disc_id">
        @foreach ($disciplinas as $item)
        <option value="{{ $item->id }}"><?php echo $item->nome; ?></option>
        @endforeach
    </select><br>
    <label>Titulação</label><br>
    <select class="col-sm-3 form-control" name="titulacao">
        <option <?php echo $professores->titulacao === 'Graduação' ? 'selected' : ''; ?> value="Graduação">Graduação
        </option>
        <option <?php echo $professores->titulacao === 'Pós-Graduação' ? 'selected' : ''; ?> value="Pós-Graduação">
            Pós-Graduação</option>
        <option <?php echo $professores->titulacao === 'Mestrado' ? 'selected' : ''; ?> value="Mestrado">Mestrado
        </option>
        <option <?php echo $professores->titulacao === 'Doutorado' ? 'selected' : ''; ?> value="Doutorado">Doutorado
        </option>
        <option <?php echo $professores->titulacao === 'Pós-Doutorado' ? 'selected' : ''; ?> value="Pós-Doutorado">
            Pós-Doutorado</option>

    </select><br>
    <label>Formação</label><br>
    <input class="col-sm-3 form-control" type="text" name="formacao" value="{{ $professores->formacao }}"><br>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
    <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('professores') }}"> <i
            class="fas fa-arrow-left"></i> Voltar</a>
</form>

@stop
