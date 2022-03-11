<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\ProfessorDisciplina;
use Illuminate\Support\Facades\Session;
use PDF;

class GeralPDFController extends Controller
{
    public function professorDisciplina($id)
    {
        $professorDisciplinas = ProfessorDisciplina::where('professor_id', $id)->get();

        $professor_nome = (Professor::find($id))->nome;

        $disciplinas = [];
        foreach ($professorDisciplinas as $item) {
            $disciplinas[] = (Disciplina::find($item->disciplina_id))->nome;
        }
        Session::flash('warning', "Relatório Gerado com Sucesso!");

        $pdf = PDF::loadView('pdf.professor_disciplina', compact('disciplinas', 'professor_nome'));

        return $pdf->download('professorDisciplina.pdf');

    }

    public function curso()
    {
        $cursos = Curso::all();

        return PDF::loadView('pdf.curso', compact('cursos'))->download('Cursos.pdf');

    }
}
