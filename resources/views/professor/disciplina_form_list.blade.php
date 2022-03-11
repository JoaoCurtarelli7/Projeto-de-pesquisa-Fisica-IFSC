@extends('layouts.app')

@section('titulo', 'Professor Disciplinas')


@section('cabecalho')
    <h3 class="h3">Detalhe Professor Disciplina</h3>
    <hr>
@stop

@section('form')
    @php
        if(Request::segments()[1] == "edit"){
              $action = action('ProfessorDisciplinaController@update', $professorDisciplina->id) ;
        } else {
              $action = action('ProfessorDisciplinaController@store', $professor_id) ;
        }
    @endphp
    <form class="form-group"
          action="{{$action}}"
          method="post">
        @csrf
        <input type="hidden" name="professor_id" value="{{$professor_id }}">

        <div class="col-md-6">
            <label>Disciplina</label><br>
            <select class="form-control" name="disciplina_id">
                @foreach ($disciplinas ?? '' as $item)
                    <option value="{{ $item->id }}"
                            @if ($item->id == old('disciplina_id', $professorDisciplina->disciplina_id ?? ""))
                            selected="selected"
                        @endif
                    >{{ $item->nome  }}</option>
                @endforeach
            </select>
            <br>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            <a class="btn btn-primary" style="/* margin-left: 200px; */"
               href="{{ url('professores') }}"> <i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </form>
@stop


@section('listagem')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Disciplina</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($professorDisciplinas ?? '' as $item)
            <tr>
                <th scope='row'>{{ $item->id }}</th>
                <td>{{ $item->disciplinas->nome}}</td>
                <td>
                    <a class="btn btn-outline-success"
                       href="{{ action('ProfessorDisciplinaController@edit', $item->id) }}"><i
                            class='fas fa-edit'></i></a>
                    <a class="btn btn-outline-danger"
                       href="{{action( 'ProfessorDisciplinaController@destroy',  $item->id) }}"
                       onclick=" return confirm('Remover Professor?');"><i
                            class='fas fa-trash'></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--$professorDisciplinas->links()--}}

@stop
