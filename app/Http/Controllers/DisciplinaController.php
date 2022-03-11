<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    public function listar()
    {
        $disciplina = Disciplina::paginate(3);

        return view('disciplina.listar')->with('disciplina', $disciplina);
    }

    public function cadastrar()
    {

        return view('disciplina.cadastrar');
    }

    public function salvar(Request $request, $id)
    {

        $request->validate([
            'nome' => 'required',
            'turno' => 'required',
            'carga_hr' => 'required',

        ], [
            'nome.required' => 'O Nome é obrigatório',
            'turno.required' => 'O Turno é obrigatório',
            'carga_hr.required' => 'A Carga Horária é obrigatório',

        ]);
        if ($id == 0) {
            $disciplina = new Disciplina();
            $disciplina->nome = $request->input('nome');
            $disciplina->turno = $request->input('turno');
            $disciplina->carga_hr = $request->input('carga_hr');


            $disciplina->save();

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('DisciplinaController@listar');
        } else {
            $disciplina = Disciplina::find($id);
            $disciplina->nome = $request->input('nome');
            $disciplina->turno = $request->input('turno');
            $disciplina->carga_hr = $request->input('carga_hr');


            $disciplina->save();

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('DisciplinaController@listar');
        }
    }

    public function editar($id)
    {
        $disciplina = Disciplina::find($id);


        return view('disciplina.editar')->with('disciplina', $disciplina);
    }

    public function deletar($id)
    {
        $disciplina = Disciplina::find($id);

        if (empty($disciplina)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $disciplina->delete();

        return redirect()->action('DisciplinaController@listar')->with('error', "Registro Removido com Sucesso!");
    }

    public function pesquisar(Request $request)
    {
        $nome = $request->input('nome');

        $query = DB::table('disciplina');

        if (!empty($nome)) {
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        $disciplinas = $query->orderBy('nome')->paginate(20);

        return view('disciplina.listar')->with('disciplinas', $disciplinas);
    }
}
