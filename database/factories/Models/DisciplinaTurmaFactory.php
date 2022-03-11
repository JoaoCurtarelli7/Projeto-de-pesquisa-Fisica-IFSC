<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DisciplinaTurma;
use Faker\Generator as Faker;

$factory->define(DisciplinaTurma::class, function (Faker $faker) {
    return [
        'turma_id' => factory(\App\Models\Turma::class),
        'disciplina_id' => factory(\App\Models\Disciplina::class),
    ];
});
