<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CursoDisciplina;
use Faker\Generator as Faker;

$factory->define(CursoDisciplina::class, function (Faker $faker) {
    return [
        'curso_id' => factory(\App\Models\Curso::class),
        'professor_id' => factory(\App\Models\Professor::class),
        'disciplina_id' => factory(\App\Models\Disciplina::class),
    ];
});
