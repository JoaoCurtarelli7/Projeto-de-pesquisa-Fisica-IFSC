<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Grafico\TurmaGraficoController;
use App\Models\Avaliacao;
use App\Models\AvaliacaoAluno;
use App\Models\Disciplina;
use App\Models\Turma;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AvaliacaoController extends Controller
{
    public function listar()
    {
        $avaliacao = Avaliacao::paginate(3);

        return view('avaliacao.listar')->with('avaliacaos', $avaliacao);
    }

    public function cadastrar()
    {
        $turmas = Turma::orderBy('nome')->get();
        $disciplinas = Disciplina::orderBy('nome')->get();

        return view('avaliacao.form', compact('turmas', 'disciplinas'));
    }

    public function salvar(Request $request, $id)
    {

        Validator::make($request->all(), Avaliacao::rules(), Avaliacao::message())->validate();

        if ($id == 0) {
            Avaliacao::create($request->all());

        } else {
            Avaliacao::updateOrCreate(['id' => $request->id], $request->all());

        }

        $request->session()->flash('success', "Registro Salvo com Sucesso!");
        return redirect()->action('AvaliacaoController@listar');
    }

    public function pesquisar(Request $request)
    {
        if (!empty($request->nome)) {
            $avaliacaos = Avaliacao::where('titulo', 'like', "%" . $request->nome . "%")->paginate(10);
        } else {
            $avaliacaos = Avaliacao::orderBy('titulo')->paginate(10);
        }

        return view('avaliacao.listar', compact('avaliacaos'));
    }

    public function editar($id)
    {
        $avaliacao = Avaliacao::find($id);

        $turmas = Turma::orderBy('nome')->get();
        $disciplinas = Disciplina::orderBy('nome')->get();

        return view('avaliacao.form', compact('avaliacao', 'turmas', 'disciplinas'));
    }

    public function deletar($id)
    {
        $avaliacao = Avaliacao::find($id);

        if (empty($avaliacao)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $avaliacao->delete();

        return redirect()->action('AvaliacaoController@listar')->with('error', "Registro Removido com Sucesso!");
    }

    public function graficoTurma($id, $turma_id)
    {
        if ($id != 0) {
            $avaliacao = Avaliacao::find($id);
            $avaliacaoAlunos = AvaliacaoAluno::where('avaliacao_id', $id)->paginate(3);
            $turma = Turma::find($avaliacao->turma_id);
        }

        if (!$avaliacaoAlunos->isEmpty()) {
            $avGrafico = new TurmaGraficoController();

            $graficosDC = $avGrafico->getDataGraficosDelineamentoColetivo($turma_id, $id);
            $graficosDC2 = $avGrafico->getDataGraficosResolucaodoproblema($turma_id, $id);
            $graficosDC3 = $avGrafico->getDataGraficosAnalisedoresultado($turma_id, $id);
            $graficosTBP = $avGrafico->getDataGraficoTurmaBoxPlot($turma_id, $id);

            //return view('aluno.listar', compact('alunos', 'graficosDC','graficosDC2', 'graficosDC3'));

            return view('grafico.desempenho_turma', compact('avaliacaoAlunos', 'avaliacao', 'turma', 'graficosDC', 'graficosDC2', 'graficosDC3', 'graficosTBP'));
        } else {
            return redirect()->back()->with('warning', "Turma ainda não tem avaliação!");
        }
    }

}
