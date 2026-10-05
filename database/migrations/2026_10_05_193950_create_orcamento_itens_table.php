<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orcamento_itens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('orcamento_id')
                ->constrained('orcamentos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('quantidade', 12, 4);

            $table->decimal('custo_unitario', 12, 4);
            $table->decimal('margem_percentual', 8, 4)->default(0);
            $table->decimal('preco_unitario', 12, 4);
            $table->decimal('subtotal', 12, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamento_itens');
    }
};
