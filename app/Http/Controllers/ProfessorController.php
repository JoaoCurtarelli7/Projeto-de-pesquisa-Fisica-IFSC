<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function listar()
    {
        $professor = Professor::paginate(3);
        //    \dd($professor->disciplina()->nome);
        return view('professor.listar')->with('professores', $professor);
    }

    public function cadastrar()
    {

        $disciplinas = Disciplina::get();

        return view('professor.cadastrar')->with('disciplinas', $disciplinas);
    }

    public function salvar(Request $request, $id)
    {

        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'contato' => 'required',
            'titulacao' => 'required',
            'formacao' => 'required',

        ], [
            'nome.required' => 'O Nome é obrigatório',
            'email.required' => 'O E-mail é obrigatório',
            'contato.required' => 'O Contato é obrigatório',
            'titulacao.required' => 'A Titulação é obrigatório',
            'formacao.required' => 'A Formação é obrigatório',

        ]);
        if ($id == 0) {
            $professor = new Professor();
            $professor->nome = $request->input('nome');
            $professor->email = $request->input('email');
            $professor->contato = $request->input('contato');
            //  $professor->disc_id = $request->input('disc_id');
            $professor->titulacao = $request->input('titulacao');
            $professor->formacao = $request->input('formacao');

            $professor->save();

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('ProfessorController@listar');
        } else {
            $professor = Professor::find($id);
            $professor->nome = $request->input('nome');
            $professor->email = $request->input('email');
            $professor->contato = $request->input('contato');
            //  $professor->disc_id = $request->input('disc_id');
            $professor->titulacao = $request->input('titulacao');
            $professor->formacao = $request->input('formacao');

            $professor->save();

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('ProfessorController@listar');
        }
    }

    public function pesquisar(Request $request)
    {
        $nome = $request->input('nome');

        $query = DB::table('professor');

        if (!empty($nome)) {
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        $professores = $query->orderBy('nome')->paginate(20);

        return view('professor.listar')->with('professores', $professores);
    }

    public function editar($id)
    {
        $professor = Professor::find($id);
        $disciplinas = Disciplina::get();

        return view('professor.editar')->with('professores', $professor)->with('disciplinas', $disciplinas);
    }

    public function deletar($id)
    {
        $professor = Professor::find($id);

        if (empty($professor)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $professor->delete();

        return redirect()->action('ProfessorController@listar')->with('error', "Registro Removido com Sucesso!");
    }
}
