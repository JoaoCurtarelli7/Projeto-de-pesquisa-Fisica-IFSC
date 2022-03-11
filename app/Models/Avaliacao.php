<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = "avaliacao";

    protected $fillable = ['titulo', 'data_inicio', 'data_fim', 'disciplina_id', 'turma_id', 'instrucoes'];

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

    public function disciplina()
    {
        return $this->belongsTo(\App\Models\Disciplina::class);
    }

    public function turma()
    {
        return $this->belongsTo(\App\Models\Turma::class);
    }

}
