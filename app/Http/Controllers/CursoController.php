<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Escola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function listar()
    {
        $curso = Curso::paginate(3);

        return view('curso.listar')->with('cursos', $curso);
    }

    public function cadastrar()
    {
        $escolas = Escola::orderBy('nome')->get();

        return view('curso.form', compact('escolas'));
    }

    public function salvar(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'escola_id' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'escola_id.required' => 'O :attribute é obrigatório',
        ]);

        if ($id == 0) {
            Curso::create($request->all());

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('CursoController@listar');
        } else {
            Curso::updateOrCreate(['id' => $request->id], $request->all());

            $request->session()->flash('success', "Registro Salvo com Sucesso!");

            return redirect()->action('CursoController@listar');
        }
    }

    public function pesquisar(Request $request)
    {
        $nome = $request->input('nome');

        $query = DB::table('curso');

        if (!empty($nome)) {
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        $cursos = $query->orderBy('nome')->paginate(20);

        return view('curso.listar')->with('cursos', $cursos);
    }

    public function editar($id)
    {
        $curso = Curso::find($id);

        $escolas = Escola::orderBy('nome')->get();

        return view('curso.form', compact('curso', 'escolas'));
    }

    public function deletar($id)
    {
        $curso = Curso::find($id);

        if (empty($curso)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $curso->delete();

        return redirect()->action('CursoController@listar')->with('error', "Registro Removido com Sucesso!");
    }

}
