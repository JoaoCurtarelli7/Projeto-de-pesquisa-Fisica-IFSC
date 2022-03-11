<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipios";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_ibge',
        'nome',
        'latitude',
        'longitude',
        'capital',
        'estado_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
        'capital' => 'boolean',
        'estado_id' => 'integer',
    ];


    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class);
    }
}
