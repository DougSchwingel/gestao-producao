<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrcamentoItem extends Model
{
    protected $table = 'orcamento_itens';

    protected $fillable = [
        'orcamento_id',
        'produto_id',
        'quantidade',
        'custo_unitario',
        'margem_percentual',
        'preco_unitario',
        'subtotal',
    ];

    public function orcamento()
    {
        return $this->belongsTo(Orcamento::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}