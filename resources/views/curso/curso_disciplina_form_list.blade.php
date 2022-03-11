@extends('layouts.app')

@section('titulo', 'curso Disciplinas')


@section('cabecalho')
    <h3 class="h3">Detalhe Curso Disciplina</h3>
    <hr>
@stop

@section('form')
    @php

        $curso_id = !empty($curso_id) ? $curso_id : $cursoDisciplina->id;

            if(Request::segments()[1] == "edit"){
                  $action = action('CursoDisciplinaController@update', $curso_id) ;
            } else {
                  $action = action('CursoDisciplinaController@salvar', $curso_id) ;
            }
    @endphp
    <form class="form-group"
          action="{{$action}}"
          method="post">
        @csrf
        <input type="hidden" name="curso_id" value="{{$curso_id }}">

        <div class="col-md-6">
            <label>Disciplina</label><br>
            <select class="form-control" name="disciplina_id">
                <option value='' disabled selected>Selecionar</option>
                @foreach ($disciplinas ?? '' as $item)
                    <option value="{{ $item->id }}"
                            @if ($item->id == old('disciplina_id', $cursoDisciplina->disciplina_id ?? ""))
                            selected="selected"
                        @endif
                    >{{ $item->nome  }}</option>
                @endforeach
            </select>
            <br>
        </div>

        <div class="col-md-6">
            <label>Professor</label><br>
            <select class="form-control" name="professor_id">
                <option value='' disabled selected>Selecionar</option>
                @foreach ($professores ?? '' as $item)
                    <option value="{{ $item->id }}"
                            @if ($item->id == old('professor_id', $cursoDisciplina->professor_id ?? ""))
                            selected="selected"
                        @endif
                    >{{ $item->nome  }}</option>
                @endforeach
            </select>
            <br>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            <a href="{{ action('CursoDisciplinaController@listar',$curso_id)}}" class="btn btn-outline-success">
                <i class="fas fa-plus-circle"></i> Novo</a>
            <a class="btn btn-primary" style="/* margin-left: 200px; */"
               href="{{ url('cursos') }}"> <i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </form>
@stop


@section('listagem')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Disciplina</th>
            <th scope="col">Professores</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cursoDisciplinas ?? '' as $item)
            <tr>
                <th scope='row'>{{ $item->id }}</th>
                <td>{{ $item->disciplina->nome}}</td>
                <td>{{ $item->professor->nome}}</td>

                <td>
                    <a class="btn btn-outline-success"
                       href="{{ action('CursoDisciplinaController@editar', $item->id) }}"><i
                            class='fas fa-edit'></i></a>
                    <a class="btn btn-outline-danger"
                       href="{{action( 'CursoDisciplinaController@deletar',  $item->id) }}"
                       onclick=" return confirm('Remover curso?');"><i
                            class='fas fa-trash'></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--$cursoDisciplinas->links()--}}
@stop
