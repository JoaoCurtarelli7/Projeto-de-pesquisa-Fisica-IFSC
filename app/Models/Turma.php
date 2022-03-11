<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class Turma extends Model
{
    use LaratrustUserTrait;

    protected $table = "turma";

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

}
