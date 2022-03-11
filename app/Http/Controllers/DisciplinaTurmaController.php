<?php

namespace App\Http\Controllers;

use App\Models\DisciplinaTurma;
use App\Http\Requests\DisciplinaTurmaStoreRequest;
use App\Http\Requests\DisciplinaTurmaUpdateRequest;
use Illuminate\Http\Request;

class DisciplinaTurmaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disciplinaTurmas = DisciplinaTurma::all();

        return view('disciplinaTurma.index', compact('disciplinaTurmas'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('disciplinaTurma.create');
    }

    /**
     * @param \App\Http\Requests\DisciplinaTurmaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaTurmaStoreRequest $request)
    {
        $disciplinaTurma = DisciplinaTurma::create($request->validated());

        $request->session()->flash('disciplinaTurma.id', $disciplinaTurma->id);

        return redirect()->route('disciplinaTurma.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\disciplinaTurma $disciplinaTurma
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DisciplinaTurma $disciplinaTurma)
    {
        return view('disciplinaTurma.show', compact('disciplinaTurma'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\disciplinaTurma $disciplinaTurma
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DisciplinaTurma $disciplinaTurma)
    {
        return view('disciplinaTurma.edit', compact('disciplinaTurma'));
    }

    /**
     * @param \App\Http\Requests\DisciplinaTurmaUpdateRequest $request
     * @param \App\disciplinaTurma $disciplinaTurma
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaTurmaUpdateRequest $request, DisciplinaTurma $disciplinaTurma)
    {
        $disciplinaTurma->update($request->validated());

        $request->session()->flash('disciplinaTurma.id', $disciplinaTurma->id);

        return redirect()->route('disciplinaTurma.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\disciplinaTurma $disciplinaTurma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DisciplinaTurma $disciplinaTurma)
    {
        $disciplinaTurma->delete();

        return redirect()->route('disciplinaTurma.index');
    }
}