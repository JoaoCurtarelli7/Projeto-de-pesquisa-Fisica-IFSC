<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Grafico\AvaliacaoGraficoController;
use App\Http\Controllers\Grafico\TurmaGraficoController;
use App\Models\Avaliacao;
use App\Models\AvaliacaoAluno;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliacaoAlunoController extends Controller
{
    public function listar($id)
    {
        $avaliacaoAlunos = AvaliacaoAluno::where('avaliacao_id', $id)->paginate(3);
        $avaliacao = Avaliacao::find($id);
        $turma = Turma::find($avaliacao->turma_id);

        return view('avaliacao_aluno.listar', compact('avaliacaoAlunos', 'avaliacao', 'turma'));
    }

    public function cadastrar($id)
    {
        $avaliacao = Avaliacao::find($id);
        $alunos = Aluno::orderBy('nome')->get();
        $turma = Turma::find($avaliacao->turma_id);
        /*
        $contador = 0;
                $users2 = DB::table('aluno')->where('turma_id', $aluno->turma_id)->get()->toArray();

                // dd($users2);

                $arrLength = count($users2);

                foreach ($users2 as $i => $user) {
                    // dd("$i: $value\n");
                    $contador++;
                    if ($user->id == $id) {
                        break;
                    }
                }
                if ($arrLength == $contador) {
                    //  dd($users2[0]->id);
                } else {
                    //  dd($users2[$contador]->id);
                }
                */

        return view('avaliacao_aluno.form', compact('avaliacao', "turma", 'alunos',));
    }

    public function salvar(Request $request)
    {
        if ($request->id == 0) {
            $avaliacaoAluno = AvaliacaoAluno::create($request->all());

        } else {
            $avaliacaoAluno = AvaliacaoAluno::updateOrCreate(['id' => $request->id], $request->all());

        }

        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('AvaliacaoAlunoController@listar', $avaliacaoAluno->avaliacao_id);
    }

    public function editar($id)
    {
        $avaliacaoAluno = AvaliacaoAluno::find($id);

        $avaliacao = Avaliacao::find($avaliacaoAluno->avaliacao_id);
        $turma = Turma::find($avaliacao->turma_id);
        $alunos = Aluno::orderBy('nome')->get();

        return view('avaliacao_aluno.form', compact('avaliacaoAluno', 'avaliacao', "turma", 'alunos'));
    }

    public function deletar($id)
    {
        $avaliacaoAluno = AvaliacaoAluno::find($id);
        $aluno = $avaliacaoAluno->aluno_id;

        if (empty($avaliacaoAluno)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $avaliacaoAluno->delete();

        return redirect()->action('AvaliacaoAlunoController@listar', $aluno)->with('error', "Registro Removido com Sucesso!");
    }

    public function graficoIndividual($id, $aluno_id)
    {
        if ($id != 0) {
            $aa = AvaliacaoAluno::find($id);
            $avaliacaoAlunos = AvaliacaoAluno::where('aluno_id', $aluno_id)->paginate(3);

            $aluno = Aluno::find($aluno_id);
          //  $turma = Turma::find($avaliacao->turma_id);
        }

        if (!$avaliacaoAlunos->isEmpty()) {
            $avGrafico = new AvaliacaoGraficoController();
            $graficosAP = $avGrafico->getGraficosAnalise($aluno_id);
            $graficosRP = $avGrafico->getGraficosResolucao($aluno_id);
            $graficosDE = $avGrafico->getGraficosDelineamento($aluno_id);
            $graficosDI = $avGrafico->getGrafTempo($aluno_id);
            return view('grafico.desempenho_individual', compact('avaliacaoAlunos', 'aluno', /*'avaliacao',  'turma',*/ 'graficosDE', 'graficosDI', 'graficosRP', 'graficosAP'));
            //  return view('avaliacao_aluno.grafico_desempenho_individual', compact('avaliacaoAlunos', 'avaliacao'));
        } else {
            return redirect()->back()->with('warning', "Aluno ainda não tem avaliação!");
        }
    }

}
