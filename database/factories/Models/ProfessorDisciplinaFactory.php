<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProfessorDisciplina;
use Faker\Generator as Faker;

$factory->define(ProfessorDisciplina::class, function (Faker $faker) {
    return [
        'professor_id' => factory(\App\Models\Professor::class),
        'disciplina_id' => factory(\App\Models\Disciplina::class),
    ];
});
