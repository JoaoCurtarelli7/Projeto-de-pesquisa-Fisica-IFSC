<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/avaliacao') }}">Avaliação <span class="sr-only">Avaliação</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-expanded="false">
                Cadastros
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/matricula') }}">Matricula</a>
                <a class="dropdown-item" href="{{ url('/professores') }}">Professores</a>
                <a class="dropdown-item" href="{{ url('/responsavel') }}">Responsável</a>
                <a class="dropdown-item" href="{{ url('/alunos') }}">Alunos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/disciplina') }}">Disciplina</a>
                <a class="dropdown-item" href="{{ url('/turmas') }}">Turmas</a>
                <a class="dropdown-item" href="{{ url('/cursos') }}">Cursos</a>
                <a class="dropdown-item" href="{{ url('/escolas') }}">Escolas</a>
            </div>
        </li>
    </ul>
</div>
