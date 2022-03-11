@extends('layouts.app')

@section('titulo', 'Cadastrar Escolas')

@section('script')
<script>
    $(document).ready(function($){
        $('#cnpj').mask('99.999.999/9999-99');

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

    @php
        if(!empty(Request::route('id'))){
            $action = action('EscolaController@salvar',$escola->id );
        }else{
            $action = action('EscolaController@salvar', 0);
        }
    @endphp
    <h3 class="h3">Formulário Escola</h3>
    <hr>
    <form class="form-group" action="{{ $action }}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="id"
                   value="@if(!empty(old('id'))) {{old('id') }}  @elseif (!empty($escola->id)) {{ $escola->id}} @endif">
            <div class="col-md-4">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome"
                       value="@if(!empty(old('nome'))) {{old('nome') }}  @elseif (!empty($escola->nome)) {{ $escola->nome}} @endif">
            </div>
            <div class="col-md-4">
                <label>Tipo</label><br>
                <select class="form-control" name="tipo">
                    <option @if(!empty(old('tipo')) && old('tipo') === 'Municipal') selected
                            @elseif (!empty($escola->tipo) && old('tipo') === 'Municipal') selected
                            @endif value="Municipal">Municipal
                    </option>
                    <option @if(!empty(old('tipo')) && old('tipo') === 'Estadual') selected
                            @elseif (!empty($escola->tipo) && $escola->tipo === 'Estadual') selected
                            @endif value="Estadual">Estadual
                    </option>
                    <option @if(!empty(old('tipo')) && old('tipo') === 'Federal') selected
                            @elseif (!empty($escola->tipo) && $escola->tipo === 'Federal') selected
                            @endif value="Federal">Federal
                    </option>
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <label>Sigla</label><br>
                <input class="form-control" type="text" name="sigla"
                       value="@if(!empty(old('sigla'))) {{old('sigla') }}  @elseif (!empty($escola->sigla)) {{ $escola->sigla}} @endif"><br>
            </div>
            <div class="col-md-4">
                <label>Cnpj</label><br>
                <input class="form-control" type="text" name="cnpj" id="cnpj"
                       value="@if(!empty(old('cnpj'))) {{old('cnpj') }}  @elseif (!empty($escola->cnpj)) {{ $escola->cnpj}} @endif"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>E-mail</label><br>
                <input class="form-control" type="text" name="email"
                       value="@if(!empty(old('email'))) {{old('email') }}  @elseif (!empty($escola->email)) {{ $escola->email}} @endif"><br>
            </div>
            <div class="col-md-4">
                <label>Cidade</label><br>
                <select class="form-control" name="municipio_id">
                @foreach ($municipios ?? '' as $item)
                    <option value="{{$item->id}}" @if (!empty($escola->municipio_id) && $escola->municipio_id == $item->id ) selected="selected" @endif
                        >{{$item->nome}} </option>
                    @endforeach
                </select>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>Telefone</label><br>
                <input class="form-control" type="text" id="telefone" name="telefone"
                       value="@if(!empty(old('telefone'))) {{old('telefone') }}  @elseif (!empty($escola->telefone)) {{ $escola->telefone}} @endif"><br>
            </div>
            <div class="col-md-4">
                <label>Bairro</label><br>
                <input class="form-control" type="text" id="bairro" name="bairro"
                       value="@if(!empty(old('bairro'))) {{old('bairro') }}  @elseif (!empty($escola->bairro)) {{ $escola->bairro}} @endif"><br>
            </div>
            <div class="col-md-2">
                <label>Cep</label><br>
                <input class="form-control" type="text" name="cep"
                       value="@if(!empty(old('cep'))) {{old('cep') }}  @elseif (!empty($escola->cep)) {{ $escola->cep}} @endif"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Rua</label><br>
                <input class="form-control" type="text" id="rua" name="rua"
                       value="@if(!empty(old('rua'))) {{old('rua') }}  @elseif (!empty($escola->rua)) {{ $escola->rua}} @endif"><br>
            </div>
            <div class="col-md-2">
                <label>Número</label><br>
                <input class="form-control" type="text" id="numero" name="numero"
                       value="@if(!empty(old('numero'))) {{old('numero') }}  @elseif (!empty($escola->numero)) {{ $escola->numero}} @endif"><br>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
        <a href="{{url("/escolas")}}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Voltar</a>
    </form>
@stop
