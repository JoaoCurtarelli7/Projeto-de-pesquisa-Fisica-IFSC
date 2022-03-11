<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  protected $table = "professor";

  public function disciplina()
  {
      return $this->belongsTo(Disciplina::class,'disc_id','id');
  }
}
