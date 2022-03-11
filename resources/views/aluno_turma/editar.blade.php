@extends('layouts.app')

@section('titulo', 'Cadastrar Alunos')

@section('script')
<script>
    $(document).ready(function($){
        $('#telefone').mask('(49) 99999-9999');
        $('#telefone2').mask('(49) 99999-9999');
   });
</script>
@endsection

@section('form')
<h3 class="h3">Editar Aluno</h3><br>
    <form class="" action="{{ action('AlunoController@salvar', $alunos->id) }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-4">
      <label>Nome</label><br>
      <input class="form-control" type="text" name="nome" value="{{$alunos->nome}}"><br>
        </div>
      <div class="col-md-4">
      <label>Email</label><br>
      <input class="form-control" type="email" name="email" value="{{$alunos->email}}"><br>
      </div>
        </div>


      <div class="row">
        <div class="col-md-4">
      <label>Contato</label><br>
      <input class="form-control" type="text" id="telefone" name="contato" value="{{$alunos->contato}}"><br>
        </div>
      <div class="col-md-4">
      <label>Contato dos Responsáveis</label><br>
      <input class="form-control" type="text" id="telefone2" name="contato_responsaveis" value="{{$alunos->contato_responsaveis}}"><br>
      </div></div>
      <div class="row">
        <div class="col-md-4">
 <label>Matrícula</label><br>
      <input class="form-control" type="text" name="matricula" value="{{$alunos->matricula}}"><br>

        </div>
        <div class="col-md-4">

      <div class="form-group">
      <label>Turma</label><br>
      <select class="form-control" name="turma_id">
        @foreach($turmas as $item)
        <option value="{{$item->id}}"><?php echo $item->nome ?></option>
        @endforeach
      </select>
    </div>
        </div></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            <a class="btn btn-primary" style="/* margin-left: 200px; */" href="{{ url()->previous()}}"> <i
                    class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </form>
@stop
