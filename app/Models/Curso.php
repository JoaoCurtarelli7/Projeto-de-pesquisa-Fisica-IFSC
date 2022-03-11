<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "curso";

    protected $fillable = ['nome', 'tipo', 'data_inicio', 'data_fim', 'escola_id'];

    public function escola()
    {
        return $this->belongsTo(\App\Models\Escola::class);
    }
}
