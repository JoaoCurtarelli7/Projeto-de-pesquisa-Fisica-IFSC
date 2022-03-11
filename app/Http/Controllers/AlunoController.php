<?php

namespace App\Http\Controllers;

use App\Charts\AlunoDesempenhoChart;
use App\Http\Controllers\Grafico\AvaliacaoGraficoController;
use App\Http\Controllers\Grafico\TurmaGraficoController;
use App\Models\Aluno;
use App\Models\AvaliacaoAluno;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    public function listar()
    {
        $alunos = Aluno::orderBy("id")->paginate(5);

        return view('aluno.listar', compact('alunos'));
    }

    public function cadastrar()
    {
        return view('aluno.form');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            //'matricula' => 'required',
            'email' => 'required',
            'contato' => 'required',
            'contato_responsaveis' => 'required',
        ], [
            'nome.required' => 'O Nome é obrigatório',
         //   'matricula.required' => 'A Matricula é obrigatório',
            'email.required' => 'O E-Mail é obrigatório',
            'contato.required' => 'O Contato é obrigatório',
            'contato_responsaveis.required' => 'O Contato do Responsavel é obrigatório',
        ]);

        if ($request->id == 0) {
            Aluno::create($request->all());

        } else {
            Aluno::updateOrCreate(['id' => $request->id], $request->all());

        }

        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('AlunoController@listar');
    }

    public
    function editar($id)
    {
        $aluno = Aluno::find($id);

        return view('aluno.form')->with('aluno', $aluno);
    }

    public
    function pesquisar(Request $request)
    {
        if (!empty($request->nome)) {
            $alunos = Aluno::where('nome', 'like', "%" . $request->input('nome') . "%")->paginate(5);
        } else {
            $alunos = Aluno::orderBy("id")->paginate(5);
        }

        return view('aluno.listar', compact('alunos'));
    }

    public
    function deletar($id)
    {
        $aluno = Aluno::find($id);

        if (empty($aluno)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $turma = $aluno->turma_id;
        $aluno->delete();


        return redirect()->action('AlunoController@listar', $turma);
    }

    public
    function grafico(AlunoDesempenhoChart $chart)
    {
        // return view('aluno.grafico');
        return view('users.index', ['chart' => $chart->build()]);
    }
}
