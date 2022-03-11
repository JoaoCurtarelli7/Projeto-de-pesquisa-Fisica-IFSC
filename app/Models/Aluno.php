<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = "aluno";
    protected $fillable = ['nome', 'matricula', 'email', 'contato', 'contato_responsaveis'];

}
