<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessorDisciplina extends Model
{
    protected $table = "professor_disciplina";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'professor_id',
        'disciplina_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'professor_id' => 'integer',
        'disciplina_id' => 'integer',
    ];


    public function professor()
    {
        return $this->belongsTo(\App\Models\Professor::class);
    }

    public function disciplinas()
    {
        return $this->belongsTo(\App\Models\Disciplina::class, 'disciplina_id', 'id');
    }

}
