<?php

namespace App\Http\Controllers;

use App\Http\Requests\cursoDisciplinaStoreRequest;
use App\Models\Disciplina;
use App\Models\cursoDisciplina;
use App\Models\Professor;
use Illuminate\Http\Request;

class CursoDisciplinaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function listar($id)
    {
        $curso_id = $id;
        $cursoDisciplinas = CursoDisciplina::where('curso_id', $id)->get();
        $professores = Professor::paginate(3);;

        $disciplinas = Disciplina::paginate(3);;

        return view('curso.curso_disciplina_form_list', compact('cursoDisciplinas', 'disciplinas', 'professores', 'curso_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /* public function create(Request $request)
     {
         return view('curso.curso_disciplina_form_list');
     }*/

    /**
     * @param \App\Http\Requests\cursoDisciplinaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required',
            'professor_id' => 'required',

        ]);

        CursoDisciplina::create($request->all());

        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('CursoDisciplinaController@listar', $request->input('curso_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\cursoDisciplina $cursoDisciplina
     * @return \Illuminate\Http\Response
     */
    /*    public function show(Request $request, cursoDisciplina $cursoDisciplina)
        {
            return view('cursoDisciplina.show', compact('cursoDisciplina'));
        }*/

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\cursoDisciplina $cursoDisciplina
     * @return \Illuminate\Http\Response
     */
    public function editar($id, Request $request)
    {
        $cursoDisciplina = CursoDisciplina::find($id);
        $curso_id = $cursoDisciplina->curso_id;
        $cursoDisciplinas = CursoDisciplina::where('curso_id', $cursoDisciplina->curso_id)->get();

        $disciplinas = Disciplina::orderBy('nome')->get();
        $professores = Professor::orderBy('nome')->get();

        return view('curso.curso_disciplina_form_list', compact('cursoDisciplinas', 'cursoDisciplina', 'disciplinas', 'professores', 'curso_id'));
    }

    /**
     * @param \App\Http\Requests\cursoDisciplinaUpdateRequest $request
     * @param \App\cursoDisciplina $cursoDisciplina
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required',
            'professor_id' => 'required',

        ]);
        $object = CursoDisciplina::find($id);
        $object->update($request->all());

        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('CursoDisciplinaController@listar', $object->curso_id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\cursoDisciplina $cursoDisciplina
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        $object = CursoDisciplina::find($id);
        $curso_id = $object->curso_id;

        if (empty($object)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $object->delete();

        return redirect()->action('CursoDisciplinaController@listar', $curso_id)->with('success', "Registro Removido com Sucesso!");
    }
}
