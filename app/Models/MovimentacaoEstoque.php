<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentacaoEstoque extends Model
{
    protected $table = 'movimentacoes_estoque';

    protected $fillable = [
        'material_id',
        'tipo',
        'quantidade',
        'observacao',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}