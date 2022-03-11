<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorDisciplinaStoreRequest;
use App\Models\Disciplina;
use App\Models\ProfessorDisciplina;
use Illuminate\Http\Request;

class ProfessorDisciplinaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $professor_id = $id;
        $professorDisciplinas = ProfessorDisciplina::where('professor_id', $id)->get();
        $disciplinas = Disciplina::paginate(3);;

        return view('professor.disciplina_form_list', compact('professorDisciplinas', 'disciplinas', 'professor_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /* public function create(Request $request)
     {
         return view('professor.disciplina_form_list');
     }*/

    /**
     * @param \App\Http\Requests\ProfessorDisciplinaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required',
        ]);

        ProfessorDisciplina::create($request->all());

        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('ProfessorDisciplinaController@index', $request->input('professor_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\professorDisciplina $professorDisciplina
     * @return \Illuminate\Http\Response
     */
    /*    public function show(Request $request, ProfessorDisciplina $professorDisciplina)
        {
            return view('professorDisciplina.show', compact('professorDisciplina'));
        }*/

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\professorDisciplina $professorDisciplina
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $professorDisciplina = ProfessorDisciplina::find($id);
        $professor_id = $professorDisciplina->professor_id;
        $professorDisciplinas = ProfessorDisciplina::where('professor_id', $professorDisciplina->professor_id)->get();

        $disciplinas = Disciplina::all();

        return view('professor.disciplina_form_list', compact('professorDisciplinas', 'professorDisciplina', 'disciplinas', 'professor_id'));
    }

    /**
     * @param \App\Http\Requests\ProfessorDisciplinaUpdateRequest $request
     * @param \App\professorDisciplina $professorDisciplina
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required',
        ]);
        $object = ProfessorDisciplina::find($id);
        $object->update($request->all());

        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('ProfessorDisciplinaController@index', $object->professor_id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\professorDisciplina $professorDisciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = ProfessorDisciplina::find($id);
        $professor_id = $object->professor_id;

        if (empty($object)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $object->delete();

        return redirect()->action('ProfessorDisciplinaController@index', $professor_id)->with('success', "Registro Removido com Sucesso!");
    }
}