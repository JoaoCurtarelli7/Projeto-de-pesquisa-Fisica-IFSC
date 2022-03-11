<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoAluno extends Model
{
    protected $table = "avaliacao_aluno";

    protected $fillable = ['aluno_id', 'avaliacao_id', 'data', 'habilidade1', 'habilidade2', 'habilidade3', 'habilidade4',
        'habilidade5', 'habilidade6', 'habilidade7', 'habilidade8', 'habilidade9', 'habilidade10', 'habilidade11',
        'habilidade12', 'competencia1', 'competencia2', 'competencia3', 'nota_final', 'tipo_resolucao',];

    public static function rules()
    {
        return [
            'titulo' => 'required|min:5|max:80',
            'disciplina_id' => 'required',
            'turma_id' => 'required',
            'instrucoes' => 'nullable|min:5|max:500',
        ];
    }

    public static function message()
    {
        return [
            'titulo.required' => 'O :attribute é obrigatório',
            'titulo.max' => 'O :attribute não deve ser maior que 80 caracteres',
            'titulo.min' => 'O :attribute deve ser maior que 5 caracteres',
            'disciplina_id.required' => 'O :attribute é obrigatório',
            'turma_id.required' => 'O :attribute é obrigatório',
        ];
    }

    public function avaliacao()
    {
        return $this->belongsTo(\App\Models\Avaliacao::class);
    }

    public function aluno()
    {
        return $this->belongsTo(\App\Models\Aluno::class);
    }

}
