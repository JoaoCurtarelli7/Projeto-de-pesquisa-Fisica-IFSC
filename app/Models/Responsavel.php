<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{

  protected $table = "responsavel";
  protected $fillable = [
    'nome',
    'email',
    'contato',
    'resp_id',
];

  public function aluno()
    {
        return $this->belongsTo(Aluno::class,'resp_id','id');
    }
}
