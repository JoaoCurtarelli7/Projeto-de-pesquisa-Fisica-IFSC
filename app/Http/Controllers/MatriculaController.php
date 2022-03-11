<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Curso;

use Illuminate\Http\Request;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatriculaController extends Controller
{
    public function listar()
    {
        $matricula = Matricula::paginate(3);

        return view('matricula.listar')->with('matriculas', $matricula);
    }

    public function cadastrar()
    {

        return view('matricula.cadastrar')->with('turmas', $turmas)->with('cursos', $cursos)->with('alunos', $alunos);
    }

    public function salvar(Request $request, $id)
    {
        Validator::make($request->all(), Matricula::rules())->validate();
        if ($id == 0) {
            Matricula::create($request->all());

        } else {
            Matricula::updateOrCreate(
                ['id' => $request->id],
                $request->all()
            );

        }
        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('MatriculaController@listar');
    }

    public function editar($id)
    {
        $matricula = Matricula::find($id);

        return view('matricula.editar')->with(['matricula' => $matricula, 'turmas' => $turmas, 'cursos' => $cursos, 'alunos' => $alunos]);
    }

    public function deletar($id)
    {
        $matricula = Matricula::find($id);

        if (empty($matricula)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $matricula->delete();

        return redirect()->action('MatriculaController@listar')->with('error', "Registro Removido com Sucesso!");
    }

    public function pesquisar(Request $request)
    {
        if (!empty($request->matricula)) {
            $objResult = Matricula::where('matricula', 'like', "%" . $request->matricula . "%")->orderBy('matricula')->paginate(10);
        }else{
            $objResult = Matricula::orderBy('matricula')->paginate(10);
        }

        return view('matricula.listar')->with('matriculas', $objResult);
    }
}
