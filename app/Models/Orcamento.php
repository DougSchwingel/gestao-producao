<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'cliente_id',
        'numero',
        'status',
        'validade',
        'observacoes',
        'subtotal',
        'desconto',
        'total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens()
    {
        return $this->hasMany(OrcamentoItem::class);
    }
}