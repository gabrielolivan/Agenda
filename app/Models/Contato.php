<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'email'
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }

    public function grupo_contatos()
    {
        return $this->belongsToMany(GrupoContato::class, 'contatos_grupos');
    }
}
