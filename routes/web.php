<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'middleware' => 'HasPermission'], function () {

    Route::get('/avaliacao_aluno/cadastrar/avaliacao/{avaliacao_id}', 'AvaliacaoAlunoController@cadastrar');
    Route::post('/avaliacao_aluno/salvar/{id}', 'AvaliacaoAlunoController@salvar');
    Route::get('/avaliacao_aluno/exibir/{id}', 'AvaliacaoAlunoController@exibir');
    Route::get('/avaliacao_aluno/{id}/', 'AvaliacaoAlunoController@listar');
    Route::get('/avaliacao_aluno/editar/{id}/avaliacao/{avaliacao_id}', 'AvaliacaoAlunoController@editar');
    Route::get('/avaliacao_aluno/deletar/{id}', 'AvaliacaoAlunoController@deletar');
    Route::get('/avaliacao_aluno/{id}/individual/{aluno_id}', 'AvaliacaoAlunoController@graficoIndividual');

    Route::get('/alunos', 'AlunoController@listar');
    Route::get('/alunoturma/{id}', 'AlunoController@listar')->name("alunoturma");
    Route::get('/alunos/cadastrar/{id}', 'AlunoController@cadastrar');
    Route::post('/alunos/salvar/{id}', 'AlunoController@salvar');
    Route::get('/alunos/editar/{id}', 'AlunoController@editar');
    Route::get('/alunos/deletar/{id}', 'AlunoController@deletar');
    Route::post('/alunos/pesquisar', 'AlunoController@pesquisar');
    Route::get('/grafico', 'AlunoController@grafico');

    Route::get('/cursos', 'CursoController@listar');
    Route::get('/cursos/cadastrar', 'CursoController@cadastrar');
    Route::post('/cursos/salvar/{id}', 'CursoController@salvar');
    Route::get('/cursos/editar/{id}', 'CursoController@editar');
    Route::get('/cursos/deletar/{id}', 'CursoController@deletar');
    Route::post('/cursos/pesquisar', 'CursoController@pesquisar');

    Route::get('/professores', 'ProfessorController@listar');
    Route::get('/professores/cadastrar', 'ProfessorController@cadastrar');
    Route::post('/professores/salvar/{id}', 'ProfessorController@salvar');
    Route::get('/professores/editar/{id}', 'ProfessorController@editar');
    Route::get('/professores/deletar/{id}', 'ProfessorController@deletar');
    Route::post('/professores/pesquisar', 'ProfessorController@pesquisar');

    Route::get('/turmas', 'TurmaController@listar');
    Route::get('/turmas/cadastrar', 'TurmaController@cadastrar');
    Route::post('/turmas/salvar/{id}', 'TurmaController@salvar');
    Route::get('/turmas/editar/{id}', 'TurmaController@editar');
    Route::get('/turmas/deletar/{id}', 'TurmaController@deletar');
    Route::post('/turmas/pesquisar', 'TurmaController@pesquisar');

    Route::get('/responsavel', 'ResponsavelAlunoController@listar');
    Route::get('/responsavel/cadastrar', 'ResponsavelAlunoController@cadastrar');
    Route::post('/responsavel/salvar/{id}', 'ResponsavelAlunoController@salvar');
    Route::get('/responsavel/editar/{id}', 'ResponsavelAlunoController@editar');
    Route::get('/responsavel/deletar/{id}', 'ResponsavelAlunoController@deletar');
    Route::post('/responsavel/pesquisar', 'ResponsavelAlunoController@pesquisar');

    Route::get('/curso-disciplina/{id}', 'CursoDisciplinaController@listar');
    Route::post('/curso-disciplina/salvar/{id}', 'CursoDisciplinaController@salvar');
    Route::post('/curso-disciplina/update/{id}', 'CursoDisciplinaController@update');
    Route::get('/curso-disciplina/editar/{id}', 'CursoDisciplinaController@editar');
    Route::get('/curso-disciplina/deletar/{id}', 'CursoDisciplinaController@deletar');

    /*
    Route::get('curso-disciplina/{id}', 'CursoDisciplinaController@index');
    Route::get('curso-disciplina/create', 'CursoDisciplinaController@create');
    Route::post('curso-disciplina/{id}', 'CursoDisciplinaController@store');
    Route::get('curso-disciplina/edit/{id}', 'CursoDisciplinaController@edit');
    Route::post('curso-disciplina/update/{id}', 'CursoDisciplinaController@update');
    Route::get('curso-disciplina/destroy/{id}', 'CursoDisciplinaController@destroy');
*/
Route::get('/matriculas', 'MatriculaController@listar');
Route::get('/matriculas/cadastrar', 'MatriculaController@cadastrar');
Route::post('/matriculas/salvar/{id}', 'MatriculaController@salvar');
Route::get('/matriculas/editar/{id}', 'MatriculaController@editar');
Route::get('/matriculas/deletar/{id}', 'MatriculaController@deletar');
Route::post('/matriculas/pesquisar', 'MatriculaController@pesquisar');


    Route::get('/escolas', 'EscolaController@listar');
    Route::get('/escolas/cadastrar', 'EscolaController@cadastrar');
    Route::post('/escolas/salvar/{id}', 'EscolaController@salvar');
    Route::get('/escolas/editar/{id}', 'EscolaController@editar');
    Route::get('/escolas/deletar/{id}', 'EscolaController@deletar');
    Route::post('/escolas/pesquisar', 'EscolaController@pesquisar');

    Route::get('/disciplina', 'DisciplinaController@listar');
    Route::get('/disciplina/cadastrar', 'DisciplinaController@cadastrar');
    Route::post('/disciplina/salvar/{id}', 'DisciplinaController@salvar');
    Route::get('/disciplina/editar/{id}', 'DisciplinaController@editar');
    Route::get('/disciplina/deletar/{id}', 'DisciplinaController@deletar');
    Route::post('/disciplina/pesquisar', 'DisciplinaController@pesquisar');

    //  Route::resource('turma', 'TurmaController');
    Route::get('professor-disciplina/{id}', 'ProfessorDisciplinaController@index');
    Route::post('professor-disciplina/{id}', 'ProfessorDisciplinaController@store');
    Route::get('professor-disciplina/edit/{id}', 'ProfessorDisciplinaController@edit');
    Route::post('professor-disciplina/update/{id}', 'ProfessorDisciplinaController@update');
    Route::get('professor-disciplina/destroy/{id}', 'ProfessorDisciplinaController@destroy');
    //Route::resource('professor-disciplina/{professor_id}', 'ProfessorDisciplinaController');

    Route::get('/avaliacao', 'AvaliacaoController@listar');
    Route::get('/avaliacao/cadastrar', 'AvaliacaoController@cadastrar');
    Route::post('/avaliacao/salvar/{id}', 'AvaliacaoController@salvar');
    Route::get('/avaliacao/editar/{id}', 'AvaliacaoController@editar');
    Route::get('/avaliacao/deletar/{id}', 'AvaliacaoController@deletar');
    Route::post('/avaliacao/pesquisar', 'AvaliacaoController@pesquisar');
    Route::get('/avaliacao/{id}/turma/{turma_id}', 'AvaliacaoController@graficoTurma');

   // Route::resource('curso-disciplina', 'CursoDisciplinaController');

    Route::resource('matricula', 'MatriculaController');

    Route::resource('disciplina-turma', 'DisciplinaTurmaController');

    Route::get('professor-disciplina-pdf/{id}', 'PDF\GeralPDFController@professorDisciplina');
    Route::get('curso-pdf', 'PDF\GeralPDFController@curso');


    Route::get('chart', function () {

        $chart = LarapexChart::setTitle('Users')
            ->setDataset([User::where('id', '<=', 20)->count(), User::where('id', '>', 20)->count()])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setLabels(['Published', 'No Published']);
        return view('chart', compact('chart'));
    });
});
