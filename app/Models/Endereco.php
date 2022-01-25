<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'pais',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'cep',
        'descricao'
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }

}
