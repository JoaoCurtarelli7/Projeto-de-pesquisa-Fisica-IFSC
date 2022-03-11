@extends('layouts.app')

@section('cabecalho')
    <h3 class="h3">Listagem de Matriculas</h3><br>
@stop

@section('listagem')

<div class="col-md-12">
    <form action="{{ action('MatriculaController@pesquisar')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Pesquisar matricula..." name="matricula" id="">
            </div>
            <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar</button>
            <div class="col-3">
                <a href="{{ action('DisciplinaController@cadastrar') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Cadastrar</a>
            </div>
        </div>
</div>
</form>
<p></p>

    <table class='table'>
        <tr>
            <th>Id</th>
            <th>Matricula</th>
            <th>Data Matricula</th>
            <th>Aluno</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Ações</th>
        </tr>

        @foreach($matriculas as $item)
            <tr>
            <td>{{$item->id}}</td>
                <td>{{$item->matricula}}</td>    
                <td>{{ date( 'd/m/Y' , strtotime($item->data_matricula))}}</td>       
                <td>{{$item->aluno->nome}}</td>
                <td>{{$item->curso->nome}}</td>
                <td>{{$item->turma->nome}}</td>
                <td>
                  
                    <a class="btn btn-outline-success" href="{{ action('MatriculaController@editar', $item->id) }}"><i
                            class='fas fa-edit'></i></a>
                    <a class="btn btn-outline-danger" onclick=" return confirm('Remover Matricula?');"
                       href="{{ action('MatriculaController@deletar', $item->id) }}"><i class='fas fa-trash'></i></a>

                </td>
            </tr>
        @endforeach

    </table>
    {{$matriculas->links()}}

@stop
