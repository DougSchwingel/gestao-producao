<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';

    protected $fillable = [
        'nome',
        'descricao',
        'unidade',
        'custo_unitario',
        'estoque_minimo',
        'ativo',
    ];

    public function produtos()
    {
        return $this->belongsToMany(
            Produto::class,
            'produto_materiais'
        )->withPivot('quantidade')
         ->withTimestamps();
    }

    public function movimentacoesEstoque()
    {
        return $this->hasMany(MovimentacaoEstoque::class);
    }
    
    public function saldoEstoque()
    {
        $entradas = $this->movimentacoesEstoque()
            ->where('tipo', 'entrada')
            ->sum('quantidade');

        $saidas = $this->movimentacoesEstoque()
            ->where('tipo', 'saida')
            ->sum('quantidade');

        return $entradas - $saidas;
    }

    public function registrarSaida(float $quantidade, ?string $observacao = null)
    {
        if ($quantidade <= 0) {
            throw new \InvalidArgumentException('A quantidade deve ser maior que zero.');
        }

        if ($this->saldoEstoque() < $quantidade) {
            throw new \RuntimeException('Estoque insuficiente.');
        }

        return $this->movimentacoesEstoque()->create([
            'tipo' => 'saida',
            'quantidade' => $quantidade,
            'observacao' => $observacao,
        ]);
    }

    public function registrarEntrada(float $quantidade, ?string $observacao = null)
    {
        if ($quantidade <= 0) {
            throw new \InvalidArgumentException('A quantidade deve ser maior que zero.');
        }

        return $this->movimentacoesEstoque()->create([
            'tipo' => 'entrada',
            'quantidade' => $quantidade,
            'observacao' => $observacao,
        ]);
    }
}