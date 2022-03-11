@extends('layouts.app')

@section('content')
    <h3 class="display-5"><b><i>{{ __('Seja Bem-vindo ') }}</i></b></h3><br>
    <div class="row">
        <div class="card mb-3" style="max-width: 540px; margin-right: 40px; margin-left: 40px;">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/cursos.png') }}" style="width: 160px; " class="card-img-top" alt="contato">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Cursos</h5>
                        <p class="card-text">Cadastre e Gerencie todos os cursos</p>
                        <a href="{{url('cursos')}}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px; ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/profe.jpg') }}" class="card-img-top" style="width: 160px; padding: 10px;"
                         alt="calendar">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Professor</h5>
                        <p class="card-text">Cadastre e Gerencie todos os Professores</p>
                        <a href="{{url('professores')}}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 540px;  margin-left: 40px; margin-right: 40px; ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/class.png') }}" class="card-img-top" style="width: 155px; padding: 10px;"
                         alt="calendar">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Turma</h5>
                        <p class="card-text">Cadastre e Gerencie todas as Turmas</p>
                        <a href="{{url('turmas')}}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 540px; ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/disciplina.jpg') }}" class="card-img-top" style="width: 160px; padding: 10px;"
                         alt="calendar">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Disciplina</h5>
                        <p class="card-text">Cadastre e Gerencie todas as Disciplinas</p>
                        <a href="{{url('disciplinas')}}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
