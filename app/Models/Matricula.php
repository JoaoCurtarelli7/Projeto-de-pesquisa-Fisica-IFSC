<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = "matriculas";
    protected $fillable = ["matricula", "turma_id", "curso_id", 'aluno_id'];

    public static function rules()
    {
        return [
            'matricula' => 'required',
            'turma_id' => 'required',
            'curso_id' => 'required',
            'aluno_id' => 'required',
          
        ];
    }



    public function aluno()
    {
        return $this->belongsTo(\App\Models\Aluno::class);
    }



    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class);
    }


    public function turma()
    {
        return $this->belongsTo(\App\Models\Turma::class);
    }

}
