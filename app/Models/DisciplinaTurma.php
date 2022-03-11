<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisciplinaTurma extends Model
{
    protected $table = "disciplina_turma";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'turma_id',
        'disciplina_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'turma_id' => 'integer',
        'disciplina_id' => 'integer',
    ];


    public function turma()
    {
        return $this->belongsTo(\App\Models\Turma::class);
    }

    public function disciplina()
    {
        return $this->belongsTo(\App\Models\Disciplina::class);
    }

}
