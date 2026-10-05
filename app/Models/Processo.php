<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'custo_hora',
        'ativo',
    ];

    public function produtos()
    {
        return $this->belongsToMany(
            Produto::class,
            'produto_processos'
        )->withPivot([
            'maquina_id',
            'tempo_pessoa_minutos',
            'tempo_maquina_minutos',
        ])->withTimestamps();
    }
}