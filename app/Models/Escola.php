<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = "escolas";
    protected $fillable = ["nome", "cep", "telefone", 'rua', 'numero', 'bairro', 'email',
        'cnpj', 'sigla', 'municipio_id', 'tipo'];

    public static function rules()
    {
        return [
            'nome' => 'required',
            'cep' => 'required',
            'telefone' => 'required',
            'cnpj' => 'required',
            'sigla' => 'required',
            'municipio_id' => 'required',
            'tipo' => 'required',
            'numero' => 'nullable|max:20',
            'bairro' => 'nullable|max:100',
        ];
    }

    public static function message()
    {
        return [
            'nome.required' => 'O Nome é obrigatório',
            'cep.required' => 'O CEP é obrigatório',
            'telefone.required' => 'O Telefone é obrigatório',
            'cnpj.required' => 'O CNJP é obrigatório',
            'sigla.required' => 'A Sigla é obrigatório',
            'municipio_id.required' => 'A Cidade é obrigatório',
            'tipo.required' => 'O Tipo é obrigatório',
        ];
    }

    public function municipios()
    {
        return $this->belongsTo(Municipio::class,'municipio_id');
    }
}
