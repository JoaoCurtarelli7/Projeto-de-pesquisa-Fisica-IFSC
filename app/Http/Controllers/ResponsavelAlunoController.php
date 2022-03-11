<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Responsavel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsavelAlunoController extends Controller
{
    public function listar()
    {
        $responsaveis = Responsavel::paginate(3);

        return view('responsavel.listar')->with('responsaveis', $responsaveis);
    }
    public function cadastrar()
    {
        $alunos = Aluno::get();

        return view('responsavel.cadastrar')->with('alunos', $alunos);;
    }
    public function salvar(Request $request, $id)
    {
        if ($id == 0) {
            Responsavel::create($request->all());
        } else {
            Responsavel::updateOrCreate(['id' => $id], $request->all());
        }
        return redirect()->action('ResponsavelAlunoController@listar');
    }

    public function pesquisar(Request $request)
    {
        if (!empty($request->nome)) {
            $objResult = Responsavel::where('nome', 'like', "%" . $request->nome . "%")->orderBy('nome')->paginate(10);
        } else {
            $objResult = Responsavel::orderBy('nome')->paginate(10);
        }

        return view('responsavel.listar')->with('responsaveis', $objResult);
    }

    public function editar($id)
    {
        $responsavel = Responsavel::find($id);
        $alunos = Aluno::get();


        return view('responsavel.editar')->with('responsavel', $responsavel)->with('alunos', $alunos);
    }

    public function deletar($id)
    {
        $responsavel = Responsavel::find($id);

        if (empty($responsavel)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $responsavel->delete();

        return redirect()->action('ResponsavelAlunoController@listar');
    }
}
