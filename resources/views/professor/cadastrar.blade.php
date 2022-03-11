@extends('layouts.app')

@section('titulo', 'Cadastrar Professores')

@section('cabecalho')
<h3 class="h3">Formulário Professor</h3>
<hr>
@stop

@section('script')
<script>
    $(document).ready(function($){
        $('#contato').mask('(49) 99999-9999');

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

<form class="form-group" action="{{ action('ProfessorController@salvar', 0) }}" method="post">
    @csrf
    <div class="col-md-4">
        <label>Nome</label>
        <input class="form-control" type="text" name="nome" value="{{old('nome') }}" >
    </div>
    <div class="col-md-4">
        <label>Email</label>
        <input class="form-control" type="email" name="email"  value="{{old('email') }}">
    </div>
    <div class="col-md-3">
        <label>Contato</label>
        <input class="form-control" type="text" id="contato" name="contato" value="{{old('contato') }}">
    </div>

    <div class="col-md-4">
        <label>Titulação</label>
        <select class="form-control" name="titulacao"  value="{{old('titulacao') }}">
            <option>Escolha sua titulação</option>
            <option value="Graduação">Graduação</option>
            <option value="Pós-Graduação">Pós-Graduação</option>
            <option value="Mestrado">Mestrado</option>
            <option value="Doutorado">Doutorado</option>
            <option value="Doutorado">Pós-Doutorado</option>
        </select>
    </div>
    <div class="col-md-4">
        <label>Formação</label>
        <input class="form-control" type="text" name="formacao" value="{{old('formacao') }}">
    </div>
    <br>
    <div class="col-md-6">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url('professores') }}"> <i
                class="fas fa-arrow-left"></i> Voltar</a>
    </div>
</form>
@stop
