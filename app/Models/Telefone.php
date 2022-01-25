<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'descricao'
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
