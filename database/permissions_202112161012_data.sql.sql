INSERT INTO db_projeto_sis_fisica.permissions (name,display_name,description,created_at,updated_at) VALUES
	 ('TurmaController@listar','turma.index','Turma',NULL,NULL),
	 ('TurmaController@cadastrar','turma.create','Turma',NULL,NULL),
	 ('TurmaController@editar','turma.edit','Turma',NULL,NULL),
	 ('TurmaController@deletar','turma.delete','Turma',NULL,NULL),
	 ('TurmaController@pesquisar','turma.pesquisar','Turma',NULL,NULL),
	 ('ProfessorController@listar','professor.listar','Professor',NULL,NULL),
	 ('ProfessorController@cadastrar','professor.create','Professor',NULL,NULL),
	 ('ProfessorController@salvar','professor.salvar','Professor',NULL,NULL),
	 ('ProfessorController@editar','professor.editar','Professor',NULL,NULL),
	 ('ProfessorController@pesquisar','professor.pesquisar','Professor',NULL,NULL),
	 ('ProfessorController@deletar','professor.deletar','Professor',NULL,NULL),
	 ('CursoController@listar','curso.listar','',NULL,NULL),
	 ('CursoController@cadastrar','curso.create','',NULL,NULL),
	 ('CursoController@salvar','curso.salvar','',NULL,NULL),
	 ('CursoController@editar','curso.editar','',NULL,NULL),
	 ('CursoController@pesquisar','curso.pesquisar','',NULL,NULL),
	 ('CursoController@deletar','curso.deletar','',NULL,NULL),
	 ('EscolaController@listar','escola.listar','',NULL,NULL),
	 ('EscolaController@cadastrar','escola.create','',NULL,NULL),
	 ('EscolaController@salvar','escola.salvar','',NULL,NULL),
	 ('EscolaController@editar','escola.editar','',NULL,NULL),
	 ('EscolaController@pesquisar','escola.pesquisar','',NULL,NULL),
	 ('EscolaController@deletar','escola.deletar','',NULL,NULL),
	 ('DisciplinaController@listar','disciplina.listar','',NULL,NULL),
	 ('DisciplinaController@cadastrar','disciplina.create','',NULL,NULL),
	 ('DisciplinaController@salvar','disciplina.salvar','',NULL,NULL),
	 ('DisciplinaController@editar','disciplina.editar','',NULL,NULL),
	 ('DisciplinaController@pesquisar','disciplina.pesquisar','',NULL,NULL),
	 ('DisciplinaController@deletar','disciplina.deletar','',NULL,NULL),
	 ('AlunoController@listar','aluno.listar','',NULL,NULL),
	 ('AlunoController@cadastrar','aluno.create','',NULL,NULL),
	 ('AlunoController@salvar','aluno.salvar','',NULL,NULL),
	 ('AlunoController@editar','aluno.editar','',NULL,NULL),
	 ('AlunoController@pesquisar','aluno.pesquisar','',NULL,NULL),
	 ('AlunoController@deletar','aluno.deletar','',NULL,NULL),
	 ('AvaliacaoController@listar','avaliacao.listar','',NULL,NULL),
	 ('AvaliacaoController@cadastrar','avaliacao.create','',NULL,NULL),
	 ('AvaliacaoController@salvar','avaliacao.salvar','',NULL,NULL),
	 ('AvaliacaoController@editar','avaliacao.editar','',NULL,NULL),
	 ('AvaliacaoController@pesquisar','avaliacao.pesquisar','',NULL,NULL),
	 ('AvaliacaoController@deletar','avaliacao.deletar','',NULL,NULL),
	 ('MatriculaController@index','matricula.listar','',NULL,NULL),
	 ('MatriculaController@create','matricula.create','',NULL,NULL),
	 ('MatriculaController@store','matricula.store','',NULL,NULL),
	 ('MatriculaController@update','matricula.update','',NULL,NULL),
	 ('MatriculaController@edit','matricula.edit','',NULL,NULL),
	 ('MatriculaController@pesquisar','matricula.pesquisar','',NULL,NULL),
	 ('MatriculaController@search','matricula.search','',NULL,NULL),
	 ('MatriculaController@destroy','matricula.deletar','',NULL,NULL),
	 ('DisciplinaTurmaController@index','disciplina_turma.listar','',NULL,NULL),
	 ('DisciplinaTurmaController@create','disciplina_turma.create','',NULL,NULL),
	 ('DisciplinaTurmaController@store','disciplina_turma.store','',NULL,NULL),
	 ('DisciplinaTurmaController@update','disciplina_turma.update','',NULL,NULL),
	 ('DisciplinaTurmaController@edit','disciplina_turma.edit','',NULL,NULL),
	 ('DisciplinaTurmaController@pesquisar','disciplina_turma.pesquisar','',NULL,NULL),
	 ('DisciplinaTurmaController@search','disciplina_turma.search','',NULL,NULL),
	 ('DisciplinaTurmaController@destroy','disciplina_turma.deletar','',NULL,NULL),
	 ('GeralPDFController@professorDisciplina','professorDisciplina.pdf','',NULL,NULL),
	 ('GeralPDFController@curso','curso.pdf','',NULL,NULL),
	 ('AvaliacaoController@exibir','avaliacao.exibir',NULL,NULL,NULL),
	 ('ProfessorDisciplinaController@index','ProfessorDisciplina.index',NULL,NULL,NULL),
	 ('ProfessorDisciplinaController@store','ProfessorDisciplina.store',NULL,NULL,NULL),
	 ('ProfessorDisciplinaController@edit','ProfessorDisciplina.edit',NULL,NULL,NULL),
	 ('ProfessorDisciplinaController@update','ProfessorDisciplina.update',NULL,NULL,NULL),
	 ('ProfessorDisciplinaController@destroy','ProfessorDisciplina.destroy',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@listar','AvaliacaoAluno.listar',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@salvar','AvaliacaoAluno.salvar',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@exibir','AvaliacaoAluno.exibir',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@editar','AvaliacaoAluno.editar',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@deletar','AvaliacaoAluno.deletar',NULL,NULL,NULL),
	 ('ResponsavelAlunoController@listar','Responsavel.listar',NULL,NULL,NULL),
	 ('ResponsavelAlunoController@cadastrar','Reponsavel.cadastrar',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@cadastrar','Avaliacao.cadastrar',NULL,NULL,NULL),
	 ('TurmaController@salvar','turma.salvar',NULL,NULL,NULL),
	 ('AvaliacaoAlunoController@graficoIndividual','avaliacaoAluno.graficoIndividual',NULL,NULL,NULL),
	 ('AvaliacaoController@graficoTurma','Avaliacao.graficoTurma',NULL,NULL,NULL),
	 ('ResponsavelAlunoController@salvar','ResponsavelAluno.salvar',NULL,NULL,NULL),
	 ('ResponsavelAlunoController@editar','ResponsavelAluno.editar',NULL,NULL,NULL),
	 ('ResponsavelAlunoController@deletar','ResponsavelAluno.deletar',NULL,NULL,NULL),
	 ('ResponsavelAlunoController@pesquisar','ResponsavelAluno.pesquisar',NULL,NULL,NULL),
	 ('CursoDisciplinaController@index','CursoDisciplina.index','chart',NULL,NULL),
	 ('CursoDisciplinaController@store','CursoDisciplina.store',NULL,NULL,NULL),
	 ('CursoDisciplinaController@edit','CursoDisciplina.edit',NULL,NULL,NULL),
	 ('CursoDisciplinaController@update','CursoDisciplina.update',NULL,NULL,NULL),
	 ('CursoDisciplinaController@destroy','CursoDisciplina.destroy',NULL,NULL,NULL);