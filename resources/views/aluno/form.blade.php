@extends('layouts.app')

@section('titulo', 'Cadastrar Alunos')

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
            $action = action('AlunoController@salvar',$aluno->id );
        }else{
            $action = action('AlunoController@salvar', 0);
        }
    @endphp
    <h3 class="h3">Formulário Aluno</h3>
    <hr>
    <form class="form-group" action="{{ $action }}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="id"
                   value="@if(!empty(old('id'))) {{old('id') }}  @elseif (!empty($aluno->id)) {{ $aluno->id}} @endif">
            <div class="col-md-4">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome"
                       value="@if(!empty(old('nome'))) {{old('nome') }}  @elseif (!empty($aluno->nome)) {{ $aluno->nome}} @endif">
            </div>
            <div class="col-md-4">
                <label>Email</label><br>
                <input class="form-control" type="text" name="email"
                       value="@if(!empty(old('email'))) {{old('email') }}  @elseif (!empty($aluno->email)) {{ $aluno->email}} @endif"><br>
            </div>
            {{--
            <div class="col-md-4">
                <label>Matricula</label>
                <input class="form-control" type="text" name="matricula"
                       value="@if(!empty(old('matricula'))) {{old('matricula') }}  @elseif (!empty($aluno->matricula)) {{ $aluno->matricula}} @endif">
            </div>
             --}}
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Contato</label><br>
                <input class="form-control" type="text" name="contato"
                       value="@if(!empty(old('contato'))) {{old('contato') }}  @elseif (!empty($aluno->contato)) {{ $aluno->contato}} @endif"><br>
            </div>
            <div class="col-md-4">
                <label>Contato Responsáveis</label><br>
                <input class="form-control" type="text" name="contato_responsaveis"
                       value="@if(!empty(old('contato_responsaveis'))) {{old('contato_responsaveis') }}  @elseif (!empty($aluno->contato_responsaveis)) {{ $aluno->contato_responsaveis}} @endif"><br>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a href="{{url("/alunos")}}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Voltar</a>
    </form>
@stop
