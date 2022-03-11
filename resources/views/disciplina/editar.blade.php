@extends('layouts.app')

@section('titulo', 'Cadastrar Disciplina')

@section('form')
<h3 class="h3">Editar</h3><br>
<form class="form-group" action="{{ action('DisciplinaController@salvar', $disciplina->id) }}" method="post">
    @csrf
    <label>Nome</label><br>
    <input class="col-sm-3 form-control" type="text" name="nome" value="{{ $disciplina->nome }}"><br>
    <label>Turno</label><br>
    <select class="col-sm-3 form-control" name="turno">
        <option <?php echo $disciplina->turno === 'Matutino' ? 'selected' : ''; ?> value="Matutino">Matutino
        </option>
        <option <?php echo $disciplina->turno === 'Vespertino' ? 'selected' : ''; ?> value="Vespertino">Vespertino
        </option>
        <option <?php echo $disciplina->turno === 'Noturno' ? 'selected' : ''; ?> value="Noturno">Noturno
        </option>
        <option <?php echo $disciplina->turno === 'Integral' ? 'selected' : ''; ?> value="Integral">Integral
        </option>
    </select><br>
    <label>Carga Horaria</label><br>
    <input class="col-sm-3 form-control" type="text" name="carga_hr" value="{{ $disciplina->carga_hr }}"><br>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
    <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('disciplina') }}"> <i
            class="fas fa-arrow-left"></i> Voltar</a>
</form>


@stop
