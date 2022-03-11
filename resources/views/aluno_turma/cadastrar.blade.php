@extends('layouts.app')

@section('titulo', 'Cadastrar Alunos')
@section('cabecalho')
<h3 class="h3">Formulário Aluno</h3>
<hr>
@stop
@section('script')
    <script>
        $(document).ready(function ($) {
            $('#contato').mask('(49) 99999-9999');
            $('#contato_responsaveis').mask('(49) 99999-9999');
        });
    </script>
@endsection

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
    <form class="form-group" action="{{ action('AlunoController@salvar', 0) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label>Nome</label><br>
                <input class="form-control" type="text" name="nome"  value="{{old('nome') }}"><br>
            </div>

            <div class="col-md-4">
                <label>Email</label><br>
                <input class="form-control" type="email" name="email"  value="{{old('email') }}"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Contato</label><br>
                <input class="form-control" type="text" id="contato" name="contato"  value="{{old('contato') }}"><br>
            </div>
            <div class="col-md-4">
                <label>Contato dos Responsáveis</label><br>
                <input class="form-control" type="text" id="contato_responsaveis" name="contato_responsaveis"
                        value="{{old('contato_responsaveis') }}"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Matrícula</label><br>
                <input class="form-control" type="text" name="matricula"  value="{{old('matricula') }}"><br>
            </div>

        </div>

        <input type="hidden" name="turma_id" value="{{$turma_id}}"><br>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            <a class="btn btn-primary"
               href="{{ route('alunoturma',  !empty(Request::route('id'))? Request::route('id'): $turma_id)}}">
                <i
                    class="fas fa-arrow-left"></i> Voltar</a>
        </div>
@stop
