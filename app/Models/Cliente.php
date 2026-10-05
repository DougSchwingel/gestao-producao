<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome_razao',
        'fantasia',
        'cpf_cnpj',
        'email',
        'telefone',
        'contato',
        'observacoes',
        'ativo',
    ];

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class);
    }
}