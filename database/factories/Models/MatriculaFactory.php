<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Matricula;
use Faker\Generator as Faker;

$factory->define(Matricula::class, function (Faker $faker) {
    return [
        'matricula' => $faker->regexify('[A-Za-z0-9]{45}'),
        'curso_id' => factory(\App\Models\Curso::class),
        'turma_id' => factory(\App\Models\Turma::class),
        'aluno_id' => factory(\App\Models\Aluno::class),
    ];
});
