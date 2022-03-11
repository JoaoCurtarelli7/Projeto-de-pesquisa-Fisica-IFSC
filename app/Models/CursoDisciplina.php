<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoDisciplina extends Model
{
    protected $table = "curso_disciplina";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'curso_id',
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
        'curso_id' => 'integer',
        'disciplina_id' => 'integer',
        'professor_id' => 'integer',

    ];


    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }


    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class);
    }
}
