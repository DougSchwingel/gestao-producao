<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'ativo',
    ];

    public function materiais()
    {
        return $this->belongsToMany(
            Material::class,
            'produto_materiais'
        )->withPivot('quantidade')
         ->withTimestamps();
    }

    public function processos()
    {
        return $this->belongsToMany(
            Processo::class,
            'produto_processos'
        )->withPivot([
            'maquina_id',
            'tempo_pessoa_minutos',
            'tempo_maquina_minutos',
        ])->withTimestamps();
    }

    public function orcamentoItens()
    {
        return $this->hasMany(OrcamentoItem::class);
    }
}