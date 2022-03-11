<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function listar()
    {
        $turma = Turma::orderBy('nome')->paginate(5);

        return view('turma.listar')->with('turmas', $turma);
    }

    public function cadastrar(Request $request)
    {
        $cursos = Curso::get();

        return view('turma.cadastrar')->with('cursos', $cursos);
    }

    public function salvar(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'turno' => 'required',
            'serie' => 'required',

        ], [
            'nome.required' => 'O Nome é obrigatório',
            'turno.required' => 'O Turno é obrigatório',
            'serie.required' => 'O Serie é obrigatório',

        ]);

        if ($id == 0) {
            $turma = new Turma();
            $turma->nome = $request->input('nome');
            $turma->curso_id = $request->input('curso_id');
            $turma->turno = $request->input('turno');
            $turma->serie = $request->input('serie');
            $turma->sigla = $request->input('sigla');

            $turma->save();

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('TurmaController@listar');

        } else {
            $turma = Turma::find($id);
            $turma->nome = $request->input('nome');
            $turma->curso_id = $request->input('curso_id');
            $turma->turno = $request->input('turno');
            $turma->serie = $request->input('serie');
            $turma->sigla = $request->input('sigla');

            $turma->save();

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('TurmaController@listar');

        }

    }

    public function editar($id, Request $request)
    {
        $turma = Turma::find($id);
        $cursos = Curso::get();

        return view('turma.editar')->with('turmas', $turma)->with('cursos', $cursos);

    }

    public function deletar($id)
    {
        $turma = Turma::find($id);

        if (empty($turma)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $turma->delete();

        return redirect()->action('TurmaController@listar')->with('error', "Registro Removido com Sucesso!");
    }

    public function pesquisar(Request $request)
    {
        if (!empty($request->nome)) {
            $objResult = Turma::where('nome', 'like', "%" . $request->nome . "%")->orderBy('nome')->paginate(10);
        }else{
            $objResult = Turma::orderBy('nome')->paginate(10);
        }

        return view('turma.listar')->with('turmas', $objResult);
    }

}
